<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MarketerController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\MediaOrganizationController;

// Public Routes
Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/terms-of-service', function () {
    return view('home.terms');
});

Route::get('/refund-policy', function () {
    return view('home.refund');
});

Route::get('/rights', function () {
    return view('home.rights');
});

Route::get('/privacy-policy', function () {
    return view('home.privacy');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/deal-support', function () {
    return view('home.deals');
});

// Advertiser Public Routes
Route::get('/advertiser', function () {
    return view('advertiser.homepage');
});

Route::get('/manage-ads', function () {
    return view('advertiser.manage-ads');
});

Route::get('/manage-compliance', function () {
    return view('advertiser.manage-compliance');
});



Route::get('/station-details', function () {
    return view('advertiser.station-details');
});

// Media Public Routes
Route::get('/media', function () {
    return view('media.homepage');
});

Route::get('/manage-account', function () {
    return view('media.manage-account');
});

// Authentication Routes
Auth::routes(['logout' => false]); // Disabling default logout route to avoid conflicts

// Verification Routes
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::get('/logout', [CustomAuthController::class, 'UserLogout'])->name('user.logout');

Route::get('/home', [CustomAuthController::class, 'index'])->name('home');
// Authenticated Routes
Route::middleware('auth')->group(function () {
    // General User Routes


    // Advertiser Routes
    Route::prefix('advertiser')->middleware(['user_auth:advertiser'])->group(function () {
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
        Route::delete('/delete-ads/{ad}', [App\Http\Controllers\AdvertiserController::class, 'deleteAd'])->name('advertiser.ads.delete');

        Route::get('/messages', [MessageController::class, 'advertiserIndex'])->name('advertiser.messages.index');
        Route::get('/messages/{id}', [MessageController::class, 'advertiserShow'])->name('advertiser.messages.show');
        Route::post('/messages/{id}/reply', [MessageController::class, 'advertiserReply'])->name('advertiser.messages.reply');
        Route::get('/notifications/{id}', [MessageController::class, 'advertiserShowNotification'])->name('notifications.show');
        Route::get('/notifications/clear', [MessageController::class, 'advertiserClearNotification'])->name('notifications.clear');
        Route::post('/messages/send', [MessageController::class, 'advertiserSendMessage'])->name('messages.send');


        Route::post('/initiate', [PaymentController::class, 'initiatePayment'])->name('advertiser.payment.initiate'); // Initiate payment
        Route::get('/callback', [PaymentController::class, 'paymentCallback'])->name('advertiser.payment.callback'); // Handle payment callback
    });

    // Media Organization Routes
    Route::prefix('media-org')->group(function () {
        Route::put('/adscompliance/{id}/update', [MediaOrganizationController::class, 'updateCompliancefile'])->name('updateCompliancefile');
        Route::put('/ad-status/{id}', [MediaOrganizationController::class, 'updateAdStatus'])->name('updateAdStatus');
        Route::get('dashboard', [App\Http\Controllers\MediaOrganizationController::class, 'index'])->name('media_org.dashboard');
        Route::get('profile', [App\Http\Controllers\MediaOrganizationController::class, 'profile'])->name('media_org.profile');
        Route::get('manage-account', [App\Http\Controllers\MediaOrganizationController::class, 'manageAccount'])->name('media_org.manage-account');
        Route::get('manage-ads', [App\Http\Controllers\MediaOrganizationController::class, 'manageAds'])->name('media_org.manage.ads');
        Route::get('manage-compliance', [App\Http\Controllers\MediaOrganizationController::class, 'manageCompliance'])->name('media_org.manage.compliance');
        Route::get('manage-payment', [App\Http\Controllers\MediaOrganizationController::class, 'managePayment'])->name('media_org.manage.payment');
        Route::get('manage-refund', [App\Http\Controllers\MediaOrganizationController::class, 'manageRefund'])->name('media_org.manage.refund');
        Route::get('manage-support', [App\Http\Controllers\MediaOrganizationController::class, 'manageSupport'])->name('media_org.manage.support');
        Route::post('store', [App\Http\Controllers\MediaOrganizationController::class, 'store'])->name('store');
        Route::post('/media_organizations/{id}/update', [App\Http\Controllers\MediaOrganizationController::class, 'updateDetails'])->name('media_organizations.update');
        Route::post('/update-details', [App\Http\Controllers\MediaOrganizationController::class, 'updateDetails'])->name('media_organizations.update');
        Route::post('/update-tvdetails', [App\Http\Controllers\MediaOrganizationController::class, 'updatetvDetails'])->name('media_organizationstv.update');
        Route::post('/update-radiodetails', [App\Http\Controllers\MediaOrganizationController::class, 'updateradioDetails'])->name('media_organizationsradio.update');
        Route::post('/update-internetdetails', [App\Http\Controllers\MediaOrganizationController::class, 'updateinternetDetails'])->name('media_organizationsinternet.update');
        Route::get('/messages', [MessageController::class, 'mediaIndex'])->name('media.messages.index');
        Route::get('/messages/{id}', [MessageController::class, 'mediaShow'])->name('media.messages.show');
        Route::post('/messages/{id}/reply', [MessageController::class, 'mediaReply'])->name('media.messages.reply');
        Route::get('/notifications/{id}', [MessageController::class, 'mediaShowNotification'])->name('media.notifications.show');
        Route::get('/notifications/clear', [MessageController::class, 'mediaClearNotification'])->name('media.notifications.clear');
        Route::post('/messages/send', [MessageController::class, 'mediaSendMessage'])->name('media.messages.send');

        // Add more routes for Media Organization
    });

    // Marketer Routes
    Route::prefix('marketer')->middleware(['user_auth:marketer'])->group(function () {
        Route::get('dashboard', [MarketerController::class, 'index'])->name('marketer.dashboard');
        Route::get('profile', [MarketerController::class, 'profile'])->name('marketer.profile');
        // Additional Marketer Routes
    });
});

// Fallback Route
Route::fallback(function () {
    return view('errors.404');
});
