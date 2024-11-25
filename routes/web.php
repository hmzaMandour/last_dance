<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TeamController::class , 'index2'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //** Tasks 

    Route::get('/task/create', [TeamController::class, 'create'])->name('task.create');
    // Route::get('/task/dashboard', [TeamController::class, 'index2'])->name('dashboard');
    Route::resource('/team', TeamController::class);
    Route::get('task/calender' , [TeamController::class , 'teamcalender'])->name('teamCal');
    Route::get('/task/calender/create2', [TeamController::class, 'create2'])->name('team.calender');

    Route::post('/invite/store/{teamId}', [InvitationController::class, 'store'])->name('invite.store');
    Route::get('/invitations/{id}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
    Route::get('/invitations/{id}/reject', [InvitationController::class, 'reject'])->name('invitations.reject');


    Route::get('/subscribe', [TeamController::class, 'sub'])->name('subscribe');
    Route::get('/subscribe/success', [TeamController::class, 'subscriptionSuccess'])->name('subscribe.success');
    Route::get('/members' , [TeamController::class , 'members'])->name('team.members');
    Route::delete('/members/delete/{team}/{member}' , [TeamController::class , 'kickmembers'])->name('members.kick');

    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/calender', [TaskController::class, 'index2'])->name('calender.index');
    Route::get('/calendar/create', [TaskController::class, 'create'])->name('task.calender');
    Route::get('/tasks/todo', [TaskController::class, 'todoList'])->name('tasks.todo');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::delete('/task/delete/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

    Route::patch('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

});









require __DIR__.'/auth.php';
