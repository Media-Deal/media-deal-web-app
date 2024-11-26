<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;

// Public Routes
Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/advertiser', function () {
    return view('advertiser.homepage');
});

Route::get('/manage-ads', function () {
    return view('advertiser.manage-ads');
});

Route::get('/manage-compliance', function () {
    return view('advertiser.manage-compliance');
});

Route::get('/profile', function () {
    return view('advertiser.profile');
});

Route::get('/manage-refund', function () {
    return view('advertiser.manage-refund');
});
Route::get('/station-details', function () {
    return view('advertiser.station-details');
});

Route::get('/policies', function () {
    return view('home.policies');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/media', function () {
    return view('media.homepage');
});

Route::get('/manage-account', function () {
    return view('media.manage-account');
});


// Authentication Routes
Auth::routes();

// Verification Routes
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::get('/logout', [CustomAuthController::class, 'UserLogout'])->name('user.logout');
//Route::get('/home', [CustomAuthController::class, 'index'])->name('home');
// Role-Based Routes with Prefixes
Route::middleware('user_auth')->group(function () {
    // General Routes
    Route::get('/home', [CustomAuthController::class, 'index'])->name('home');


    // Advertiser Routes
    Route::prefix('advertiser')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\AdvertiserController::class, 'index'])->name('advertiser.dashboard');
        Route::get('profile', [App\Http\Controllers\AdvertiserController::class, 'profile'])->name('advertiser.profile');
        Route::get('manage-ads', [App\Http\Controllers\AdvertiserController::class, 'manageAds'])->name('advertiser.manage.ads');
        Route::get('media/{id}', [App\Http\Controllers\AdvertiserController::class, 'showMedia'])->name('advertiser.media.show');
        // Handle ad placement form submission
        Route::post('/ad-placement/{id}', [App\Http\Controllers\AdvertiserController::class, 'paceAds'])->name('ad.placement.submit');

        Route::get('manage-compliance', [App\Http\Controllers\AdvertiserController::class, 'showCompliance'])->name('manage.compliance.page');
        Route::get('manage-refund', function () {
            return view('advertiser.manage-refund');
        });
        Route::get('station-details', function () {
            return view('advertiser.station-details');
        });

        // Media Details Page
        Route::get('/media/{media}', [App\Http\Controllers\AdvertiserController::class, 'show'])->name('media.show');

        // Ad Placement Form Submission
        Route::post('/media/{media}/ad-placement', [App\Http\Controllers\AdvertiserController::class, 'placeAds'])->name('ad.placement.submit');

        // Payment Form Submission
        Route::post('/media/{media}/payments', [App\Http\Controllers\AdvertiserController::class, 'submit'])->name('payments.submit');

        // Compliance Request Form Submission
        Route::post('/media/{media}/compliance', [App\Http\Controllers\AdvertiserController::class, 'submitCompliance'])->name('compliance.submit');


        // Refund Request Form Submission
        Route::post('/media/{media}/refunds', [App\Http\Controllers\AdvertiserController::class, 'submit'])->name('refunds.submit');

        // Feedback Form Submission
        Route::post('/media/{media}/feedback', [App\Http\Controllers\AdvertiserController::class, 'submit'])->name('feedback.submit');





        // View Ad
        Route::get('/ads/{ad}', [App\Http\Controllers\AdvertiserController::class, 'viewAd'])->name('advertiser.ads.view');

        // Edit Ad
        Route::get('/ads/{ad}/edit', [App\Http\Controllers\AdvertiserController::class, 'editAdForm'])->name('advertiser.ads.edit');
        Route::put('/ads/{ad}', [App\Http\Controllers\AdvertiserController::class, 'updateAd'])->name('advertiser.ads.update');

        // Delete Ad
        Route::delete('/delete-ads/{ad}', [App\Http\Controllers\AdvertiserController::class, 'deleteAd'])->name('advertiser.ads.delete');
    });

    // Media Organization Routes
    Route::prefix('media-org')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\MediaOrganizationController::class, 'index'])->name('media_org.dashboard');
        Route::get('profile', [App\Http\Controllers\MediaOrganizationController::class, 'profile'])->name('media_org.profile');
        Route::get('manage-account', [App\Http\Controllers\MediaOrganizationController::class, 'manageAccount'])->name('media_org.manage-account');
        Route::post('store', [App\Http\Controllers\MediaOrganizationController::class, 'store'])->name('store');
        // Route::post('media-organizations/create', [App\Http\Controllers\MediaOrganizationController::class, 'createDetails'])->name('createdetails');
        Route::post('/media_organizations/{id}/update', [App\Http\Controllers\MediaOrganizationController::class, 'updateDetails'])->name('media_organizations.update');

        // Add more routes for Media Organization
    });

    // Marketer Routes
    Route::prefix('marketer')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\MarketerController::class, 'index'])->name('marketer.dashboard');
        Route::get('profile', [App\Http\Controllers\MarketerController::class, 'profile'])->name('marketer.profile');
        // Add more routes for Marketer
    });
});
