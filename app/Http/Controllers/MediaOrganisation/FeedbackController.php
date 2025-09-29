<?php

namespace App\Http\Controllers\MediaOrganisation;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\MediaOrganization;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FeedbackController extends Controller
{
    public function ManageFeedbacks()
{
    // Get the logged-in user
    $user = Auth::user();

    if (!$user) {
        abort(403, 'Unauthorized access.');
    }

    // Find the media organization belonging to this user
    $mediaOrganization = MediaOrganization::where('user_id', $user->id)->first();

    if (!$mediaOrganization) {
        abort(404, 'Media organization not found');
    }

    // Fetch feedbacks for this media organization
    $feedbacks = Feedback::where('media_id', $mediaOrganization->id)
        ->with('user') // eager load user who gave feedback
        ->orderBy('created_at', 'desc')
        ->get();

    // Count total feedbacks
    $totalFeedbacks = $feedbacks->count();

    // (Optional) Count recent feedbacks (last 7 days)
    $recentFeedbacks = $feedbacks->where('created_at', '>=', now()->subDays(7))->count();

    return view('media_org.manage-feedbacks', [
        'feedbacks'       => $feedbacks,
        'totalFeedbacks'  => $totalFeedbacks,
        'recentFeedbacks' => $recentFeedbacks,
    ]);
}

    
}
