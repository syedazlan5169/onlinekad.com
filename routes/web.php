<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('/');
Route::view('katalog', 'katalog')->name('katalog');
Route::view('pakej', 'pakej')->name('pakej');
Route::view('tutorial', 'tutorial')->name('tutorial');
Route::view('n002', 'kad.base_template')->name('n002');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
