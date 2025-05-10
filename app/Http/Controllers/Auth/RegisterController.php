<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Advertiser;
use App\Models\MediaOrganization;
use App\Models\Marketer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeEmail;

class RegisterController extends Controller
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Make sure this matches your view file name
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:advertiser,media_org,marketer',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
            // Role-specific fields

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            // Insert into role-specific tables
            $this->createRoleSpecificRecord($user, $request->all());

            // Send welcome email
            //Mail::to($user->email)->send(new WelcomeEmail($user));

            event(new Registered($user));

            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Redirecting...',
                'redirect' => $this->redirectPath($user)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create role-specific record
     *
     * @param User $user
     * @param array $data
     * @return void
     */
    protected function createRoleSpecificRecord(User $user, array $data)
    {
        switch ($data['role']) {
            case 'advertiser':
                Advertiser::create([
                    'user_id' => $user->id,

                ]);
                break;
            case 'media_org':
                MediaOrganization::create([
                    'user_id' => $user->id,

                ]);
                break;
            case 'marketer':
                Marketer::create([
                    'user_id' => $user->id,

                ]);
                break;
        }
    }

    /**
     * Get the post register redirect path based on user role.
     *
     * @param  \App\Models\User  $user
     * @return string
     */
    protected function redirectPath(User $user)
    {
        // Customize redirect paths based on user role
        switch ($user->role) {
            case 'advertiser':
                return route('advertiser.dashboard');
            case 'media_org':
                return route('media.dashboard');
            case 'marketer':
                return route('marketer.dashboard');
            default:
                return route('home');
        }
    }
}
