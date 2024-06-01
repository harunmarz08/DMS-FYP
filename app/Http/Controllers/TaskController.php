<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\TemplateDocument;
use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Notifications\NewTaskUpload;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $this->getOrCreateTemplate($project);
        // Update the status 
        $project_status = Project::findOrFail($project->id);
        $project_status->update(['status' => 'On-going']);
        
        $tasks = Task::where('project_id', $project->id)->with('documents')->get();
        $template_docs = TemplateDocument::where('project_id', $project->id)->get();
        $users = User::where('role', '1')->get();
        // $documents = Document::where('task_id', $tasks->id)->get();
        $documents = Document::whereIn('task_id', $tasks->pluck('id'))->get();
        // dd($template_contents);
        Session::put('tasks', $tasks->isEmpty() ? collect([]) : $tasks);
        Session::put('template_docs', $template_docs->isEmpty() ? collect([]) : $template_docs);
        Session::put('users', $users);
        Session::put('documents', $documents->isEmpty() ? collect([]) : $documents);

        return view('project.tasks.index', ['project' => $project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'task_count' => 'required|integer|min:1',
        ]);
        
        $count = $validatedData['task_count'];
        $defaultUser = 1;

        // Create tasks
        for ($i = 1; $i <= $count; $i++) {
            $task = new Task([
                'name' => "Appendix",
                'project_id' => $project->id, // Update with your logic to determine project_id
                'description' => null,
                'user_id' => $defaultUser,
            ]);
            $task->save();

            $taskDirectory = 'projects/' . $project->created_by . '/p_' . $project->name . '/t_' . $task->id;
            Storage::makeDirectory($taskDirectory);
        }

        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'document' => ['required', 'file', 'max:2048'], // Adjust the max file size as needed
        ]);

        $file = $request->file('document');

        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            

            $latestDocument = Document::where('task_id', $task->id)->latest()->first();

            $version = $latestDocument ? $latestDocument->version + 1 : 1;

            $documentPath = 'projects/' . $project->created_by . '/p_' . $project->name . '/t_' . $task->id. '/v_' . $version . '';

            $originalFileName = $file->getClientOriginalName();
            $storedPath = $file->storeAs($documentPath, $originalFileName);

            $directory = dirname($storedPath); // Get the directory path

            Document::create([
                'project_id' => $project->id,
                'task_id' => $task->id,
                'filename' => $file->getClientOriginalName(),
                'file_path' => $directory, // Store the directory path instead of the original name
                'version' => $version,
            ]);

            //Notify
            $users = User::where('role', '0')->get(); // Adjust this query to get the users you want to notify
            Notification::send($users, new NewTaskUpload($task, $project));
            
            return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'file_uploaded');
        } else {
            return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'upload_fail');
        }
    }

    /**
     * Update task name in storage.
     */
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        $task->update($data);

        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-updated');
    }

    public function download(Document $document)
    {
        $filePath = $document->file_path;
        $fileName = $document->filename;  
        if (Storage::exists($filePath.'/'.$fileName)) {
            return Storage::download($filePath.'/'.$fileName);
        }

        return redirect()->back()->with('error', 'File not found.');
    }

    /**
     * Director assign a User with role 1 to a Task.
     */
    // public function assign(Request $request, Task $task, Project $project)
    // {
    //     $user = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     $task->update(['user_id' => $user['user_id']]);
    //     Assignment::create([
    //         'project_id' => $project->id,
    //         'task_id' => $task->id,
    //         'user_id' => $user,
    //     ]);
    //     return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-assigned');
    // }

    // /**
    //  * Director assign a User with role 1 to a Task.
    //  */
    // public function unassign(Request $request, Task $task, Project $project)
    // {
    //     $task->update(['user_id' => 1]);

    //     return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-unassigned');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Task $task)
    {
        $taskDirectory = 'projects/' . $project->created_by . '/p_' . $project->name . '/t_' . $task->id;
        
        if (Storage::exists($taskDirectory)) {
            Storage::deleteDirectory($taskDirectory);
        }

        $task->delete();

        return redirect(route('project.tasks.index', ['project' => $project]))->with('status', 'task-deleted');
    }

    public function deleteTaskDocument(Project $project, Task $task, Document $document)
    {
        $documentDirectory = 'projects/' . $project->created_by . '/p_' . $project->name . '/t_' . $task->id . '/v_' . $document->version;
        
        if (Storage::exists($documentDirectory)) {
            Storage::deleteDirectory($documentDirectory);
        }

        $document->delete();

        return redirect(route('project.tasks.index', ['project' => $project]))->with('status', 'task-deleted');
    }


    protected function getOrCreateTemplate(Project $project)
    {
        return TemplateDocument::firstOrCreate(
            ['project_id' => $project->id],
            [
                'data1' => $this->getDefaultData1(),
                'data2' => $this->getDefaultData2(),
                'data3' => $this->getDefaultData3(),
                'data4' => $this->getDefaultData4(),
                'data5' => $this->getDefaultData5(),
                'version' => 1,
            ]
        );
    }

    protected function getDefaultData1()
    {
        $defaultData1 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData1Keys() as $key) {
            $defaultData1[$key] = null;
        }
        return $defaultData1;
    }

    protected function getData1Keys()
    {
        return [
            "cover", "nama_program", 
            "nama1", "nama2", "nama3",
            "jawatan1", "jawatan2", "jawatan3",
            "c_pp_name", "c_pp_off", "c_pp_ph", "c_pp_mail",
            "c_dk_name", "c_dk_off", "c_dk_ph", "c_dk_mail",
        ];
    }

    protected function getDefaultData2()
    {
        $defaultData2 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData2Keys() as $key) {
            $defaultData2[$key] = null;
        }
        return $defaultData2;
    }

    protected function getData2Keys()
    {
        return [
            "it1", "tujuan", "visi", "misi", "matlamat", "it4", "it5_1", "it5_2", "it6_1", "it6_2",
            "it6_3", "it7_bmk", "it7_bmp", "it7_enk", "it7_enp", "it7_bma", "it7_ena", "it8_cb1", "it8_cb2",
            "it8_cb3", "it8_cb4", "it9", "it10", "it11", "it12", "it13", "it14", "it15", "it16_1", "it16_2",
            "it16_3", "it16_4", "it16_5", "it17_1cb1", "it17_1cb2", "it17_2", "it18_1", "it18_2", "it18_3",
            "it18_4", "it18_5", "it18_6", "it18_7", "it18_8", "it18_9", "it18_10", "it18_11", "it18_12", "it18_13",
            "it18_14", "it19", "it20", "it21_1", "it21_2", "it21_3", "it22_1_en", "it22_1_bm", "it22_1x", "it22_2a",
            "it22_2ax", "it22_2b", "it22_2bx", "it22_3a", "it22_3ax", "it22_3b", "it22_3bx", "it22_4peo1", "it22_4peo2",
            "it22_4peo3", "it22_4peox", "it22_4plo1", "it22_4plo2", "it22_4plo3", "it22_4plox", "it22_5a", "it22_5ax",
            "it22_5b", "it22_5bx", "it22_5c", "it22_5cx", "it22_5d", "it22_5dx", "it22_5e", "it22_5ex", "it22_6clo1",
            "it22_6clo2", "it22_6clo3", "it22_6x", "it22_71a", "it22_71b", "it22_72a", "it22_72b", "it22_72c", "it22_72p",
            "it22_73a", "it22_73b", "it22_73c", "it22_73p","it22_8", "it23_1a", "it23_1b", "it23_1c", "it23_1d", "it23_1e",
            "it23_2a", "it23_2b", "it23_2c", "it23_2d", "it23_2e", "it23_3a", "it23_3b", "it23_3c", "it23_3d", "it23_3e",
            "it23_4a", "it23_4b", "it23_4c", "it23_4d", "it23_4e", "it24_1", "it24_2", "it24_3", "it24_4", "it24_5",
            "it25_1", "it25_2", "it26_1", "it26_2", "it27_1", "it27_2", "it27_3", "it27_4", "it28", "it29_1", "it29_2",
            "it29_3", "it30_1", "it30_2", "it30_3", "it30_4", "it30_5", "it30_6", "it30_7", "it30_8", "it31"
        ];
    }

    protected function getDefaultData3()
    {
        $defaultData3 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData3Keys() as $key) {
            $defaultData3[$key] = null;
        }
        return $defaultData3;
    }

    protected function getData3Keys()
    {
        return [
            "it18_ex",
        ];
    }

    protected function getDefaultData4()
    {
        $defaultData4 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData4Keys() as $key) {
            $defaultData4[$key] = null;
        }
        return $defaultData4;
    }

    protected function getData4Keys()
    {
        return [
            "it_excel1", "it_excel2", "it_excel3cb1", "it_excel3cb2", "it_excel3cb3",  "it_excelj",
        ];
    }

    protected function getDefaultData5()
    {
        $defaultData5 = [];
        // Loop through the keys and set them to null
        foreach ($this->getData5Keys() as $key) {
            $defaultData5[$key] = null;
        }
        return $defaultData5;
    }

    protected function getData5Keys()
    {
        return [
            "it_excelex"
        ];
    }
}
