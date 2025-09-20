<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MediaContactController extends Controller
{
   public function send(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    $data = [
        'name'    => $request->name,
        'email'   => $request->email,
        'subject' => $request->subject,
        'body'    => $request->message,
    ];

    // ✅ Send to support
    Mail::send('emails.contact', $data, function ($message) use ($data) {
        $message->to('support@medialdeal.ng')
                ->subject($data['subject'])
                ->replyTo($data['email']);
    });

    // ✅ Send confirmation back to the sender
    Mail::send('emails.confirmation', $data, function ($message) use ($data) {
        $message->to($data['email'])
                ->subject('We received your message - MedialDeal Support');
    });

    return back()->with('success', 'Your message has been sent successfully! A confirmation has been emailed to you.');
}

}
