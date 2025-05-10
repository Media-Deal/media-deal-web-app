<?php

use App\Http\Controllers\MarketerController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketer')->middleware(['user_auth', 'role:marketer'])->group(function () {
    Route::get('dashboard', [MarketerController::class, 'index'])->name('marketer.dashboard');
    Route::get('profile', [MarketerController::class, 'profile'])->name('marketer.profile');
    // Additional Marketer Routes can be added here
});
