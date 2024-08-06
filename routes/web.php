<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});
