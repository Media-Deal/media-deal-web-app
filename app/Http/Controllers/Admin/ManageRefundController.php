<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;

class ManageRefundController extends Controller
{
     public function index()
   {
    $adrefund = Refund::latest()->paginate(10);

    return view('admin.manage_refund', compact('adrefund'));
}
}
