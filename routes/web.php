<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;

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

Route::get('/media', function () {
    return view('media.homepage');
});

Route::get('/policies', function () {
    return view('home.policies');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Auth::routes();

Route::get('/home', [CustomAuthController::class, 'index'])->middleware('user_auth')->name('home');
// Route for displaying the verification page
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');

// Route for handling the verification code submission
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');

// Route for resending the verification code
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');
