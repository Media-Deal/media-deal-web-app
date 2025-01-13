<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * The URL to redirect users after login based on their role.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle the user authentication and role-based redirection.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {

        // Check the user's role and redirect accordingly


        switch ($user->role) {
            case 'advertiser':
                return redirect()->route('advertiser.dashboard');
            case 'media_org':
                return redirect()->route('media_org.dashboard');
            case 'marketer':
                return redirect()->route('marketer.dashboard');
            default:
                return redirect()->route('home'); // Default redirection
        }
    }

    /**
     * Specify the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web'); // Default guard
    }
}
