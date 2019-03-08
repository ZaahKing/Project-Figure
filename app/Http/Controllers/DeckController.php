<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Deck;
use App\Models\Subject;

class DeckController extends Controller
{
    public function Index()
    {
        $subjects = Subject::where('user_id', \Auth::id())->with('decks')->get();
        return view('deck.list', compact('subjects'));
    }

    
    public function Create()
    {
        return view('deck.create');
    }

    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), Deck::validationMap);
        if ($validator->fails()) return redirect()->route('deck.create')->withInput()->withErrors($validator);
        Deck::create([
            'name' => $request->input('name'),
            'subject_id' => $request->input('subject_id'),
            'user_id' => \Auth::id(),
        ]);
        return redirect()->route('deck.list');
    }

    public function Show($id)
    {
        $deck = Deck::find($id);
        return $deck;
    }

    public function Edit($id)
    {
        $deck = Deck::find($id);
        return view('deck.edit', compact('deck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Deck::validationMap);
        if ($validator->fails()) return redirect()->route('deck.edit', [$id])->withInput()->withErrors($validator);
        Deck::where('id', $id)
            ->where('user_id', \Auth::id())
            ->update([
            'name' => $request->input('name'),
            'subject_id' => $request->input('subject_id'),
        ]);
        return redirect()->route('deck.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Destroy(Request $request)
    {
        Deck::destroy($request->input('id'));
        return redirect()->back();
    }

    public function Action(Request $request)
    {
        return $request->all();
    }
}
