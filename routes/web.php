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

Route::get('/policies', function () {
    return view('home.policies');
});

Route::get('/faq', function () {
    return view('home.faq');
});

// Authentication Routes
Auth::routes();

// Verification Routes
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');
//Route::get('/home', [CustomAuthController::class, 'index'])->name('home');
// Role-Based Routes with Prefixes
Route::middleware('user_auth')->group(function () {
    // General Routes
    Route::get('/home', [CustomAuthController::class, 'index'])->name('home');

    // Advertiser Routes
    Route::prefix('advertiser')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\AdvertiserController::class, 'index'])->name('advertiser.dashboard');
        Route::get('profile', [App\Http\Controllers\AdvertiserController::class, 'profile'])->name('advertiser.profile');
        Route::get('manage-ads', [App\Http\Controllers\AdvertiserController::class, 'manageAds'])->name('manage.ads');

        Route::get('manage-compliance', function () {
            return view('advertiser.manage-compliance');
        });
        Route::get('manage-refund', function () {
            return view('advertiser.manage-refund');
        });
        Route::get('station-details', function () {
            return view('advertiser.station-details');
        });
    });

    // Media Organization Routes
    Route::prefix('media-org')->middleware('auth:media_org')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\MediaOrganizationController::class, 'index'])->name('media_org.dashboard');
        Route::get('profile', [App\Http\Controllers\MediaOrganizationController::class, 'profile'])->name('media_org.profile');
        // Add more routes for Media Organization
    });

    // Marketer Routes
    Route::prefix('marketer')->middleware('auth:marketer')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\MarketerController::class, 'index'])->name('marketer.dashboard');
        Route::get('profile', [App\Http\Controllers\MarketerController::class, 'profile'])->name('marketer.profile');
        // Add more routes for Marketer
    });
});
