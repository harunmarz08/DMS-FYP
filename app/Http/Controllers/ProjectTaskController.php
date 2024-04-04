<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAuth;
use Illuminate\Http\Request;



class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Assign a User with role 1 to a Task.
     */
    public function assign(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update(['user_id' => $validatedData['user_id']]);

        return redirect(route('project.tasks'))->with('status', 'task-assigned');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new project instance and save it to the database
        $project = Project::create([
            'name' => $validatedData['name'],
        ]);

        $count = 7; // Change the count to your desired number of tasks
        $defaultUser = 0;
        // Create tasks associated with the project
        for ($i = 1; $i <= $count; $i++) {
            $task = new Task([
                'name' => "Appendix $i",
                'project_id' => $project->id, // Associate the task with the project
                'description' => null, // Optionally include a description
                'user_id' => $defaultUser, // Optionally include a description
            ]);
            $task->save();
        }


        return redirect(route('project.index'))->with('status', 'project-created');
    }

    /**
     * Display the specified resource.
     */
    public function showTasks(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->get();
        $users = User::where('role', '1')->get();
        return view('project.tasks', ['tasks' => $tasks, 'users' => $users, 'project' => $project]);
    }

    /**
     * Display the specified resource.
     */
    public function showAssignments()
    {
        $user =  Auth::user();
        $tasks = Task::where('user_id', $user->id)->get();
        return view('project.assignment.assigned-tasks', ['tasks' => $tasks]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
