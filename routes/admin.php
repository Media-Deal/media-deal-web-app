<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;


// Admin login routes (public)
Route::get('admin/login', [AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');


// Admin routes group with middleware protection
Route::prefix('admin')->middleware(['admin'])->group(function () {

    // Admin logout
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Admin dashboard
    Route::get('home', [AdminController::class, 'index'])->name('admin.home');

    // User management routes
    Route::get('users', [AdminController::class, 'index'])->name('admin.users.index');


    // Admin User Routes
        Route::prefix('users')->group(function () {
            // manage user CRUD routes
            Route::get('/', [App\Http\Controllers\Admin\ManageUserController::class, 'index'])->name('admin.users.index');
            Route::get('/users/create', [App\Http\Controllers\Admin\ManageUserController::class, 'create'])->name('admin.users.create');
            Route::post('/users', [App\Http\Controllers\Admin\ManageUserController::class, 'store'])->name('admin.users.store');
            Route::get('/users/{user}', [App\Http\Controllers\Admin\ManageUserController::class, 'show'])->name('admin.user.view');

});

//admin manage campaigns
 Route::get('/campaign', [App\Http\Controllers\Admin\ManageCampaignsController::class, 'index'])->name('admin.campaign.index');

 //admin manage refunds
 Route::get('/refund', [App\Http\Controllers\Admin\ManageRefundController::class, 'index'])->name('admin.refund.index');




});
