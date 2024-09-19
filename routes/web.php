<?php

use App\Http\Controllers\KadController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('/');
Route::view('katalog', 'katalog')->name('katalog');
Route::view('pakej', 'pakej')->name('pakej');
Route::view('tutorial', 'tutorial')->name('tutorial');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
});

Route::get('/n002', [KadController::class, 'show'])->name('n002');

require __DIR__.'/auth.php';
