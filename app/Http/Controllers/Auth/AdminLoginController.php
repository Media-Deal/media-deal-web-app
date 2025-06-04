<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdminLoginController extends Controller
{
     use ValidatesRequests;
     
    public function adminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
{
    // Validate the request inputs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:4',
    ]);

    // Attempt to authenticate the admin using the 'admin' guard
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        // Login successful, redirect to admin dashboard
        return redirect()->intended(route('admin.home'));
    }

    // Login failed, redirect back with input and error
    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
