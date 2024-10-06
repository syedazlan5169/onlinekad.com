<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\KadController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\HomeController;
use App\Models\Guestbook;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::view('katalog', 'katalog')->name('katalog');
Route::view('pakej', 'pakej')->name('pakej');
Route::view('tutorial', 'tutorial')->name('tutorial');
Route::post('/tulis-ucapan', [GuestbookController::class, 'create'])->name('tulis-ucapan');
Route::post('/create-rsvp', [RsvpController::class, 'create'])->name('create-rsvp');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');

    //KadController
    Route::get('/senarai-kad', [KadController::class, 'index'])->name('senarai-kad');
    Route::get('/kad-details/{id}', [KadController::class, 'showDetails'])->name('kad-details');
    Route::get('/kad-edit/{id}', [KadController::class, 'showEdit'])->name('kad-edit');
    Route::patch('/kad-update/{id}', [KadController::class, 'patch'])->name('kad-update');

    //GuestbookController
    Route::delete('/wish/{id}', [GuestbookController::class, 'destroy']);

    //Tempah Kad
    Route::get('/form-tempah/{id}', function ($id) {
        return view('form-tempah', ['id' => $id]);
    })->name('form-tempah');

    Route::post('/tempah', [KadController::class, 'tempahKad'])->name('tempah');
});

Route::get('/invitation/{slug}', [KadController::class, 'show'])->name('invitation.show');

require __DIR__.'/auth.php';
