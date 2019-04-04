<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

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

    protected function credentials(Request $request)
    {
        return ['login' => $request->get('email'), 'password' => $request->get('password')];
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUserToken = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $login = $googleUserToken->id . '-' . $googleUserToken->email;
        $user = \App\User::where('login', $login)->first();

        if(!isset($user))
        {
            $user = \App\User::create([
                'login' => $login,
                'name' => $googleUserToken->name,
                'email' => $googleUserToken->email,
                'password' =>''
            ]);
            \App\Models\GoogleUser::create(['user_id' => $user->id, 'google_id' => $googleUserToken->id]);
        }

        auth()->login($user, true);
        return redirect()->to('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
}
