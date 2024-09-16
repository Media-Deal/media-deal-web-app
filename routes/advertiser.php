<?php
// routes/advertiser.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertiserController;

// Dashboard
Route::get('dashboard', [AdvertiserController::class, 'index'])->name('advertiser.dashboard');

// Profile and Other Routes
Route::get('profile', [AdvertiserController::class, 'profile'])->name('advertiser.profile');

// Add more routes for Advertiser