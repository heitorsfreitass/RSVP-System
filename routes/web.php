<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RSVPController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('events', EventController::class)->middleware('auth');
Route::post('/events/{event}/rsvp', [RSVPController::class, 'store'])->name('events.rsvp')->middleware('auth');
Route::delete('/events/{event}/rsvp', [RSVPController::class, 'destroy'])->name('events.rsvp.cancel')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
