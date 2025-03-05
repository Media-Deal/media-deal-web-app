<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdvertiserPaymentHistory;

class PaymentController extends Controller
{
    /**
     * Display the payment view.
     */
    public function showPaymentForm()
    {
        return view('advertiser.tax_fee');
    }

    /**
     * Initiate a payment with Flutterwave.
     */
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Generate a unique transaction reference.
        $transactionRef = 'TX_' . uniqid();

        // Save transaction details to the database.
        $payment = AdvertiserPaymentHistory::create([
            'advertiser_id' => Auth::id(), // Assuming authenticated users
            'media_id' => $request->media_id, // Corrected typo
            'transaction_ref' => $transactionRef,
            'transaction_id' => $transactionRef, // Will be filled after payment
            'amount' => $request->amount,
            'currency' => 'NGN',
            'status' => 'completed',
            'payment_method' => null, // Will be updated after payment
            'meta' => json_encode([
                'consumer_id' => Auth::id() ?? 'guest', // Use authenticated user ID or guest
                'consumer_mac' => 'unique_mac_address', // Replace with actual logic if available
            ]), // Ensuring 'meta' is stored as a JSON string
        ]);


        // Prepare the data for the Flutterwave API.
        $paymentData = [
            'tx_ref' => $transactionRef,
            'amount' => $request->amount,
            'currency' => $request->currency, // Adjust the currency as needed
            'redirect_url' => route('advertiser.payment.callback'),
            'customer' => [
                'email' => $request->email,
                'name' => $request->name,
            ],
            'payment_options' => 'card', // Add other payment methods if needed
            'meta' => $payment->meta,
        ];

        // Redirect the user to the Flutterwave payment page.
        $paymentURL = $this->createFlutterwavePaymentLink($paymentData);
        if ($paymentURL) {
            return redirect($paymentURL);
        }

        return back()->with('success', 'Error initiating payment. Please try again.');
    }

    /**
     * Create a payment link using Guzzle.
     */
    private function createFlutterwavePaymentLink($data)
    {
        $client = new Client();
        $url = 'https://api.flutterwave.com/v3/payments';

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.flutterwave.secret_key'),
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $body = json_decode($response->getBody(), true);

            if ($body['status'] === 'success') {
                return $body['data']['link'];
            }
        } catch (\Exception $e) {
            report($e);
        }

        return null;
    }

    /**
     * Handle Flutterwave callback.
     */
    public function handleCallback(Request $request)
    {
        $transactionID = $request->transaction_id;

        // Verify the payment.
        $verificationResponse = $this->verifyPayment($transactionID);

        if ($verificationResponse && $verificationResponse['status'] === 'success') {
            // Update the payment record in the database.
            $payment = AdvertiserPaymentHistory::where('transaction_ref', $verificationResponse['data']['tx_ref'])->first();

            if ($payment) {
                $payment->update([
                    'transaction_id' => $verificationResponse['data']['id'],
                    'status' => 'completed',
                    'payment_method' => $verificationResponse['data']['payment_type'],
                ]);
            }

            return view('advertiser.success', ['payment' => $payment]);
        }

        return view('advertiser.error');
    }

    /**
     * Verify payment using Guzzle.
     */
    private function verifyPayment($transactionID)
    {
        $client = new Client();
        $url = "https://api.flutterwave.com/v3/transactions/{$transactionID}/verify";

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.flutterwave.secret_key'),
                    'Content-Type' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            report($e);
        }

        return null;
    }
}
