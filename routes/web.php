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
