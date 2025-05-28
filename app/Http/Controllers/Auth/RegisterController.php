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
use Illuminate\Support\Facades\Log;
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
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Honeypot validation
        if (!empty($request->honeypot)) {
            Log::warning('Bot detected during registration', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Registration failed'
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:advertiser,media_org,marketer',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // lowercase
                'regex:/[A-Z]/',      // uppercase
                'regex:/[0-9]/',      // number
                'regex:/[@$!%*#?&]/', // special char
            ],
            'terms' => 'required|accepted',
        ], [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'terms.accepted' => 'You must accept the terms and conditions.'
        ]);

        if ($validator->fails()) {
            Log::info('Registration validation failed', [
                'errors' => $validator->errors()->all(),
                'ip' => $request->ip(),
                'email' => $request->email
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Please correct the errors in the form',
                'errors' => $validator->errors()->messages()
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
           // Mail::to($user->email)->send(new WelcomeEmail($user));

            event(new Registered($user));

            Auth::login($user);

            Log::info('New user registered successfully', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'ip' => $request->ip()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Redirecting...',
                'redirect' => $this->redirectPath($user)
            ]);

        } catch (\Exception $e) {
            Log::error('User registration failed', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'ip' => $request->ip(),
                'email' => $request->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : 'An unexpected error occurred'
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
        try {
            switch ($data['role']) {
                case 'advertiser':
                    Advertiser::create(['user_id' => $user->id]);
                    break;
                case 'media_org':
                    MediaOrganization::create(['user_id' => $user->id]);
                    break;
                case 'marketer':
                    Marketer::create(['user_id' => $user->id]);
                    break;
            }
        } catch (\Exception $e) {
            Log::error('Failed to create role-specific record', [
                'user_id' => $user->id,
                'role' => $data['role'],
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()
            ]);
            throw $e;
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
}