<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\SubscriberWelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    public function subscribeTONews(Request $request)
    {
        try {
            // Basic validation for email format only
            $validated = $request->validate([
                'email' => 'required|email',
            ]);

            // Check if subscriber already exists
            $existing = Subscriber::where('email', $validated['email'])->first();
            if ($existing) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are already subscribed with this email.'
                ], 409); // 409 Conflict is a good status for duplicates
            }

            // Save subscriber
            $subscriber = Subscriber::create([
                'email' => $validated['email'],
            ]);

            // Send welcome email
            Mail::to($subscriber->email)->send(new SubscriberWelcomeMail($subscriber->email));

            return response()->json([
                'status' => 'success',
                'message' => 'Thanks for subscribing! A confirmation email has been sent.'
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()['email'][0] ?? 'Invalid email address.',
            ], 422);

        } catch (\Exception $e) {
            Log::error('Subscription error: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

}
