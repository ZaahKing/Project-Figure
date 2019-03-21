<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // protected function username()
    // {
    //     return 'login';
    // }

    protected function attemptLogin(\Illuminate\Http\Request $request)
    {
        return $this->guard()->attempt(
            ['login' => $request->get('email'), 'password' => $request->get('password')], $request->filled('remember')
        );
    }

    // protected function credentials(Request $request)
    // {
    //     return $request->only($this->username(), 'password');
    // }
}
