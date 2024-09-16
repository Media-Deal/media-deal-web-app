<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\RegistersDifferentUsers;

class RegisterController extends Controller
{
    use RegistersUsers, RegistersDifferentUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = $this->determineRedirectTo();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'in:advertiser,media_org,marketer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // Add role-specific validations if needed
        ]);
    }

    protected function create(array $data)
    {
        return $this->registerUserBasedOnRole($data);
    }

    protected function determineRedirectTo()
    {
        // Redirect path based on role
        $role = request()->input('role');
        switch ($role) {
            case 'advertiser':
                return '/advertiser/dashboard';
            case 'media_org':
                return '/media-org/dashboard';
            case 'marketer':
                return '/marketer/dashboard';
            default:
                return '/home';
        }
    }
}
