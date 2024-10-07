<?php

namespace App\Http\Controllers\MediaOrg;

use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use App\Http\Controllers\Controller;

class SalesManagerController extends Controller
{
    public function create()
    {
        return view('sales_manager.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:sales_managers,email',
            'nindetails' => 'required|string|max:255',
            'staffid' => 'required|file|mimes:jpeg,png,pdf', // Add validation for file upload
            'position' => 'required|string|max:50',
            'media_type' => 'required',
            'tv_type' => 'nullable',
            'tv_name' => 'nullable|string|max:255',
            'tv_logo' => 'nullable|image|max:2048',
            'tv_main_studio_location' => 'nullable|string',
            'tv_channel_location' => 'nullable|array',
            'tv_content_focus' => 'nullable|string',
            'tv_content_focus_other' => 'nullable|string|max:255',
            'target_audience' => 'nullable|string',
            'tv_peak_viewing_times' => 'array',
            'tv_youtube' => 'nullable|url',
            'tv_website' => 'nullable|url',
            'tv_streaming_url' => 'nullable|url',
            'tv_advert_rate' => 'nullable|file',
            'tv_facebook' => 'nullable|url',
            'tv_twitter' => 'nullable|url',
            'tv_instagram' => 'nullable|url',
            'tv_linkedin' => 'nullable|url',
            'tv_tiktok' => 'nullable|url',
            'tv_other' => 'nullable|url',
            'tv_email' => 'nullable|email',
            'tv_phone' => 'nullable|string',
            'tv_contact_person' => 'nullable|string',
            'radio_type' => 'required|string',
            'radio_name' => 'required|string|max:255',
            'radio_logo' => 'nullable|file|mimes:jpg,jpeg,png',
            'radio_frequency' => 'required|string',
            'radio_station_location' => 'required|string',
            'content_focus' => 'nullable|array',
            'radio_youtube' => 'nullable|url',
            'radio_facebook' => 'nullable|url',
            'radio_email' => 'required|email',
            'radio_phone' => 'required',
            'radio_contact_person' => 'required|string|max:255',
            'internet_type' => 'required',
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tv_channel_location' => 'nullable|array',
            'tv_content_focus' => 'required|string',
            'target_audience' => 'required|string',
            'broadcast_duration' => 'required|string',
            'often_post' => 'required|string',
            'internet_youtube' => 'nullable|string',
            'internet_website' => 'nullable|string',
            'internet_streaming_url' => 'nullable|string',
            'internet_advert_rate' => 'nullable|file',
            'internet_facebook' => 'nullable|string',
            'internet_twitter' => 'nullable|string',
            'internet_instagram' => 'nullable|string',
            'internet_linkedin' => 'nullable|string',
            'internet_tiktok' => 'nullable|string',
            'internet_other' => 'nullable|string',
            'internet_email' => 'required|email',
            'internet_phone' => 'required|string',
            'internet_contact_person' => 'required|string',
        ]);

        // Handle file upload
        $staffIdPath = $request->file('staffid')->store('staff_ids', 'public');
        // Handle the file upload
        $tv_logo = null;
        if ($request->hasFile('tv_logo')) {
            $tv_logo = $request->file('tv_logo')->store('logos', 'public');
        }

        // Handle file upload
        if ($request->hasFile('tv_advert_rate')) {
            $validated['tv_advert_rate'] = $request->file('tv_advert_rate')->store('advert_rates');
        }

        //    if ($request->hasFile('tv_logo')) {
        //     $validatedData['tv_logo'] = $request->file('tv_logo')->store('tv_logos', 'public');
        // }

        // MediaDetail::create($validatedData);

        MediaOrganization::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'nin_details' => $request->nindetails,
            'staff_id' => $staffIdPath,
            'position' => $request->position,
            'media_type' => $request->input('media_type'),
            'tv_type' => $request->input('tv_type'),
            'tv_name' => $request->input('tv_name'),
            'tv_logo' => $tv_logo,
            'tv_main_studio_location' => $request->input('tv_main_studio_location'),
            'tv_channel_location' => $request->input('tv_channel_location'),
            'tv_content_focus' => $request->input('tv_content_focus'),
            'tv_content_focus_other' => $request->input('tv_content_focus_other'),
            'target_audience' => $request->input('target_audience'),
            'radio_type' => $request->radio_type,
            'radio_name' => $request->radio_name,
            'radio_logo' => $logoPath ?? null,
            'radio_frequency' => $request->radio_frequency,
            'radio_station_location' => $request->radio_station_location,
            'content_focus' => $request->content_focus,
            'radio_youtube' => $request->radio_youtube,
            'radio_facebook' => $request->radio_facebook,
        ]);

        return redirect()->route('sales_manager.create')->with('success', 'Sales Manager details saved successfully.');
    }
}
