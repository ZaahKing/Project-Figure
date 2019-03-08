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
        $subject = Subject::find($id);
        $subject->url = url()->previous();
        return view('subject.edit', compact('subject'));
    }

    public function Update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Subject::validationMap);
        if ($validator->fails()) return redirect()->route('subject.edit', [$id])->withInput()->withErrors($validator);
        Subject::where('id', $id)
            ->where('user_id', \Auth::id())
            ->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
        return redirect()->route('subject.list');
    }
}
