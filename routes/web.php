<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
