<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Models\MediaOrganization;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of users.
     */
   public function index()
{
    $advertisers = Advertiser::latest()->paginate(10);
    $media = MediaOrganization::latest()->paginate(10);
    return view('admin.manage_users', compact('advertisers', 'media'));
}
}
