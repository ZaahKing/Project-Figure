@extends('layouts.card', [$title = __('Deck.Edit'), $label = $title])
@section('card-body')                          
    <form id="setForm" action="{{route('pair.update', [$id = $pair->id])}}"  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('Label.Key')}}</label>
        <input name='key' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{$pair->key}}">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Value')}}</label>
        <input name='value' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{$pair->value}}">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Subject')}}</label>
        <select class="form-control" name="subject_id">
        @foreach (\App\Models\Subject::where('user_id', \Auth::id())->with('decks')->get() as $subject)
        <optgroup label="{{$subject->name}}">
            @foreach($subject->decks as $deck)
            <option value="{{$deck->id}}"
            @if($deck->id == $pair->deck_id)
             selected
            @endif
            >                                   
                {{$deck->name}}
            </option>
            @endforeach
        </optgroup>
        @endforeach
        </select>
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('Label.Add')}}" class="btn btn-primary">
    </div>
</form>
@endsection