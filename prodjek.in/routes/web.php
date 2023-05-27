<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('main');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::get('/auth/google',[GoogleController::class, 'redirectToGoogle'])->name('googleLogin');
Route::get('/auth/google/callback',[GoogleController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', [WorkspaceController::class, 'viewHome'])->name('viewHome');

Route::get('/project-list', [WorkspaceController::class, 'viewProjects'])->name('viewProjects');
Route::post('/add-project', [WorkspaceController::class, 'createProject'])->name('createProject');

Route::get('/project-details/{id}', [WorkspaceController::class, 'viewDetails'])->name('viewDetails');
Route::post('/add-task/{id}', [WorkspaceController::class, 'createTask'])->name('createTask');
Route::patch('/check-task/{id}', [WorkspaceController::class, 'checkTask'])->name('checkTask');
Route::patch('/uncheck-task/{id}', [WorkspaceController::class, 'uncheckTask'])->name('uncheckTask');
Route::delete('/delete-task/{id}', [WorkspaceController::class, 'deleteTask'])->name('deleteTask');

Route::post('/add-assigned-member/{id}', [WorkspaceController::class, 'addAssignedMembers'])->name('addAssignedMembers');
Route::delete('/delete-assigned-member', [WorkspaceController::class, 'deleteAssignedMember'])->name('deleteAssignedMember');