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
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\NewKad;
use App\Mail\NewPayment;
use App\Models\Guestbook;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Middleware\TrackVisitor;


Route::get('/', [HomeController::class, 'index'])->name('/')->middleware('track-visitor');
Route::get('pakej', [PakejController::class, 'index'])->name('pakej.show');
//Route::get('katalog', [KatalogController::class, 'index'])->name('katalog.show');
Route::view('hubungi-kami', 'hubungi-kami')->name('hubungi-kami.show');
Route::view('katalog', 'katalog')->name('katalog.show');
Route::view('tutorial', 'tutorial')->name('tutorial.show');
Route::view('dasar-privasi', 'dasar-privasi')->name('dasar-privasi.show');
Route::post('/send-feedback', [FeedbackController::class, 'create'])->name('send-feedback');
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

        // Promotion Management Dashboard
        Route::get('admin/promotions', [PromotionController::class, 'index'])->name('admin.promotions.index');
        Route::get('admin/promotions/create', [PromotionController::class, 'create'])->name('admin.promotions.create');
        Route::post('admin/promotions', [PromotionController::class, 'store'])->name('admin.promotions.store');
        Route::get('admin/promotions/{id}', [PromotionController::class, 'show'])->name('admin.promotions.show');
        Route::get('admin/promotions/{id}/edit', [PromotionController::class, 'edit'])->name('admin.promotions.edit');
        Route::put('admin/promotions/{id}', [PromotionController::class, 'update'])->name('admin.promotions.update');
        Route::delete('admin/promotions/{id}', [PromotionController::class, 'destroy'])->name('admin.promotions.destroy');
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
Route::get('/invitation/{slug}', [KadController::class, 'show'])->middleware('track-visitor');
Route::get('/preview/{slug}', [KadController::class, 'showPreview']);


//Mail testing
Route::get('/send-test-email', function () {
    //if (app()->environment('local'))
    //{
        try {
            Mail::to('syedazlan5169@gmail.com')->send(new NewPayment());
        } catch (\Exception $e) {
            Log::error('Email failed: ' . $e->getMessage());
            return 'Email failed. Check logs for details.';
        }

        return 'Test email sent!';
    //}

    //abort(403, 'Unauthorized action.');

});


require __DIR__.'/auth.php';
