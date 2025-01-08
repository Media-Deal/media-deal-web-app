<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $user = Auth::user();

<<<<<<< HEAD
        if (!$user) {
            // Redirect to login if the user is not authenticated
            return redirect()->route('login');
        }

        // Prepare data to pass to views
        $data['mediaOrganizations'] = MediaOrganization::all();

        // Redirect based on user role
        // switch ($user->role) {
        //     case 'advertiser':
        //         return response()->view('advertiser.homepage', $data);
        //     case 'media_org':
        //         return response()->view('media_org.homepage', $data);
        //     case 'marketer':
        //         return response()->view('marketer.homepage', $data);
        //     default:
        //         abort(403, 'Unauthorized action.');
        // }





        // Check if the user is verified
        // if (Auth::user()->is_verified == 0) {
        //     return redirect()->route('verify', ['id' => Auth::user()->id]);
        // }
        // Check for each guard and redirect accordingly
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         $role = Auth::guard($guard)->user()->role;
        //         switch ($role) {
        //             case 'advertiser':
        //                 return redirect('/advertiser/dashboard');
        //             case 'media_org':
        //                 return redirect('/media-org/dashboard');
        //             case 'marketer':
        //                 return redirect('/marketer/dashboard');
        //             default:
        //                 return redirect('/home');
        //         }
        //     }
        // }

        return $next($request);
=======
        // Check if the authenticated user's role matches the allowed roles
        if (!empty($roles) && !in_array($user->role, $roles)) {
            abort(403, 'Unauthorized access.'); // Deny access for invalid roles
        }



        return $next($request); // Proceed to the next middleware or request handler
>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
    }
}
