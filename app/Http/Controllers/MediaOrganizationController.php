<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaOrganizationController extends Controller
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

        return view('media_org.homepage', compact ('mediaOrganizations'));
    
    }

    public function profile()
    {
        return view('media_org.profile');
    }

    public function manageAccount()
    {
        // Fetch the MediaOrganization record for the authenticated user
        $mediaOrganization = MediaOrganization::where('user_id', Auth::user()->id)->first();
    
        // Pass the data to the view
        return view('media_org.manage-account', compact('mediaOrganization'));
    }
    
    

    

public function updateDetails(Request $request)
{
    try {
        // Create or update MediaOrganization details
        $details = MediaOrganization::updateOrCreate(
            ['user_id' => Auth::user()->id], // Condition to match existing record (by user_id)
            [
                'fullname' => $request->input('fullname'),
                'phone'    => $request->input('phone'),
                'email'    => $request->input('email'),
                'position' => $request->input('position'),
            ]
        );

        // Redirect with success message
        return redirect()
            ->route('media_org.manage-account')
            ->with('success', 'Details saved successfully.');

    } catch (\Exception $e) {
        \Log::error('Error saving details: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while saving your details. Please try again.');
    }
}




public function updatetvDetails(Request $request)
{
    try {
        // Validate the request, including file uploads
        $request->validate([
            'tv_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate tv_logo file
            'advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:5120', // Validate advert_rate file
        ]);

        // Handle file uploads
        $tv_logo_path = null;
        $advert_rate_path = null;

        // Upload tv_logo if a file is provided
        if ($request->hasFile('tv_logo')) {
            $tv_logo = $request->file('tv_logo');
            $tv_logo_path = $tv_logo->store('media/logos', 'public');
        }

        // Upload advert_rate if a file is provided
        if ($request->hasFile('advert_rate')) {
            $advert_rate = $request->file('advert_rate');
            $advert_rate_path = $advert_rate->store('media/advert_rates', 'public');
        }

        // Create or update MediaOrganization details
        $details = MediaOrganization::updateOrCreate(
            ['user_id' => Auth::user()->id], // Condition to match existing record (by user_id)
            [
                'media_type' => $request->input('media_type'),
                'tv_type'    => $request->input('tv_type'),
                'tv_name'    => $request->input('tv_name'),
                'tv_logo'    => $tv_logo_path, // Store the path of the uploaded logo
                'tv_main_studio_location' => $request->input('tv_main_studio_location'),
                'tv_content_focus' => $request->input('tv_content_focus'),
                'tv_content_focus_other' => $request->input('tv_content_focus_other'),
                'tv_target_audience' => $request->input('tv_target_audience'),
                'tv_youtube' => $request->input('tv_youtube'),
                'tv_streaming_url' => $request->input('tv_streaming_url'),
                'advert_rate' => $advert_rate_path, // Store the path of the uploaded advert rate file
                'tv_facebook' => $request->input('tv_facebook'),
                'tv_twitter' => $request->input('tv_twitter'),
                'tv_instagram' => $request->input('tv_instagram'),
                'tv_other' => $request->input('tv_other'),
            ]
        );

        // Redirect with success message
        return redirect()
            ->route('media_org.manage-account')
            ->with('success', 'TV details saved successfully.');

    } catch (\Exception $e) {
        \Log::error('Error saving details: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while saving your details. Please try again.');
    }
}






