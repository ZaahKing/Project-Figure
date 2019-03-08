@extends('layouts.app', ['title' => __('Subject.ListTitle')])
@section('content')
<form method="POST" name='TestRequest' action="">
    <nav class="navbar sticky-top navbar-dark bg-dark">
    <div class="container">
        <div class="form-group mb-0">
            <input class="m-2" id="1" type="checkbox" data-toggle="checkbox" data-group-main="list">
            <button type="submit" name="Action" value="Test" class="btn btn-success" data-grope-enebled="list">{{__('Menu.Test')}}</button>
            <button type="submit" name="Action" value="Revers" class="btn btn-success" data-grope-enebled="list">{{__('Menu.ReversTest')}}</button>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addingForm"><i class="fa fa-plus"></i>{{__('Label.Sets.Add')}}</a>
            <button type="submit" name="Action" value="Delete" class="btn btn-danger" data-grope-enebled="list">{{__('Label.Delete')}}</button>   
        </div>
    </div>
    </nav>
<div class="container">
<h2>{{__('Subject.Label')}}</h2>

@if ($subjects->isEmpty())  
    nOTHING
@else
@foreach ($subjects as $subject)
@if ($subject->decks->isNotEmpty())

    <div class="card mb-2">
    <div class="card-header">
        <h4>{{$subject->name}}</h4>
    </div>                
    <div class="card-body">
        @foreach ($subject->decks as $deck)
            <div class="form-group">
                    <input name="Id[]" value="{{$deck->id}}" type="checkbox" data-toggle="checkbox" data-group="list">
                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$deck->id}}" aria-expanded="false" aria-controls="##=collapse-{{$deck->id}}">
                        {{$deck->name}}
                        <i class="fa fa-caret-down"></i>
                    </a>
                </div>
                <div class="collapse" id="collapse-{{$deck->id}}">
                <div class="form-group">
                    <a class="btn btn-success btn-sm" href="Test/Avers/'.$item->Id"><i class="fa fa-rocket"></i> {{__('Menu.Test')}}</a>
                    <a class="btn btn-success btn-sm" href="Test/Revers/.$item->Id ?>"><i class="fa fa-reply-all"></i> {{__('Menu.ReversTest')}}</a> 
                    <a class="btn btn-info btn-sm" href="Sets/View/'.$item->Id"><i class="fa fa-eye"></i> {{__('Label.View')}}</a>
                    <a class="btn btn-info btn-sm" href="Sets/Edit/'.$item->Id"><i class="fa fa-edit"></i> {{__('Label.Edit')}}</a>
                    <a class="btn btn-danger btn-sm"
                        href="#"
                        data-deck-id="{{$deck->id}}"
                        data-deck-name="{{$deck->name}}"
                        role="delSet"><i class="fa fa-trash-alt"></i> {{__('Label.Delete')}}</a> 
                </div>
                </div>
        @endforeach
    </div>
</div>
@endif
@endforeach
            
@endif
</form>

<!-- Adding modal form -->
<div class="modal fade" id="addingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-paleorange">
            <div class="modal-header">
                <h3 class="modal-title" id="addingFormLabel">{{__('Label.Sets.Add')}}</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            @include('deck.create_form')
            </div>
        </div>
    </div>
</div>


@endsection