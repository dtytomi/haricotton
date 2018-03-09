<?php

namespace Haricotton\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Haricotton\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected function authenticated(Request $request, $user)
    {
        # code...
        if($user->hasRole('role-superadmin')){
            return redirect('/superadmin');

        }  else if ($user->hasRole('role-admin')) {
            # code...
            return redirect('/admin');
            
        } else {
            return redirect('/home');
        }
    }
    
    // Commented by Ayo for redirecting user based on role
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
