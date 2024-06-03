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
        $userId = auth()->id(); // Get the ID of the authenticated user
        $projects = Project::where('user_id', $userId)->orWhereJsonContains('collaborators', [['id' => $userId]])
        ->get(); // Only get projects created by the authenticated user

        Session::forget(['tasks', 'users', 'documents']);
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function notification()
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
            'user_id' => 'required|exists:users,id',
        ]);

        // dd(Auth::id());
        $user = Auth::user();
        
        // Create a new project instance and save it to the database
        $project = Project::create([
            'name' => $validatedData['name'],
            'user_id' => $user->id,
            'created_by' => $user->name,
            'status' => 'New',
        ]);

        $projectDirectory = 'projects/' . $user->name . '/p_' . $project->name . '/t_main';
        Storage::makeDirectory($projectDirectory);

        return redirect(route('project.index'))->with('status', 'project-created');
    }

    /**
     * Show the form for adding collaborator
     */
    public function showAddCollaboratorsForm(Project $project)
    {
        // Fetch all users except the project creator
        $users = User::where('id', '!=', Auth::id())->get();

        return view('project.add-collaborators', compact('project', 'users'));
    }

    public function addCollaborators(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'collaborators' => 'required|array',
            'collaborators.*' => 'exists:users,id',
        ]);

        $newCollaborators = [];

        if (!empty($validatedData['collaborators'])) {
            foreach ($validatedData['collaborators'] as $userId) {
                $user = User::findOrFail($userId);
                $newCollaborators[] = ['id' => $user->id, 'email' => $user->email, 'role' => $user->role];
            }
        }

        // Update the project with the new list of collaborators
        $project->collaborators = $newCollaborators;
        $project->save();

        return redirect()->route('project.index')->with('status', 'Collaborators added successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function setStatus(Request $request, Project $project)
    {
        if ($project->status === 'On-going') {
            $project->status = 'Completed';
            $statusMessage = 'Marked as Completed';
        } else {
            $project->status = 'On-going';
            $statusMessage = 'Marked as On-going';
        }
    
        // Save the updated status
        $project->save();
    
        // Redirect back with a status message
        return redirect()->route('project.index')->with('status', $statusMessage);
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

        $projectDirectory = 'projects/' . $user->name . '/p_' . $project->name;
        
        if (Hash::check($providedPassword, $storedPasswordHash)) {
            $project->delete();
            Storage::deleteDirectory($projectDirectory);
            return redirect(route('project.index'))->with('status', 'project-deleted');
        } else {
            return redirect(route('project.index'))->with('status', 'wrong-password');
        }
    }
}
