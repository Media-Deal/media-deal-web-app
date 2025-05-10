<?php

use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('advertiser')->middleware(['user_auth', 'role:advertiser'])->group(function () {
    Route::get('dashboard', [AdvertiserController::class, 'index'])->name('advertiser.dashboard');
    Route::get('profile', [AdvertiserController::class, 'profile'])->name('advertiser.profile');
    Route::put('profile', [AdvertiserController::class, 'updateProfile'])->name('advertiser.profile.update');
    Route::get('manage-ads', [AdvertiserController::class, 'manageAds'])->name('advertiser.manage.ads');
    Route::get('media/{id}', [AdvertiserController::class, 'showMedia'])->name('advertiser.media.show');
    Route::get('media-organization', [AdvertiserController::class, 'allMedia'])->name('advertiser.click.place.ads');

    // Ad Placement Form Submission
    Route::post('/media/{media}/ad-placement', [AdvertiserController::class, 'placeAds'])->name('advertiser.media.ad.placement');

    Route::get('manage-compliance', [AdvertiserController::class, 'showCompliance'])->name('advertiser.manage.compliance');
    Route::get('manage-refund', function () {
        return view('advertiser.manage-refund');
    })->name('advertiser.manage.refund');

    Route::get('station-details', function () {
        return view('advertiser.station-details');
    })->name('advertiser.station.details');

    // Payment Form Submission
    Route::post('/media/{media}/payments', [AdvertiserController::class, 'submitPayments'])->name('advertiser.payments.submit');

    // Compliance Request Form Submission
    Route::post('/media/{media}/compliance', [AdvertiserController::class, 'submitCompliance'])->name('advertiser.compliance.submit');

    // Refund Request Form Submission
    Route::post('/media/{media}/refunds', [AdvertiserController::class, 'submitRefunds'])->name('advertiser.refunds.submit');

    Route::get('/manage-refund', [AdvertiserController::class, 'showRefunds'])->name('advertiser.manage.refunds.page');

    // Feedback Form Submission
    Route::post('/media/{media}/feedback', [AdvertiserController::class, 'submitFeedback'])->name('advertiser.feedback.submit');

    // View Ad
    Route::get('/ads/{ad}', [AdvertiserController::class, 'viewAd'])->name('advertiser.ads.view');

    // Edit Ad
    Route::get('/ads/{ad}/edit', [AdvertiserController::class, 'editAdForm'])->name('advertiser.ads.edit');
    Route::put('/ads/{ad}', [AdvertiserController::class, 'updateAd'])->name('advertiser.ads.update');
    Route::get('/transactions', [AdvertiserController::class, 'AdvertiserPaymentHistoy'])->name('advertiser.transactions');

    // Delete Ad
    Route::delete('/delete-ads/{ad}', [AdvertiserController::class, 'deleteAd'])->name('advertiser.ads.delete');

    Route::get('/messages', [MessageController::class, 'advertiserIndex'])->name('advertiser.messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'advertiserShow'])->name('advertiser.messages.show');
    Route::post('/messages/{id}/reply', [MessageController::class, 'advertiserReply'])->name('advertiser.messages.reply');
    Route::get('/notifications/{id}', [MessageController::class, 'advertiserShowNotification'])->name('notifications.show');
    Route::get('/notifications/clear', [MessageController::class, 'advertiserClearNotification'])->name('notifications.clear');
    Route::post('/messages/send', [MessageController::class, 'advertiserSendMessage'])->name('messages.send');

    Route::post('/initiate', [PaymentController::class, 'initiatePayment'])->name('advertiser.payment.initiate');
    Route::get('/callback', [PaymentController::class, 'handleCallback'])->name('advertiser.payment.callback');
});
