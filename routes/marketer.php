<?php
// routes/marketer.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketerController;

// Dashboard
Route::get('dashboard', [MarketerController::class, 'index'])->name('marketer.dashboard');

// Profile and Other Routes
Route::get('profile', [MarketerController::class, 'profile'])->name('marketer.profile');

// Add more routes for Marketer
