<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Assuming you have a Message model
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index()
    {
        // Retrieve messages for the authenticated advertiser
        $advertiserId = auth()->id();

        //$messages = Message::where('advertiser_id', Auth::id())->latest()->get();
        $messages = Message::with('mediaOrganization')->where('advertiser_id', $advertiserId)->orderBy('created_at', 'desc')->get();


        return view('advertiser.message', compact('messages'));
    }


    public function mediaMessage()
    {
        // Retrieve messages for the authenticated advertiser
        $advertiserId = auth()->id();

        //$messages = Message::where('advertiser_id', Auth::id())->latest()->get();
        $messages = Message::where('advertiser_id', $advertiserId)->orderBy('created_at', 'desc')->get();


        return view('advertiser.message', compact('messages'));
    }

    /**
     * Show the form for replying to a message.
     */
    public function show($id)
    {
        // Find the message by ID or fail
        $message = Message::with('mediaOrganization')->where('advertiser_id', Auth::id())->findOrFail($id);

        return view('advertiser.reply', compact('message'));
    }

    /**
     * Reply to a message.
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:5000',
        ]);

        // Find the message
        $message = Message::where('advertiser_id', Auth::id())->findOrFail($id);

        // Add the reply to the message
        $message->update([
            'reply' => $request->input('reply'),
            'replied_at' => now(),
        ]);

        return redirect()->route('advertiser.messages.index')->with('success', 'Reply sent successfully!');
    }

    public function showNotification($id)
    {
        $message = Message::findOrFail($id);
        return view('advertiser.message', compact('message'));
    }

    public function clearNotification()
    {
        Message::truncate();
        return redirect()->back()->with('success', 'All notifications cleared.');
    }
}
