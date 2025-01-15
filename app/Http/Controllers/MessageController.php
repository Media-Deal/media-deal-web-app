<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderNotification;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Message; // Assuming you have a Message model
use App\Models\User;

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
        $validated = $request->validate([
            'reply' => 'required|string|max:5000',
        ]);

        // Find the message
        $message = Message::where('advertiser_id', Auth::id())->findOrFail($id);

        // Add the reply to the message
        $message->update([
            'sender_type' => 'advertiser',
            'reply' => $validated['reply'],
            'replied_at' => now(),
        ]);

        // Fetch email of the recipient media organization
        $mediaOrganization = User::findOrFail($message->media_organization_id);
        $mediaEmail = $mediaOrganization->email;

        // Send email to media organization
        Mail::to($mediaEmail)->send(new OrderNotification('You have received a reply to your order!'));

        // Send email to admin with message details
        $adminEmail = 'support@mediadeal.ng'; // Replace with actual admin email
        Mail::to($adminEmail)->send(new OrderNotification("Reply Details:\n\n" . $validated['reply']));

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

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'sender_type' => 'required|in:advertiser',
            'recipient_id' => 'required', // Adjust depending on your recipient table
            'message' => 'required|string|max:1000',
        ]);

        // Save the message to the database
        $message = Message::create([
            'advertiser_id' => Auth::id(),
            'media_organization_id' => $validated['recipient_id'],
            'sender_type' => $validated['sender_type'],
            'message' => $validated['message'],
        ]);

        // Fetch email of the recipient media organization
        $mediaOrganization = User::findOrFail($validated['recipient_id']);
        $mediaEmail = $mediaOrganization->email;

        // Send email to media organization
        Mail::to($mediaEmail)->send(new OrderNotification('You have a new order!'));

        // Send email to admin with message details
        $adminEmail = 'support@mediadeal.ng'; // Replace with actual admin email
        Mail::to($adminEmail)->send(new OrderNotification("Message Details:\n\n" . $validated['message']));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
