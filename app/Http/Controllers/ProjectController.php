<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        Session::forget(['tasks', 'users', 'documents']);

        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created Project and Task in storage.
     * 
     * Required: User id - 0 must exist as default user
     */
    public function createProject(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'created_by' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($validatedData['created_by']);

        // Create a new project instance and save it to the database
        $project = Project::create([
            'name' => $validatedData['name'],
            'created_by' => $user->name,
        ]);

        $projectDirectory = 'projects/p_' . $project->name;
        Storage::makeDirectory($projectDirectory);

        return redirect(route('project.index'))->with('status', 'project-created');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Project $project)
    {

        $user = User::findOrFail(auth()->user()->id); // Example: Retrieve the authenticated user
        $storedPasswordHash = $user->password;

        // Hash the provided password for comparison
        $providedPassword = $request->password;
        $providedPasswordHash = Hash::make($providedPassword);

        $projectDirectory = 'projects/p_' . $project->name;
        Storage::deleteDirectory($projectDirectory);

        if (Hash::check($providedPassword, $storedPasswordHash)) {
            $project->delete();
            return redirect(route('project.index'))->with('status', 'project-deleted');
        } else {
            return redirect(route('project.index'))->with('status', 'wrong-password');
        }
    }
}
