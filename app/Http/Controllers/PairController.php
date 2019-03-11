<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pair;
use \App\Models\Deck;

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

    public function Edit($id)
    {
        $pair = Pair::find($id);
        return view('pair.edit', compact('pair'));
    }

    public function Update(Request $request, $id)
    {
        $pair = Pair::find($id);
        $deckId = $pair->deck_id;
        $pair->key = $request->input('key');
        $pair->value = $request->input('value');
        $pair->deck_id = $request->input('deck_id');
        $pair->save();
        return redirect()->route('deck.show', [$id = $deckId]);
    }

    public function Destroy(Request $request)
    {
        Pair::destroy($request->input('id'));
        return redirect()->back();
    }

    public function Join(Request $request)
    {
        $reciverId = $request->input('reciver_id');
        $sourceId = $request->input('source_id');
        Pair::where('deck_id', $sourceId)
            ->where('user_id', \Auth::id())
            ->update(['deck_id' => $reciverId]);
        Deck::destroy($sourceId);
        return redirect()->route('deck.show', [$id = $reciverId]);
    }
}
