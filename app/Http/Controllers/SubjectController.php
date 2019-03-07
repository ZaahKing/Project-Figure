<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Validator;

class SubjectController extends Controller
{
    public function Index()
    {
        $list = \Auth::user()->subjects;
        return view('subject.list', compact('list'));
    }

    public function Delete(Request $request)
    {
        Subject::destroy($request->input('id'));
        return redirect()->back();
    }

    public function Create(Request $request)
    {
        $validator = Validator::make($request->all(), Subject::validationMap);
        if ($validator->fails()) return view('subject.create')->withErrors($validator);
        Subject::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => \Auth::id(),
        ]);
        return redirect($request->input('url'));
    }
    public function Edit($id)
    {
        $subj = Subject::find($id);
        $subj->url = url()->previous();
        return $subj;
    }
}