public function updateradioDetails(Request $request)
{
    try {
        $request->validate([
            'radio_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8000',
            'radio_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:10240',
            // 'radio_content_focus' => 'nullable|array',
            'radio_content_focus.*' => 'string',
        ]);

        // Fetch existing details or initialize an empty model
        $details = MediaOrganization::firstOrNew(['user_id' => Auth::user()->id]);

        // Handle file uploads
        if ($request->hasFile('radio_logo')) {
            $radio_logo = $request->file('radio_logo');
            $details->radio_logo = $radio_logo->store('media/logos', 'public');
        }

        if ($request->hasFile('radio_advert_rate')) {
            $radio_advert_rate = $request->file('radio_advert_rate');
            $details->radio_advert_rate = $radio_advert_rate->store('media/radio_advert_rates', 'public');
        }

        // Update other fields
        $details->fill([
            'media_type' => $request->input('media_type'),
            'radio_type' => $request->input('radio_type'),
            'radio_name' => $request->input('radio_name'),
            'radio_frequency' => $request->input('radio_frequency'),
            'radio_station_location' => $request->input('radio_station_location'),
            'radio_content_focus' => $request->input('radio_content_focus'),
            'radio_content_focus_other' => $request->input('radio_content_focus_other'),
            'radio_target_audience' => $request->input('radio_target_audience'),
            'radio_streaming_url' => $request->input('radio_streaming_url'),
            'radio_facebook' => $request->input('radio_facebook'),
            'radio_twitter' => $request->input('radio_twitter'),
            'radio_instagram' => $request->input('radio_instagram'),
            'radio_other' => $request->input('radio_other'),
        ]);

        $details->save();

        return redirect()->route('media_org.manage-account')
            ->with('success', 'Radio details saved successfully.');

    } catch (\Exception $e) {
        \Log::error('Error saving radio details: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());
        return redirect()->back()->with('error', 'An error occurred while saving your details. Please try again.');
    }
}






// public function updateinternetDetails(Request $request)
// {
//     try {
//         $request->validate([
//             'internet_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8000',
//             'internet_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:10240',
//         ]);

//         // Fetch existing details or initialize an empty model
//         $details = MediaOrganization::firstOrNew(['user_id' => Auth::user()->id]);

//         // Handle file uploads
//         if ($request->hasFile('internet_logo')) {
//             $internet_logo = $request->file('internet_logo');
//             $details->internet_logo = $internet_logo->store('media/logos', 'public');
//         }

//         if ($request->hasFile('internet_advert_rate')) {
//             $internet_advert_rate = $request->file('internet_advert_rate');
//             $details->internet_advert_rate = $internet_advert_rate->store('media/internet_advert_rates', 'public');
//         }

//         // Update other fields
//         $details->fill([
//             'media_type' => $request->input('media_type'),
//             'internet_type' => $request->input('internet_type'),
//             'internet_name' => $request->input('internet_name'),
//             'all_internet_youtube' => $request->input('all_internet_youtube'),
//             'internet_twitter' => $request->input('internet_twitter'),
//             'internet_facebook' => $request->input('internet_facebook'),
//             'internet_twitch' => $request->input('internet_twitch'),
//             'internet_channel_location' => $request->input('internet_channel_location'),
//             'internet_channel_location_other' => $request->input('internet_channel_location_other'),
//             'internet_content_focus' => $request->input('internet_content_focus'),
//             'internet_content_focus_other' => $request->input('internet_content_focus_other'),
//             'internet_target_audience' => $request->input('internet_target_audience'),
//             'internet_broadcast_duration' => $request->input('internet_broadcast_duration'),
//             'internet_often_post' => $request->input('internet_often_post'),
//             'internet_broadcast_duration' => $request->input('internet_broadcast_duration'),
//             'internet_youtube' => $request->input('internet_youtube'),
//             'internet_streaming_url' => $request->input('internet_streaming_url'),
//             'internet_instagram' => $request->input('internet_instagram'),
//             'internet_tiktok' => $request->input('internet_tiktok'),
//             'internet_other' => $request->input('internet_other'),
//         ]);

//         $details->save();

//         return redirect()->route('media_org.manage-account')
//             ->with('success', 'Internet details saved successfully.');

//     } catch (\Exception $e) {
//         \Log::error('Error saving internet details: ' . $e->getMessage());
//         \Log::error($e->getTraceAsString());
//         return redirect()->back()->with('error', 'An error occurred while saving your details. Please try again.');
//     }
// }













public function updateInternetDetails(Request $request)
{
    try {
        $request->validate([
            'internet_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8000',
            'internet_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:10240',
        ]);

        DB::beginTransaction();

        $details = MediaOrganization::firstOrNew(['user_id' => Auth::user()->id]);

        if ($request->hasFile('internet_logo')) {
            $details->internet_logo = $request->file('internet_logo')->store('media/logos', 'public');
        }

        if ($request->hasFile('internet_advert_rate')) {
            $details->internet_advert_rate = $request->file('internet_advert_rate')->store('media/internet_advert_rates', 'public');
        }

        $details->fill($request->only([
            'media_type',
            'internet_type',
            'internet_name',
            'all_internet_youtube',
            'internet_twitter',
            'internet_facebook',
            'internet_twitch',
            'internet_channel_location',
            'internet_channel_location_other',
            'internet_content_focus',
            'internet_content_focus_other',
            'internet_target_audience',
            'internet_broadcast_duration',
            'internet_often_post',
            'internet_youtube',
            'internet_streaming_url',
            'internet_instagram',
            'internet_tiktok',
            'internet_other',
        ]));

        $details->save();

        DB::commit();

        return redirect()->route('media_org.manage-account')
            ->with('success', 'Internet details saved successfully.');
    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('Error saving internet details: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());

        return redirect()->back()->with('error', 'An error occurred while saving your details. Please try again.');
    }
}
















             
    
     public function updateMediatypeDetails(Request $request, $id = null){
        $request->validate([
            'media_type' => 'required',
            'tv_type' => 'nullable|string',
            'tv_name' => 'nullable|string|max:255',
            'tv_logo' => 'nullable|image|max:2048',
            'tv_main_studio_location' => 'nullable|string',
            'tv_channel_location' => 'nullable|array',
            'tv_channel_location_other' => 'nullable|string',
            'tv_content_focus' => 'nullable|string',
            'tv_content_focus_other' => 'nullable|string|max:255',
            'tv_target_audience' => 'nullable|string',
            'tv_peak_viewing_times' => 'array',
            'tv_youtube' => 'nullable|url',
            'tv_website' => 'nullable|url',
            'tv_streaming_url' => 'nullable|url',
            'tv_advert_rate' => 'nullable|file|mimes:pdf,docx',
            'tv_facebook' => 'nullable|url',
            'tv_twitter' => 'nullable|url',
            'tv_instagram' => 'nullable|url',
            'tv_linkedin' => 'nullable|url',
            'tv_tiktok' => 'nullable|url',
            'tv_other' => 'nullable|url',
            'tv_email' => 'nullable|email',
            'tv_phone' => 'nullable|string',
            'tv_contact_person' => 'nullable|string|max:255',
            'radio_logo' => 'nullable|file|mimes:jpg,jpeg,png',
            'internet_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'radio_type' => 'required|string',
            'radio_name' => 'required|string|max:255',
            'radio_frequency' => 'required|string',
            'radio_station_location' => 'required|string',
            'content_focus' => 'nullable|array',
            'radio_youtube' => 'nullable|url',
            'radio_facebook' => 'nullable|url',
            'radio_email' => 'required|email',
            'radio_phone' => 'required|string',
            'radio_contact_person' => 'required|string|max:255',
            'internet_type' => 'required|string',
            'name' => 'required|string|max:255',
            'internet_broadcast_duration' => 'required|string',
            'often_post' => 'required|string',
            'internet_youtube' => 'nullable|string',
            'internet_website' => 'nullable|string',
            'internet_streaming_url' => 'nullable|string',
            'internet_advert_rate' => 'nullable|file|mimes:pdf,docx',
            'internet_facebook' => 'nullable|string',
            'internet_twitter' => 'nullable|string',
            'internet_instagram' => 'nullable|string',
            'internet_linkedin' => 'nullable|string',
            'internet_tiktok' => 'nullable|string',
            'internet_other' => 'nullable|string',
            'internet_email' => 'required|email',
            'internet_phone' => 'required|string',
            'internet_contact_person' => 'required|string|max:255',
        ]);


        // Upload TV logo
        $tv_logo = null;
        if ($request->hasFile('tv_logo')) {
            $file_tv_logo = $request->file('tv_logo');
            $ext_tv_logo = $file_tv_logo->getClientOriginalExtension();
            $filename_tv_logo = time() . '_tv_logo.' . $ext_tv_logo;
            $file_tv_logo->move('uploads/logos/', $filename_tv_logo);
            $tv_logo = 'uploads/logos/' . $filename_tv_logo;
        }

        // Upload radio logo
        $radio_logo = null;
        if ($request->hasFile('radio_logo')) {
            $file_radio_logo = $request->file('radio_logo');
            $ext_radio_logo = $file_radio_logo->getClientOriginalExtension();
            $filename_radio_logo = time() . '_radio_logo.' . $ext_radio_logo;
            $file_radio_logo->move('uploads/logos/', $filename_radio_logo);
            $radio_logo = 'uploads/logos/' . $filename_radio_logo;
        }

        // Upload internet logo
        $internet_logo = null;
        if ($request->hasFile('internet_logo')) {
            $file_internet_logo = $request->file('internet_logo');
            $ext_internet_logo = $file_internet_logo->getClientOriginalExtension();
            $filename_internet_logo = time() . '_internet_logo.' . $ext_internet_logo;
            $file_internet_logo->move('uploads/logos/', $filename_internet_logo);
            $internet_logo = 'uploads/logos/' . $filename_internet_logo;
        }

        // Upload TV advert rate
        $tv_advert_rate = null;
        if ($request->hasFile('tv_advert_rate')) {
            $file_tv_advert_rate = $request->file('tv_advert_rate');
            $ext_tv_advert_rate = $file_tv_advert_rate->getClientOriginalExtension();
            $filename_tv_advert_rate = time() . '_tv_advert_rate.' . $ext_tv_advert_rate;
            $file_tv_advert_rate->move('uploads/advert_rates/', $filename_tv_advert_rate);
            $tv_advert_rate = 'uploads/advert_rates/' . $filename_tv_advert_rate;
        }

        // Upload Internet advert rate
        $internet_advert_rate = null;
        if ($request->hasFile('internet_advert_rate')) {
            $file_internet_advert_rate = $request->file('internet_advert_rate');
            $ext_internet_advert_rate = $file_internet_advert_rate->getClientOriginalExtension();
            $filename_internet_advert_rate = time() . '_internet_advert_rate.' . $ext_internet_advert_rate;
            $file_internet_advert_rate->move('uploads/advert_rates/', $filename_internet_advert_rate);
            $internet_advert_rate = 'uploads/advert_rates/' . $filename_internet_advert_rate;
        }

            MediaOrganization::updateOrCreate([
            'media_type' => $request->input('media_type'),
            'tv_type' => $request->input('tv_type'),
            'tv_name' => $request->input('tv_name'),
            'tv_logo' => $tv_logo,
            'tv_main_studio_location' => $request->input('tv_main_studio_location'),
            'tv_channel_location' => $request->input('tv_channel_location'),
            'tv_channel_location_other' => $request->input('tv_channel_location_other'),
            'tv_content_focus' => $request->input('tv_content_focus'),
            'tv_content_focus_other' => $request->input('tv_content_focus_other'),
            'tv_target_audience' => $request->input('tv_target_audience'),
            'tv_peak_viewing_times' => $request->input('tv_peak_viewing_times'),
            'tv_youtube' => $request->input('tv_youtube'),
            'tv_website' => $request->input('tv_website'),
            'tv_streaming_url' => $request->input('tv_streaming_url'),
            'tv_advert_rate' => $tv_advert_rate,
            'tv_facebook' => $request->input('tv_facebook'),
            'tv_twitter' => $request->input('tv_twitter'),
            'tv_instagram' => $request->input('tv_instagram'),
            'tv_linkedin' => $request->input('tv_linkedin'),
            'tv_tiktok' => $request->input('tv_tiktok'),
            'tv_other' => $request->input('tv_other'),
            'tv_email' => $request->input('tv_email'),
            'tv_phone' => $request->input('tv_phone'),
            'tv_contact_person' => $request->input('tv_contact_person'),
            'radio_type' => $request->radio_type,
            'radio_name' => $request->radio_name,
            'radio_logo' => $radio_logo,
            'radio_frequency' => $request->radio_frequency,
            'radio_station_location' => $request->radio_station_location,
            'content_focus' => $request->content_focus,
            'radio_youtube' => $request->radio_youtube,
            'radio_facebook' => $request->radio_facebook,
            'radio_email' => $request->radio_email,
            'radio_phone' => $request->radio_phone,
            'radio_contact_person' => $request->radio_contact_person,
            'internet_type' => $request->internet_type,
            'name' => $request->name,
            'internet_logo' => $internet_logo,
            'broadcast_duration' => $request->broadcast_duration,
            'often_post' => $request->often_post,
            'internet_youtube' => $request->internet_youtube,
            'internet_website' => $request->internet_website,
            'internet_streaming_url' => $request->internet_streaming_url,
            'internet_advert_rate' => $internet_advert_rate,
            'internet_facebook' => $request->internet_facebook,
            'internet_twitter' => $request->internet_twitter,
            'internet_instagram' => $request->internet_instagram,
            'internet_linkedin' => $request->internet_linkedin,
            'internet_tiktok' => $request->internet_tiktok,
            'internet_other' => $request->internet_other,
            'internet_email' => $request->internet_email,
            'internet_phone' => $request->internet_phone,
            'internet_contact_person' => $request->internet_contact_person,
        ]);

        return redirect()->route('media_organizations.index')->with('success', 'Media Organization details saved successfully.');
    }
}
