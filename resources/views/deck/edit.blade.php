@extends('layouts.card', [$title = __('deck.update'), $label = $title])
@section('card-body')                          
    <form id="setForm" action="{{route('deck.update', [$id = $deck->id])}}"  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('label.name')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('label.name')}}" value="{{$deck->name ?? old('name')}}">
    </div>
    <div class='form-group'>
        <label>{{__('deck.ask_subject')}}</label>
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
        <input type="submit" value="{{__('label.update')}}" class="btn btn-primary">
    </div>
</form>
@endsection