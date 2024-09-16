<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'advertiser':
                return redirect('/advertiser/dashboard');
            case 'media_org':
                return redirect('/media-org/dashboard');
            case 'marketer':
                return redirect('/marketer/dashboard');
            default:
                return redirect('/home');
        }
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
