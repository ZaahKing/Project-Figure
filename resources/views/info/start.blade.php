@extends('layouts.hello')
@section('content')
<div class="container mt-1">
@if ($subjects->isEmpty())
    Nothing
@else
@foreach ($subjects as $subject)
@if ($subject->decks->isNotEmpty())

    <div class="card mb-2 border border-info">
    <div class="card-header bg-lightblue">
        <h4>{{$subject->name}}</h4>
    </div>
    <div class="card-body">
        @foreach ($subject->decks as $deck)
            <div class="form-group ">
                <a class="btn btn-link" href="{{route('deck.show', [$id = $deck->id])}}">
                    {{$deck->name}}</a>
                <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Study">
                        <a class="btn btn-primary btn-sm" href="{{route('learning', [$id = $deck->id])}}"><i class="fab fa-stack-overflow"></i> {{__('label.learning')}}</a>
                        <a class="btn btn-success btn-sm" href="{{route('test', [$id = $deck->id])}}"><i class="fas fa-rocket"></i> {{__('label.test')}}</a>
                        <a class="btn btn-success btn-sm" href="{{route('test.revers', [$id = $deck->id])}}"><i class="fas fa-reply-all"></i> {{__('label.revers')}}</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Tools">
                        <a class="btn btn-info btn-sm" href="{{route('deck.edit', [$id => $deck->id])}}"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger btn-sm"
                            href="#"
                            data-toggle="modal"
                            data-target="#dellingForm"
                            data-deck-id="{{$deck->id}}"
                            data-deck-name="{{$deck->name}}"
                            role="delDeck"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
@endforeach

@endif
</div>
@endsection
