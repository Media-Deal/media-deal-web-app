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

class RefundController extends Controller
{
    public function manageRefund()
    {
        // Get refund statistics
        $totalRequests = Refund::count();
        $totalApproved = Refund::where('status', 'approved')->count();
        $totalDenied = Refund::where('status', 'denied')->count();

        // // Get refunds with user information
        // $refunds = Refund::with('user')->paginate(10);


        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch the media organization based on the user's relationship
        $mediaOrganization = MediaOrganization::where('user_id', $user->id)->first();

        if ($mediaOrganization) {
        $refunds = Refund::where('media', $mediaOrganization->id)
        ->with(['advertiser', 'user'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         } else {
         $refunds = new LengthAwarePaginator([], 0, 10);
         }



        // Chart data (example data - replace with actual data from your application)
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'approved' => [12, 19, 8, 15, 14, 12, 16, 18, 10, 12, 15, 20],
            'pending' => [5, 7, 12, 8, 10, 9, 6, 8, 12, 10, 8, 6],
            'denied' => [3, 4, 6, 5, 7, 4, 5, 3, 5, 8, 6, 4]
        ];

        return view('media_org.manage-refund', [
            'totalRequests' => $totalRequests,
            'totalApproved' => $totalApproved,
            'totalDenied' => $totalDenied,
            'refunds' => $refunds,
            'chartData' => $chartData
        ]);
    }

    public function index()
    {
        // Get refund statistics
        $totalRequests = Refund::count();
        $totalApproved = Refund::where('status', 'approved')->count();
        $totalDenied = Refund::where('status', 'denied')->count();

        // Get refunds with user information
        $refunds = Refund::with('user')->paginate(10);

        // Chart data (example data - replace with actual data from your application)
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'approved' => [12, 19, 8, 15, 14, 12, 16, 18, 10, 12, 15, 20],
            'pending' => [5, 7, 12, 8, 10, 9, 6, 8, 12, 10, 8, 6],
            'denied' => [3, 4, 6, 5, 7, 4, 5, 3, 5, 8, 6, 4]
        ];

        return view('media_org.manage-refund', [
            'totalRequests' => $totalRequests,
            'totalApproved' => $totalApproved,
            'totalDenied' => $totalDenied,
            'refunds' => $refunds,
            'chartData' => $chartData
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'amount' => 'required|numeric|min:0',
                'status' => 'required|in:pending,approved,denied',
                'refunded' => 'required|boolean'
            ]);

            $refund = Refund::findOrFail($id);

            $refund->update([
                'amount' => $request->amount,
                'status' => $request->status,
                'refunded' => $request->refunded
            ]);

            Log::info("Refund ID {$id} updated successfully", [
                'amount' => $request->amount,
                'status' => $request->status,
                'refunded' => $request->refunded,
                'updated_by' => auth()->id()
            ]);

            return redirect()->back()->with('success', 'Refund updated successfully!');
        } catch (ValidationException $e) {
            Log::warning('Refund validation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Refund update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update refund. Please try again.');
        }
    }
}
