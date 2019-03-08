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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Action(Request $request)
    {
        return $request->all();
    }
}
