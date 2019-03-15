<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Subject;

class InfoController extends Controller
{
    public function About()
    {
        return view('info.about_'.\App::getLocale());
    }

    public function Contacts()
    {
        return view('info.contacts');
    }

    public function Portfolio()
    {
        return view('info.me');
    }

    public function Welcome()
    {
        if(\Auth::guest()) return view('info.welcome');
        else
        {
            $subjects = \Auth::user()->subjects->load('decks');
            return view('info.start', compact('subjects'));
        }
    }
}
