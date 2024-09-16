<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketerController extends Controller
{
    public function index()
    {
        return view('marketer.dashboard');
    }

    public function profile()
    {
        return view('marketer.profile');
    }

    // Add other methods for marketer functionality
}
