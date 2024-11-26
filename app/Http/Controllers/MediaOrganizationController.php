<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaOrganization;
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
        // Fetch a single record (example for ID 1)
        $mediaOrganization = MediaOrganization::find(1);
    
        // Or fetch all records
        // $mediaOrganizations = MediaOrganization::all();
    
        return view('media_org.manage-account', compact('mediaOrganization'));
    }
    


    public function updateDetails(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'string|max:255',
            'phone' => 'string|max:15',
            'email' => "email|unique:media_organizations,email,$id",
            'nindetails' => 'nullable|string|max:255',
            'staffid' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'position' => 'string|max:50',
        ]);
    
        try {
            $mediaOrganization = MediaOrganization::findOrFail($id);
    
            $staffIdPath = $mediaOrganization->staff_id;
            if ($request->hasFile('staffid')) {
                $file_staffid = $request->file('staffid');
                $filename_staffid = time() . '_staffid.' . $file_staffid->getClientOriginalExtension();
                $staffIdPath = $file_staffid->storeAs('staff_ids', $filename_staffid, 'public');
    
                if ($mediaOrganization->staff_id && Storage::disk('public')->exists($mediaOrganization->staff_id)) {
                    Storage::disk('public')->delete($mediaOrganization->staff_id);
                }
            }
    
            $mediaOrganization->update([
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'nin_details' => $request->nindetails,
                'staff_id' => $staffIdPath,
                'position' => $request->position,
            ]);
    
            return redirect()->route('media_org.manage-account')->with('success', 'Details updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Media Organization not found.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            \Log::error('Update Details Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update details. Please try again.');
        }
    }
    

    


             
    
     public function store(Request $request, $id){
        $request->validate([
            'media_type' => 'required',
            'tv_logo' => 'nullable|image|max:2048',
            'radio_logo' => 'nullable|file|mimes:jpg,jpeg,png',
            'internet_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tv_name' => 'nullable|string|max:255',
            'tv_main_studio_location' => 'nullable|string',
            'tv_channel_location' => 'nullable|array',
            'tv_content_focus' => 'nullable|string',
            'tv_content_focus_other' => 'nullable|string|max:255',
            'target_audience' => 'nullable|string',
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

        // Upload staff ID
        $staffIdPath = null;
        if ($request->hasFile('staffid')) {
            $file_staffid = $request->file('staffid');
            $ext_staffid = $file_staffid->getClientOriginalExtension();
            $filename_staffid = time() . '_staffid.' . $ext_staffid;
            $file_staffid->move('uploads/staff_ids/', $filename_staffid);
            $staffIdPath = 'uploads/staff_ids/' . $filename_staffid;
        }

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

        MediaOrganization::update([
            'media_type' => $request->input('media_type'),
            'tv_name' => $request->input('tv_name'),
            'tv_logo' => $tv_logo,
            'tv_main_studio_location' => $request->input('tv_main_studio_location'),
            'tv_channel_location' => $request->input('tv_channel_location'),
            'tv_channel_location_other' => $request->input('tv_channel_location_other'),
            'tv_content_focus' => $request->input('tv_content_focus'),
            'tv_content_focus_other' => $request->input('tv_content_focus_other'),
            'target_audience' => $request->input('target_audience'),
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
