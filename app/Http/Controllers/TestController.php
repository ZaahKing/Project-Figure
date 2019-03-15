<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pair;

class TestController extends Controller
{
    public function Test($id)
    {
        $data = Pair::where('user_id', \Auth::id())->where('deck_id', $id)->get();
        return view('test.test', compact('data'));
    }

    public function Revers($id)
    {
        $data = Pair::where('user_id', \Auth::id())->where('deck_id', $id)->get();
        return view('test.test', compact('data'))->with(['revers'=>true]);
    }

    public function MassTest(Request $request)
    {
        $data = Pair::where('user_id', \Auth::id())->whereIn('deck_id', $request->input('id'))->get();
        return view('test.test', compact('data'));
    }

    public function MassRevers(Request $request)
    {
        $data = Pair::where('user_id', \Auth::id())->whereIn('deck_id', $request->input('id'))->get();
        return view('test.test', compact('data'))->with(['revers'=>true]);
    }

    public function MassLearning(Request $request)
    {
        $data = Pair::where('user_id', \Auth::id())->whereIn('deck_id', $request->input('id'))->get();
        return view('test.test', compact('data'));
    }

    public function Learning($id)
    {
        $data = Pair::where('user_id', \Auth::id())->where('deck_id', $id)->get();
        return view('test.test', compact('data'))->with(['revers'=>true]);
    }
}
