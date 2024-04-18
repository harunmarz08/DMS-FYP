<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AssignmentController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function showAssignments()
    {
        $user =  Auth::user();
        $tasks = Task::where('user_id', $user->id)->with('project')->get(); // Eager load the project relationship
        return view('project.assignment.assigned-tasks', ['tasks' => $tasks]);
    }
}
