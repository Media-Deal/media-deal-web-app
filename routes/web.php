<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;




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

Route::get('/radio-stations', function () {
    return view('home.radio');
});

Route::get('/tv-stations', function () {
    return view('home.tv');
});

Route::get('/online-influencers', function () {
    return view('home.online');
});

// Media Public Routes
Route::get('/media', function () {
    return view('media.homepage');
});



// Pending approval routes
Route::get('/pending-approval', [LoginController::class, 'pendingApproval'])->name('pending.approval');
Route::get('/check-approval-status', [LoginController::class, 'checkApprovalStatus'])->name('check.approval.status');

// Authentication Routes
// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    // Password reset routes...
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Your other protected routes...
});

// Verification Routes
Route::get('/verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
Route::post('/verify-code', [CustomAuthController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [CustomAuthController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::get('/logout', [CustomAuthController::class, 'UserLogout'])->name('user.logout');
Route::get('/home', [CustomAuthController::class, 'index'])->name('home');


// Password Reset Routes
// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Include route files for each user type
    require __DIR__ . '/advertiser.php';
    require __DIR__ . '/media.php';
    require __DIR__ . '/marketer.php';
});



require __DIR__ . '/admin.php';




// Fallback Route
Route::fallback(function () {
    return view('errors.404');
});
