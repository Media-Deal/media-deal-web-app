<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advertiser;
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
        // Retrieve the authenticated user
        $user = Auth::user();

<<<<<<< HEAD
        // Retrieve all ad placements for the user, you can paginate if there are many ads
        $ads = AdPlacement::where('user_id', $user->id)
            ->with('media') // Eager load the media organization relationship
=======
        // Retrieve all ad placements for the user, including the associated media
        $ads = AdPlacement::where('user_id', $user->id)
            ->with('media') // Eager load the media relationship
>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate Total Ads and Active Ads
        $totalAds = $ads->count();
        $currentAds = $ads->filter(function ($ad) {
            return $ad->status === '1'; // Count only active ads
        })->count();

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
<<<<<<< HEAD
        // Get the authenticated user
        $user = Auth::user();

        // Join the users and advertisers tables and retrieve the data
        $data['user'] = $user;
        $data['advertiser'] = Advertiser::join('users', 'advertisers.user_id', '=', 'users.id')
            ->where('advertisers.user_id', $user->id)
            ->select('users.*', 'advertisers.*') // Select both user and advertiser fields
            ->firstOrFail();

        return view('advertiser.profile', $data); // Pass the data to the Blade file
=======
        $user = Auth::user();
        // Retrieve the Advertiser record for the authenticated user
        $advertiser = Advertiser::where('user_id', $user->id)->first();
        return view('advertiser.profile', compact('advertiser'));
>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        // Retrieve the Advertiser record for the authenticated user
        $advertiser = Advertiser::where('user_id', $user->id)->first();

        // Validate incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'company_name' => 'nullable|string|max:255',
            'store_address' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Limit to 2MB
        ]);

        // Update user profile fields
        $user->name = $request->input('full_name');

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && Storage::exists($user->profile_picture)) {
                Storage::delete($user->profile_picture);
            }

            // Store the new profile picture
            $file = $request->file('profile_picture');
            $path = $file->store('uploads/profile_pictures', 'public'); // Store in 'public/uploads/profile_pictures'
            $user->profile_picture = $path;
        }

        $user->save();

        // Update advertiser fields
        $advertiser->update([
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'date_of_birth' => $request->input('date_of_birth'),
            'company_name' => $request->input('company_name'),
            'store_address' => $request->input('store_address'),
            'description' => $request->input('description'),
        ]);

        // Redirect back with success message
        return redirect()->route('advertiser.profile')->with('success', 'Profile updated successfully.');
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


    public function updateAvatar(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id); // Fetch the user by ID

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/avatars'), $filename);

            // Delete the old avatar if it exists
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }

            // Save the new avatar path in the database
            $user->avatar = 'uploads/avatars/' . $filename;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Avatar updated successfully!', 'avatar' => $user->avatar]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to upload avatar.']);
    }

    public function updateAdvertiser(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'address' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'company_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'store_address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        // Update the user information
        $userUpdated = $user->update([
            'name' => $request->input('full_name'),
            'email' => $request->input('email'),
        ]);

        // Update or create advertiser details
        $advertiserUpdated = Advertiser::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $request->input('address'),
                'phone_number' => $request->input('phone_number'),
                'date_of_birth' => $request->input('date_of_birth'),
                'company_name' => $request->input('company_name'),
                'description' => $request->input('description'),
                'store_address' => $request->input('store_address'),
            ]
        );

        // Check if both updates succeeded
        if ($userUpdated && $advertiserUpdated) {
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }

        return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
    }
}
