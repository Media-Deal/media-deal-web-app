<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaOrganization;

class AdvertiserController extends Controller
{
    public function index()
    {
        // Fetch media organizations for the authenticated user
        $mediaOrganizations = MediaOrganization::get();

        return view('advertiser.homepage', compact('mediaOrganizations'));
    }

    public function showMedia($id)
    {
        $media = MediaOrganization::where('id', $id)->firstOrFail();

        return view('advertiser.show_media', compact('media'));
    }

    public function profile()
    {
        return view('advertiser.profile');
    }

    public function manageAds()
    {
        return view('advertiser.manage-ads');
    }

    // Add other methods for advertiser functionality
}
