<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\KadController;
use App\Http\Controllers\RsvpController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('/');
Route::view('katalog', 'katalog')->name('katalog');
Route::view('pakej', 'pakej')->name('pakej');
Route::view('tutorial', 'tutorial')->name('tutorial');
Route::post('/tulis-ucapan', [GuestbookController::class, 'create'])->name('tulis-ucapan');
Route::post('/create-rsvp', [RsvpController::class, 'create'])->name('create-rsvp');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
    Route::view('tempah', 'tempah')->name('tempah');
    Route::view('senarai-kad', 'senarai-kad')->name('senarai-kad');

    //Tempah Kad
    Route::post('/tempah', [KadController::class, 'tempahKad'])->name('tempah');
});

Route::get('/invitation/{slug}', [KadController::class, 'show'])->name('invitation.show');

require __DIR__.'/auth.php';
