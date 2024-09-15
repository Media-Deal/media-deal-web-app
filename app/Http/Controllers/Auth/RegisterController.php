<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        // Generate and save the verification code and expiry time
        $validToken = rand(1000, 9999);
        $user->verification_code = $validToken;
        $user->verification_expiry = now()->addMinutes(10);
        $user->save();

        $full_name = $data['name']; // Assuming the full name is in 'name' field
        $email = $data['email'];

        $vmessage = "
              <p style='line-height: 24px;margin-bottom:15px;'>
                    Hello $full_name,
              </p>
              <br>
               <p>
               We are so happy to have you on board, and thank you for joining us.
               </p>
               <p>
              We just need to verify your email address before you can access cytopiacapital.
              </p>
              <br>
              <p>
             Use this code to verify your email: <strong>$validToken</strong>
             </p>
             <p style='color: red;'>
             Please note that this code will expire in 10 minutes.
            </p>
           <br>
           <p>
           Don't hesitate to get in touch if you have any questions; we'll always get back to you.
           </p>
           ";

        Mail::to($email)->send(new VerificationEmail($vmessage));

        return $user;
    }
}
