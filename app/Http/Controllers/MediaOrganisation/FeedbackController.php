<?php

namespace App\Http\Controllers\MediaOrganisation;

use App\Http\Controllers\Controller;
use App\Models\MediaOrganization;
use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\LengthAwarePaginator;

class FeedbackController extends Controller
{
    public function ManageFeedbacks()
    {
        
        return view('media_org.manage-feedbacks');
    }

    
}
