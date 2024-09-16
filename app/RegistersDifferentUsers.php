<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Advertiser;
use App\Models\MediaOrganization;
use App\Models\Marketer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

trait RegistersDifferentUsers
{
    protected function registerUserBasedOnRole(array $data)
    {
        // Create a new user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        // Generate and save the verification code
        $validToken = rand(1000, 9999);
        $user->verification_code = $validToken;
        $user->verification_expiry = now()->addMinutes(10);
        $user->save();

        // Insert into role-specific tables
        switch ($data['role']) {
            case 'advertiser':
                Advertiser::create([
                    'user_id' => $user->id,
                    'company_name' => $data['company_name'] ?? null,
                ]);
                break;
            case 'media_org':
                MediaOrganization::create([
                    'user_id' => $user->id,
                    'organization_name' => $data['organization_name'] ?? null,
                ]);
                break;
            case 'marketer':
                Marketer::create([
                    'user_id' => $user->id,
                    'agency_name' => $data['agency_name'] ?? null,
                ]);
                break;
        }

        // Send verification email
        $this->sendVerificationEmail($user);

        return $user;
    }

    protected function sendVerificationEmail(User $user)
    {
        $vmessage = view('emails.verification', [
            'user' => $user,
            'validToken' => $user->verification_code,
        ])->render();

        Mail::to($user->email)->send(new VerificationEmail($vmessage));
    }
}
