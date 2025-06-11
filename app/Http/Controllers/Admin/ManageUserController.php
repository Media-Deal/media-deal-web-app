<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Models\MediaOrganization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    /**
     * Display a listing of users.
     */

public function index()
{
    $advertisers = DB::table('advertisers')
        ->join('users', 'advertisers.user_id', '=', 'users.id')
        ->select('advertisers.*', 'users.name as user_name', 'users.email as user_email') // just name and email from users
        ->orderByDesc('advertisers.created_at')
        ->paginate(10);

   $media = DB::table('media_organizations')
    ->join('users', 'media_organizations.user_id', '=', 'users.id')
    ->select('media_organizations.*', 'users.name as user_name', 'users.email as user_email')
    ->orderByDesc('media_organizations.created_at')
    ->paginate(10);

    return view('admin.manage_users', compact('advertisers', 'media'));
}

}
