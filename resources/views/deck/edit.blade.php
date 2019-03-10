@extends('layouts.card', [$title = __('Deck.Edit'), $label = $title])
@section('card-body')                          
    <form id="setForm" action="{{route('deck.update', [$id = $deck->id])}}"  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('Label.Title')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{$deck->name ?? old('name')}}">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Subject')}}</label>
        <select class="form-control" name="subject_id">
        @php
            $selectedId = isset($deck->subject_id) ? $deck->subject_id : old('subject_id');
        @endphp
        @foreach (\App\Models\Subject::where('user_id', \Auth::id())->get() as $subject)
            <option value="{{$subject->id}}"
            @if($subject->id == $selectedId)
             selected
            @endif
            >                                   
                {{$subject->name}}
            </option>
        @endforeach
        </select>
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('Label.Add')}}" class="btn btn-primary">
    </div>
</form>
@endsection