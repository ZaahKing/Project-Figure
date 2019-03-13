<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function About()
    {
        return view('info.about');
    } 

    public function Contacts()
    {
        return view('info.contacts');
    } 

    public function Portfolio()
    {
        return view('info.me');
    } 
}
