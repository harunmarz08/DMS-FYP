<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->get();
        $users = User::where('role', '1')->get();
        // $documents = Document::where('task_id', $tasks->id)->get();
        $documents = Document::all();
        

        Session::put('tasks', $tasks->isEmpty() ? collect([]) : $tasks);
        Session::put('users', $users);
        Session::put('documents', $documents);

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

            $taskDirectory = 'projects/p_' . $project->name . '/t_' . $task->id;
            Storage::makeDirectory($taskDirectory);
        }

        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'Tasks created successfully.');
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

            $documentPath = 'projects/p_' . $project->name . '/t_' . $task->id . '/v_' . $version . '';

            $storedPath = Storage::putFile($documentPath, $file);

            Document::create([
                'project_id' => $project->id,
                'task_id' => $task->id,
                'filename' => $file->getClientOriginalName(),
                'file_path' => $storedPath,
                'version' => $version,
            ]);

            return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'file_uploaded');
        }
        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'upload_fail');
    }

    /**
     * Update task name in storage.
     */
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], // Adjust the max file size as needed
        ]);

        $data = [
            'name' => $request->name,
        ];

        $task->update($data);

        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-updated');
    }

    /**
     * Director assign a User with role 1 to a Task.
     */
    public function assign(Request $request, Task $task, Project $project)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update(['user_id' => $validatedData['user_id']]);
        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-assigned');
    }

    /**
     * Director assign a User with role 1 to a Task.
     */
    public function unassign(Request $request, Task $task, Project $project)
    {
        $task->update(['user_id' => 1]);

        return redirect()->route('project.tasks.index', ['project' => $project])->with('status', 'task-unassigned');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Task $task)
    {
        $taskDirectory = 'projects/p_' . $project->name . '/t_' . $task->id;
        Storage::deleteDirectory($taskDirectory);

        $task->delete();

        return redirect(route('project.tasks.index', ['project' => $project]))->with('status', 'task-deleted');
    }
}
