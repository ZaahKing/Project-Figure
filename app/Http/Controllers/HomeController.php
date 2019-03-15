<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.home');
    }

    public function Settings()
    {
        return view('home.settings');
    }

    public function ChangeLocale (Request $request)
    {
        $user = \Auth::user();
        $user->locale = $request->input('lang');
        $user->save();
        return redirect()->route('settings');
    }
}
