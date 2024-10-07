<?php
// routes/media_org.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaOrganizationController;
use App\Http\Controllers\MediaOrg\SalesManagerController;

// Dashboard
Route::get('dashboard', [MediaOrganizationController::class, 'index'])->name('media_org.dashboard');

// Profile and Other Routes
Route::get('profile', [MediaOrganizationController::class, 'profile'])->name('media_org.profile');

// Add more routes for Media Organization


Route::get('sales_manager/create', [SalesManagerController::class, 'create'])->name('sales_manager.create');
Route::post('sales_manager/store', [SalesManagerController::class, 'store'])->name('sales_manager.store');
