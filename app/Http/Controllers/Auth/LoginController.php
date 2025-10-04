<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            // Check if user is approved
            if (!$user->is_approved) {
                $request->session()->regenerate();

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful! Checking account status...',
                    'redirect' => route('pending.approval')
                ]);
            }

            // Check if email is verified (if you're using email verification)
            if (isset($user->is_verified) && $user->is_verified == 0) {
                $request->session()->regenerate();

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful! Redirecting to email verification...',
                    'redirect' => route('verify', ['id' => $user->id])
                ]);
            }

            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login successful! Redirecting...',
                'redirect' => $this->redirectPath()
            ]);
        }

        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'These credentials do not match our records.',
            'errors' => [
                'email' => 'These credentials do not match our records.'
            ]
        ], 422);
    }

    /**
     * Get the post login redirect path.
     *
     * @return string
     */
    protected function redirectPath()
    {
        $user = Auth::user();

        // Double check approval status before redirecting to dashboard
        if (!$user->is_approved) {
            return route('pending.approval');
        }

        switch ($user->role) {
            case 'advertiser':
                return route('advertiser.dashboard');
            case 'media_org':
                return route('media_org.dashboard');
            case 'marketer':
                return route('marketer.dashboard');
            default:
                return route('home');
        }
    }

    /**
     * Show pending approval page
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function pendingApproval()
    {
        // If user is not authenticated, redirect to login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // If user is approved, redirect them to their dashboard
        if ($user->is_approved) {
            return redirect($this->redirectPath());
        }

        return view('auth.pending-approval');
    }

    /**
     * Check if user has been approved (for AJAX calls)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkApprovalStatus(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'approved' => false,
                'redirect' => route('login')
            ]);
        }

        $user = Auth::user();

        if ($user->is_approved) {
            return response()->json([
                'approved' => true,
                'redirect' => $this->redirectPath()
            ]);
        }

        return response()->json([
            'approved' => false,
            'message' => 'Your account is still pending approval.'
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
