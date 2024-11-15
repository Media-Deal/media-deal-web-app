<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compliance;
use App\Models\AdPlacement;
use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdvertiserController extends Controller
{


    public function index(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $mediaOrganizations = MediaOrganization::query();

        if ($searchQuery) {
            $mediaOrganizations->where('tv_name', 'like', "%{$searchQuery}%")
                ->orWhere('radio_name', 'like', "%{$searchQuery}%")
                ->orWhere('internet_name', 'like', "%{$searchQuery}%");
        }

        $mediaOrganizations = $mediaOrganizations->get();

        // If the request is AJAX, return only the filtered content
        if ($request->ajax()) {
            return view('advertiser.partials.homepage', compact('mediaOrganizations'))->render();
        }

        return view('advertiser.homepage', compact('mediaOrganizations'));
    }


    public function showMedia($id)
    {
        $media = MediaOrganization::where('id', $id)->firstOrFail();

        return view('advertiser.show_media', compact('media'));
    }


    public function placeAds(Request $request, MediaOrganization $media)
    {

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'content_type' => 'required|in:Yes,No,Not Required',
            'upload_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,mp4,mp3|max:20480', // 20MB max
            'target_audience' => 'required|string|max:100',
            'target_location' => 'required|string|max:100',
            'duration' => 'required|string|max:50',
            'specify_dates' => 'nullable|string|max:100',
            'media_id' => 'required|exists:media_organizations,id',
        ]);

        // Handle file upload if present
        if ($request->hasFile('upload_file')) {
            $path = $request->file('upload_file')->store('ad_uploads', 'public');
            $validated['upload_file'] = $path;
        }

        // Assign the authenticated user's ID
        $validated['user_id'] = Auth::id();

        // Assign the media_id from the route parameter
        $validated['media_id'] = $media->id;

        // Create Ad Placement entry
        $adPlacement = AdPlacement::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Ad Placement submitted successfully!');

        // After successfully placing the ad
        // return redirect()->route('advertiser.manage-ads')->with('success', 'Your ad has been placed successfully!');
    }



    public function submitCompliance(Request $request, $mediaId)
    {

        // Validate the request
        $validatedData = $request->validate([
            'compliance_type' => 'required|string|max:255',
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Optionally, ensure the media exists
        $media = MediaOrganization::findOrFail($mediaId);

        // Create a new compliance request
        Compliance::create([
            'media_id' => $mediaId,
            'user_id' => $user->id, // Associate with the authenticated user
            'compliance_type' => $validatedData['compliance_type'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Compliance request submitted successfully!');
    }


    public function manageAds()
    {
        // Assuming ads are associated with the authenticated user
        $user = Auth::user();

        // Retrieve all ad placements for the user, you can paginate if there are many ads
        $ads = AdPlacement::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        // Calculate Total Ads and Current Ads
        $totalAds = $ads->count();
        $currentAds = $ads->where('status', 'Active')->count();

        // Pass data to the view
        return view('advertiser.manage-ads', compact('ads', 'totalAds', 'currentAds'));
    }

    public function viewAd(AdPlacement $ad)
    {


        // Eager load the Media relationship
        $ad->load('media');

        // Pass the ad data to the Blade view
        return view('advertiser.view_ad', compact('ad'));
    }


    public function editAdForm(AdPlacement $ad)
    {


        // Retrieve available media organizations for selection
        $mediaOrganizations = MediaOrganization::all();

        // Pass the ad and media data to the Blade view
        return view('advertiser.edit_ad', compact('ad', 'mediaOrganizations'));
    }


    public function updateAd(Request $request, AdPlacement $ad)
    {


        // Validate the incoming request data
        $validated = $request->validate([
            'media_id'         => 'required|exists:media,id',
            'title'            => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'type'             => 'required|string|max:100',
            'content_type'     => 'required|in:Yes,No,Not Required',
            'upload_file'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,mp4,mp3|max:20480', // 20MB max
            'target_audience'  => 'required|string|max:100',
            'target_location'  => 'required|string|max:100',
            'duration'         => 'required|string|max:50',
            'specify'          => 'nullable|string|max:100',
            'cost'             => 'required|numeric|min:0',
            'status'           => 'required|in:Active,Pending,Expired,Scheduled',
        ]);

        // Handle file upload if present
        if ($request->hasFile('upload_file')) {
            // Delete the old file if it exists
            if ($ad->upload_file && Storage::disk('public')->exists($ad->upload_file)) {
                Storage::disk('public')->delete($ad->upload_file);
            }

            // Store the new file
            $path = $request->file('upload_file')->store('ad_uploads', 'public');
            $validated['upload_file'] = $path;
        }

        try {
            // Update the Ad Placement entry in the database
            $ad->update($validated);

            // Optional: Log the update
            Log::info('Ad Placement Updated', ['adPlacement_id' => $ad->id, 'user_id' => $ad->user_id]);

            // Redirect to the Manage Ads page with a success message
            return redirect()->route('advertiser.manage_ads')->with('success', 'Your ad has been updated successfully!');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Ad Placement Update Failed', ['error' => $e->getMessage(), 'adPlacement_id' => $ad->id]);

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to update your ad. Please try again.');
        }
    }


    public function deleteAd(AdPlacement $ad)
    {


        try {
            // Delete the uploaded file if it exists
            if ($ad->upload_file && Storage::disk('public')->exists($ad->upload_file)) {
                Storage::disk('public')->delete($ad->upload_file);
            }

            // Delete the Ad Placement entry from the database
            $ad->delete();

            // Optional: Log the deletion
            Log::info('Ad Placement Deleted', ['adPlacement_id' => $ad->id, 'user_id' => $ad->user_id]);

            // Redirect to the Manage Ads page with a success message
            return redirect()->route('advertiser.manage_ads')->with('success', 'Your ad has been deleted successfully!');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Ad Placement Deletion Failed', ['error' => $e->getMessage(), 'adPlacement_id' => $ad->id]);

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to delete your ad. Please try again.');
        }
    }

    public function profile()
    {
        return view('advertiser.profile');
    }



    public function showCompliance()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch compliance requests made by the user
        $totalComplianceRequested = Compliance::where('user_id', $user->id)->count();

        // Fetch received compliance (this could depend on your status logic)
        $totalComplianceReceived = Compliance::where('user_id', $user->id)
            ->where('compliance_status', '0') // Assuming 'compliance_file' indicates completion
            ->count();

        // Fetch all compliance requests with media details
        $compliances = Compliance::where('user_id', $user->id)
            ->with('media') // Assuming media is the relation in the Compliance model
            ->get();

        return view('advertiser.manage-compliance', compact('totalComplianceRequested', 'totalComplianceReceived', 'compliances'));
    }



    // Add other methods for advertiser functionality
}
