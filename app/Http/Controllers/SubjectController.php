<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function Index()
    {
        $list = \Auth::user()->subjects;
        return view('subject.list', compact('list'));
    }
}
