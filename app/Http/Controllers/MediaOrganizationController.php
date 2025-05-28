<?php

namespace App\Http\Controllers;

use App\Models\Compliance;
use App\Models\Adplacement;
use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaOrganizationController extends Controller
{

    //manage dashboard
    public function index(Request $request)
    {

        $searchQuery = $request->input('search_query');
        $mediaOrganizations = MediaOrganization::query();

        if ($searchQuery) {
            $mediaOrganizations->where('tv_name', 'like', "%{$searchQuery}%")
                ->orWhere('radio_name', 'like', "%{$searchQuery}%")
                ->orWhere('internet_name', 'like', "%{$searchQuery}%");
        }

        // $mediaOrganizations = $mediaOrganizations->get();
        $mediaOrganization = MediaOrganization::where('user_id', Auth::user()->id)->first();
        return view('media_org.homepage', compact('mediaOrganization'));
    }

    public function profile()
    {
        return view('media_org.profile');
    }




    //manage compliance
    public function manageCompliance()
    {

        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch the media organization based on the user's relationship
        $mediaOrganization = MediaOrganization::where('user_id', $user->id)->first(); // Adjust based on your schema

        if (!$mediaOrganization) {
            abort(404, 'Media organization not found');
        }

        // Retrieve all ad placements where media_id matches the media organization id
        $adscompliances = Compliance::where('media_id', $mediaOrganization->id)
            ->with(['advertiser', 'user']) // Eager load related models
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate Total Compliance Requested and Compliance Sent
        $totalCompliancerequested = $adscompliances->count();
        $totalCompliancesent = $adscompliances->filter(function ($adscompliances) {
            return $adscompliances->status === '1'; // Count only active ads
        })->count();

        // Pass the data to the view
        return view('media_org.manage-compliance', compact('adscompliances', 'totalCompliancerequested', 'totalCompliancesent'));
    }



    public function managePayment()
    {
        return view('media_org.manage-payment');
    }


    public function manageRefund()
    {
        return view('media_org.manage-refund');
    }

    public function manageSupport()
    {
        return view('media_org.manage-support');
    }


    // manage account
    public function manageAccount()
    {
        // Fetch the MediaOrganization record for the authenticated user
        $mediaOrganization = MediaOrganization::where('user_id', Auth::user()->id)->first();

        // Pass the data to the view
        return view('media_org.manage-account', compact('mediaOrganization'));
    } 


    // manage ads
    public function manageAds()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch the media organization based on the user's relationship
        $mediaOrganization = MediaOrganization::where('user_id', $user->id)->first(); // Adjust based on your schema

        if (!$user) {
            abort(404, 'Media organization not found');
        }

        // Retrieve all ad placements where media_id matches the media organization id
        $adPlacements = AdPlacement::where('media_id', $mediaOrganization->id)
            ->with(['advertiser', 'user']) // Eager load related models
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate Total Ads and Active Ads
        $totalAds = $adPlacements->count();
        $currentAds = $adPlacements->filter(function ($adPlacement) {
            return $adPlacement->status === '1'; // Count only active ads
        })->count();

        // Pass data to the view
        return view('media_org.manage-ads', compact('adPlacements', 'totalAds', 'currentAds'));
    }




    // update advertiser compliance status
    public function updateCompliancefile(Request $request, $id)
    {
        // Validate the uploaded file
        $request->validate([
            'compliance_file' => 'required|mimes:pdf,doc,docx|max:10000', // Restrict file types and size
        ]);

        // Retrieve the model instance for the given ID
        $adsCompliance = Compliance::findOrFail($id);

        // Handle the file upload
        if ($request->hasFile('compliance_file')) {
            // Delete the old file if it exists
            if ($adsCompliance->compliance_file) {
                Storage::disk('public')->delete($adsCompliance->compliance_file);
            }

            // Store the new file in the 'compliance_files' folder inside 'storage/app/public'
            $filePath = $request->file('compliance_file')->store('compliance_files', 'public');

            // Update the database record with the new file path
            $adsCompliance->compliance_file = $filePath;
            $adsCompliance->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('status', 'Compliance file updated successfully!');
    }




    // update advertiser ads status
    public function updateAdStatus(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'status' => 'required|integer|min:0|max:3',
        ]);

        // Find the ad placement by ID
        $adPlacement = AdPlacement::findOrFail($id);

        // Update the status
        $adPlacement->status = $this->mapStatus($request->status); // Map numeric status to string
        $adPlacement->save();

        return redirect()->back()->with('success', 'Ad status updated successfully.');
    }

    // Helper function to map numeric status to string values
    protected function mapStatus($status)
    {
        switch ($status) {
            case 0:
                return 'processing';
            case 1:
                return 'ongoing';
            case 2:
                return 'completed';
            case 3:
                return 'aborted';
            default:
                return 'processing';
        }
    }



    // update mediaorganization details
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


    //update mediaorganization tv

    public function updatetvDetails(Request $request)
    {
        try {
            // Validate the request, including file uploads
            $request->validate([
                'tv_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:7000', // Validate tv_logo file
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





    // update mediaorganization radio
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









    // update mediaorganization internet
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
}
