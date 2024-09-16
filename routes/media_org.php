<?php
// routes/media_org.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaOrganizationController;

// Dashboard
Route::get('dashboard', [MediaOrganizationController::class, 'index'])->name('media_org.dashboard');

// Profile and Other Routes
Route::get('profile', [MediaOrganizationController::class, 'profile'])->name('media_org.profile');

// Add more routes for Media Organization
