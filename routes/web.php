<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tasks = Task::all()->where("user_id",Auth::user()->id);
    return view('tasks.index',compact("tasks"));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('tasks',TaskController::class );
Route::get('tasks/delete/{id}',[TaskController::class,"delete"])->name("tasks.delete");
Route::get('tasks/showDeletedTask',[TaskController::class,"showDeletedTask"])->name("tasks.showDeletedTask");
Route::get('tasks/restore/{id}',[TaskController::class,"restore"])->name("tasks.restore");

require __DIR__.'/auth.php';
