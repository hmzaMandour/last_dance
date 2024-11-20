<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TeamController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//** Tasks 

Route::get('/task/create' , [TeamController::class , 'create'])->name('task.create');
Route::resource('/task' , TeamController::class);

Route::post('/invite/store/{teamId}', [InvitationController::class, 'store'])->name('invite.store');
Route::get('/invitations/{id}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
Route::get('/invitations/{id}/reject', [InvitationController::class, 'reject'])->name('invitations.reject');


Route::get('/subscribe', [TeamController::class, 'sub'])->name('subscribe');
Route::get('/subscribe/success', [TeamController::class, 'subscriptionSuccess'])->name('subscribe.success');

// In your web.php (routes file)
// Route::post('/webhooks/stripe', [TeamController::class, 'handleWebhook'])->name('stripe.webhook');





require __DIR__.'/auth.php';
