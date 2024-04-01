<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjectTaskController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project
    Route::get('/project', [ProjectTaskController::class, 'index'])->name('project.index');
    Route::post('/project/store', [ProjectTaskController::class, 'store'])->name('project.store');
    Route::get('/project/{project}', [ProjectTaskController::class, 'show'])->name('project.tasks');
    Route::post('/project/task-assignment', [ProductController::class, 'assign'])->name('project.assign');
});

// Test
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'insert'])->name('product.insert');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');

require __DIR__ . '/auth.php';

require __DIR__ . '/adminauth.php';
