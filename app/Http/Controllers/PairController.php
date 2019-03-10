<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pair;

class PairController extends Controller
{
    public function Index()
    {
        return 'Info about pairs';
    }

    public function Store(Request $request, $deckId)
    {
        $links = $request->input('Link');
        $values = $request->input('Value');
        $data = [];   
        $userId = \Auth::id();
        for ($index = 1; $index <= count($values); $index++)
        {
            $data[] = [
                'key' => $values[$index],
                'value' => $links[$index],
                'deck_id' => $deckId,
                'user_id' => $userId,
            ];
        }
        Pair::insert($data);
        return redirect()->route('deck.show', [$id = $deckId]);
    }

    public function edit($id)
    {
        return view('pair.edit');
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

    public function Destroy(Request $request)
    {
        Pair::destroy($request->input('id'));
        return redirect()->back();
    }
}
