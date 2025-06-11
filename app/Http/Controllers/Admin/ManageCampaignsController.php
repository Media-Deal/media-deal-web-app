<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdPlacement;
use Illuminate\Http\Request;

class ManageCampaignsController extends Controller
{


   public function index()
   {
    $adplacement = AdPlacement::latest()->paginate(10);

    return view('admin.manage_campaign', compact('adplacement'));
}
}
