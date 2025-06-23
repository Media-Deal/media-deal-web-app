<?php

namespace App\Http\Controllers\Advertiser;

use App\Mail\Adsplacement;
use Cloudinary\Cloudinary;
use App\Models\AdPlacement;
use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdPlacementNotification;
use Illuminate\Support\Facades\Validator;

class PlaceAdsController extends Controller
{
    /**
     * Show ad placement form
     */
    public function create(MediaOrganization $media)
    {
        return view('advertiser.place-ads.create', compact('media'));
    }

    /**
     * Handle ad placement submission
     */
    public function store(Request $request, MediaOrganization $media)
    {
        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Political,Commercial,Public Service,Infomercial,Religious',
            'type' => 'required|string|in:Campaign,Event Sponsorship,Hype,Interview,Jingle,Promotion,Sponsored Program,Sponsored Message',
            'content_type' => 'required|string|in:Yes,No,Not Required',
            'target_audience' => 'required|string|in:Children (0-12),Teens (13-17),Youths (18-34),Older (35-54),Senior (55+)',
            'target_location' => 'required|string|in:State,National,International',
            'duration' => 'required|string|in:Daily,Weekly,Monthly,Quarterly,Yearly',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ];

        // Conditionally require file if content_type is 'Yes'
        if ($request->content_type === 'Yes') {
            $rules['upload_file'] = 'required|file|mimes:jpg,jpeg,png,pdf,mp4,mp3|max:51200'; // 50MB
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Log::error('Ad placement validation failed', [
                'errors' => $validator->errors(),
                'user' => Auth::id(),
                'media' => $media->id
            ]);

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file upload
        $fileUrl = null;
        $publicId = null;

        if ($request->hasFile('upload_file') && $request->file('upload_file')->isValid()) {
            try {
                $cloudinary = new Cloudinary();
                $uploadApi = new UploadApi();

                $response = $uploadApi->upload($request->file('upload_file')->getRealPath(), [
                    'folder' => 'mediadeal/ad_placements/' . $media->id,
                    'resource_type' => 'auto',
                    'public_id' => 'ad_' . time() . '_' . uniqid(),
                    'overwrite' => false,
                ]);

                $fileUrl = $response['secure_url'];
                $publicId = $response['public_id'];
            } catch (\Exception $e) {
                Log::error('Cloudinary upload failed: ' . $e->getMessage());
                return back()->with('error', 'File upload failed. Please try again.');
            }
        }

        // Create ad placement
        $adPlacement = AdPlacement::create([
            'user_id' => Auth::id(),
            'media_id' => $media->id,
            'title' => $request->title,
            'category' => $request->category,
            'type' => $request->type,
            'content_type' => $request->content_type,
            'upload_file' => $fileUrl,
            'upload_file_public_id' => $publicId,
            'target_audience' => $request->target_audience,
            'target_location' => $request->target_location,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending_review'
        ]);

        // Send notification to media organization
        try {
            $media->load('user');

            if ($media->user && $media->user->email) {
                Mail::to($media->user->email)->send(
                    new Adsplacement($adPlacement, Auth::user(), $media)
                );

                Log::info('Ad placement notification sent', [
                    'media_id' => $media->id,
                    'email' => $media->user->email,
                    'ad_placement_id' => $adPlacement->id
                ]);
            } else {
                Log::warning('Media organization has no associated user or email', [
                    'media_id' => $media->id,
                    'ad_placement_id' => $adPlacement->id
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Ad placement email failed: ' . $e->getMessage(), [
                'media_id' => $media->id,
                'ad_placement' => $adPlacement->id
            ]);
        }

        return redirect()->route('advertiser.dashboard')
            ->with('success', 'Ad placement submitted successfully! The media organization has been notified.');
    }
}
