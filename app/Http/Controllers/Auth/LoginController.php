<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        if ($user->role === 'client') {
            return redirect()->route('conferences.index'); // Redirect client users to the conference list
        }

        // You can add additional checks for other roles here
        // For example, redirect to admin dashboard if role is admin
        if ($user->role === 'administrator') {
            return redirect()->route('admin.dashboard'); // Assuming you have a dashboard route
        }

        // Default fallback
        return redirect()->route('home');
    }
}
