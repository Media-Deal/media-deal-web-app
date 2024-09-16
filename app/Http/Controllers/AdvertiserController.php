<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index()
    {
        return view('advertiser.homepage');
    }

    public function profile()
    {
        return view('advertiser.profile');
    }

    public function manageAds()
    {
        return view('advertiser.manage-ads');
    }

    // Add other methods for advertiser functionality
}
