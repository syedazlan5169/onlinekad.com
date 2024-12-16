<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\KadController;
use App\Http\Controllers\PakejController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ToyyibpayController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\NewKad;
use App\Models\Guestbook;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('pakej', [PakejController::class, 'index'])->name('pakej.show');
//Route::get('katalog', [KatalogController::class, 'index'])->name('katalog.show');
Route::view('katalog', 'katalog')->name('katalog.show');
Route::view('tutorial', 'tutorial')->name('tutorial.show');
Route::post('/tulis-ucapan', [GuestbookController::class, 'create'])->name('tulis-ucapan');
Route::post('/create-rsvp', [RsvpController::class, 'create'])->name('create-rsvp');
Route::post('/toyyibpay-callback', [ToyyibpayController::class, 'handleToyyibpayCallback'])->name('toyyibpay-callback');

Route::middleware(['auth'])->group(function () {
    Route::view('profile', 'profile')->name('profile');

    Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function () {
        //AdminController
        Route::get('/senarai-kad', [KadController::class, 'index'])->name('senarai-kad.show');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.show');
        Route::delete('/user/{id}', [AdminController::class, 'destroyUser']);
    });
    
    //KadController
    Route::get('/senarai-kad', [KadController::class, 'index'])->name('senarai-kad.show');
    Route::get('/kad-guestbook/{id}', [KadController::class, 'showGuestbook'])->name('kad-guestbook.show');
    Route::get('/kad-rsvp/{id}', [KadController::class, 'showRsvp'])->name('kad-rsvp.show');
    Route::get('/kad-edit/{id}', [KadController::class, 'showEdit'])->name('kad-edit.show');
    Route::patch('/kad-update/{id}', [KadController::class, 'patch'])->name('kad.update');
    Route::delete('/kad/{id}', [KadController::class, 'destroy']);

    //GuestbookController
    Route::delete('/wish/{id}', [GuestbookController::class, 'destroy']);

    //RsvpController
    Route::delete('/rsvp/{id}', [RsvpController::class, 'destroy']);

    //ToyyibpayController
    Route::get('/create-bill/{id}', [ToyyibpayController::class, 'createBill'])->name('create-bill');
    Route::get('/payment-status', [ToyyibpayController::class, 'handleToyyibpayRedirect'])->name('payment-status');

    //Tempah Kad
    Route::get('/form-tempah/{id}', [KadController::class, 'showFormTempah'])->name('form-tempah.show');
    Route::post('/tempah', [KadController::class, 'tempahKad'])->name('tempah');

    //Download RSVP
    Route::get('/export-rsvp', [RsvpController::class, 'exportToExcel'])->name('export-rsvp');
});

//GoogleController
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Show Kad
Route::get('/invitation/{slug}', [KadController::class, 'show']);
Route::get('/preview/{slug}', [KadController::class, 'showPreview']);


//Mail testing
Route::get('/send-test-email', function () {
    if (app()->environment('local'))
    {
        try {
            Mail::to('syedazlan5169@gmail.com')->send(new NewKad());
        } catch (\Exception $e) {
            Log::error('Email failed: ' . $e->getMessage());
            return 'Email failed. Check logs for details.';
        }

        return 'Test email sent!';
    }

    abort(403, 'Unauthorized action.');

});


require __DIR__.'/auth.php';
