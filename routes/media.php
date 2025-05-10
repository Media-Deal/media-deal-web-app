<?php

use App\Http\Controllers\MediaOrganizationController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('media-org')->middleware(['user_auth', 'role:media_org'])->group(function () {
    Route::put('/adscompliance/{id}/update', [MediaOrganizationController::class, 'updateCompliancefile'])->name('updateCompliancefile');
    Route::put('/ad-status/{id}', [MediaOrganizationController::class, 'updateAdStatus'])->name('updateAdStatus');
    Route::get('dashboard', [MediaOrganizationController::class, 'index'])->name('media_org.dashboard');
    Route::get('dashboard', [MediaOrganizationController::class, 'index'])->name('media.dashboard');
    Route::get('profile', [MediaOrganizationController::class, 'profile'])->name('media_org.profile');
    Route::get('manage-account', [MediaOrganizationController::class, 'manageAccount'])->name('media_org.manage-account');
    Route::get('manage-ads', [MediaOrganizationController::class, 'manageAds'])->name('media_org.manage.ads');
    Route::get('manage-compliance', [MediaOrganizationController::class, 'manageCompliance'])->name('media_org.manage.compliance');
    Route::get('manage-payment', [MediaOrganizationController::class, 'managePayment'])->name('media_org.manage.payment');
    Route::get('manage-refund', [MediaOrganizationController::class, 'manageRefund'])->name('media_org.manage.refund');
    Route::get('manage-support', [MediaOrganizationController::class, 'manageSupport'])->name('media_org.manage.support');
    Route::post('store', [MediaOrganizationController::class, 'store'])->name('store');
    Route::post('/media_organizations/{id}/update', [MediaOrganizationController::class, 'updateDetails'])->name('media_organizations.update');
    Route::post('/update-details', [MediaOrganizationController::class, 'updateDetails'])->name('media_organizations.update');
    Route::post('/update-tvdetails', [MediaOrganizationController::class, 'updatetvDetails'])->name('media_organizationstv.update');
    Route::post('/update-radiodetails', [MediaOrganizationController::class, 'updateradioDetails'])->name('media_organizationsradio.update');
    Route::post('/update-internetdetails', [MediaOrganizationController::class, 'updateinternetDetails'])->name('media_organizationsinternet.update');

    Route::get('/messages', [MessageController::class, 'mediaIndex'])->name('media.messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'mediaShow'])->name('media.messages.show');
    Route::post('/messages/{id}/reply', [MessageController::class, 'mediaReply'])->name('media.messages.reply');
    Route::get('/notifications/{id}', [MessageController::class, 'mediaShowNotification'])->name('media.notifications.show');
    Route::get('/notifications/clear', [MessageController::class, 'mediaClearNotification'])->name('media.notifications.clear');
    Route::post('/messages/send', [MessageController::class, 'mediaSendMessage'])->name('media.messages.send');
});
