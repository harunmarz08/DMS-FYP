<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Root
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Admin 
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admin')->group(function () {
    // Profile 
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    // Manage User
    Route::get('/admin/manage-users', [ManageUserController::class, 'index'])->name('admin.manage-users.list');
    Route::get('/admin/manage-users/edit-user-{user}', [ManageUserController::class, 'edit'])->name('admin.manage-users.partials.edit-user');
    Route::patch('/admin/manage-users/update-user-{user}', [ManageUserController::class, 'update'])->name('admin.manage-users.update');
    Route::get('/admin/manage-users/create-user', [ManageUserController::class, 'create'])->name('admin.manage-users.partials.create-user');
    Route::delete('/admin/manage-users/delete-user-{user}', [ManageUserController::class, 'destroy'])->name('admin.manage-users.delete-user');
    Route::post('/admin/manage-users/store', [ManageUserController::class, 'store'])->name('admin.manage-users.store-user');
});

// User
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/notification', [ProjectController::class, 'notification']);
    Route::post('/project/create', [ProjectController::class, 'createProject'])->name('project.create');
    Route::delete('/project/{project}/delete', [ProjectController::class, 'destroy'])->name('project.destroy');

    // Task 
    Route::get('/{project}/tasks', [TaskController::class, 'index'])->name('project.tasks.index');
    Route::post('/{project}/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::put('/{project}/{task}/update', [TaskController::class, 'update'])->name('task.update');
    Route::post('/{project}/{task}/upload', [TaskController::class, 'store'])->name('task.upload');
    Route::post('/tasks/assigning-{task}-{project}', [TaskController::class, 'assign'])->name('task.assign');
    Route::post('/tasks/unassigning-{task}-{project}', [TaskController::class, 'unassign'])->name('task.unassign');
    Route::delete('/{project}/{task}/delete', [TaskController::class, 'destroy'])->name('task.destroy');

    // Assignment 
    Route::get('/assignment', [AssignmentController::class, 'showAssignments'])->name('project.assignment.assigned-tasks');

    // Notification 
    Route::post('/notifications/markasread/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/markasunread/{id}', [NotificationController::class, 'markAsUnread'])->name('notifications.unread');

    // Document
    Route::get('/{project}/doc/KK3-template', [DocumentController::class, 'index'])->name('project.template.KK3');
    Route::get('/doc-print-to-template', [DocumentController::class, 'printContentToTemplate'])->name('project.template.create-doc');
    Route::post('/{project}/doc-saving-draft', [DocumentController::class, 'saveDraft'])->name('project.template.save-draft');
    Route::get('/doc/download', [DocumentController::class, 'download'])->name('doc.download');
});



// Test
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');

Route::post('/route1', [ProductController::class, 'handleRoute1'])->name('route1');
Route::post('/route2', [ProductController::class, 'handleRoute2'])->name('route2');
Route::post('/route3', [ProductController::class, 'handleRoute3'])->name('route3');

require __DIR__ . '/auth.php';

require __DIR__ . '/adminauth.php';
