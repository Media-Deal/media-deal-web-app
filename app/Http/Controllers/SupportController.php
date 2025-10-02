<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;

class SupportController extends Controller
{
    public function sendSupport(Request $request)
    {
        // ✅ Validate input
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'subject' => 'required|string',
            'type'    => 'required|string',
        ]);

        try {
            // ✅ Use the same mail from your .env setup
            $supportEmail = config('mail.from.address');

            // ✅ Send plain text mail (can later upgrade to HTML)
            Mail::raw("
                New Support Request
                
                -----------------
                Name: {$data['name']}
                Email: {$data['email']}
                Subject: {$data['subject']}
                Type: {$data['type']}
            ", function ($message) use ($data, $supportEmail) {
                $message->to($supportEmail)
                        ->subject('New Support Request: ' . $data['subject']);
            });

            return response()->json([
                'message' => 'Support request sent successfully!'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to send support request. Please try again later.',
                'error'   => $e->getMessage(), // remove in production if you don’t want users seeing it
            ], 500);
        }
    }
}
