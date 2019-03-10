@extends('layouts.app', ['title' => __('Subject.ListTitle')])
@section('content')
<form method="POST" name='TestRequest' action="{{route('deck.action')}}">
@csrf
    <nav class="navbar sticky-top navbar-dark bg-dark">
    <div class="container">
        <div class="form-group mb-0">
            <input class="m-2" id="1" type="checkbox" data-toggle="checkbox" data-group-main="list">
            <button type="submit" name="action" value="Test" class="btn btn-success" data-grope-enebled="list">{{__('Menu.Test')}}</button>
            <button type="submit" name="action" value="Revers" class="btn btn-success" data-grope-enebled="list">{{__('Menu.ReversTest')}}</button>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addingForm"><i class="fa fa-plus"></i>{{__('Label.Sets.Add')}}</a>
            <button id="massDel" type="button" name="action" value="Delete" class="btn btn-danger" data-grope-enebled="list" data-toggle="modal"
                            data-target="#massDellingForm">{{__('Label.Delete')}}</button>   
        </div>
    </div>
    </nav>
<div class="container">
<h2>{{__('Subject.Label')}}</h2>

@if ($subjects->isEmpty())  
    Nothing
@else
@foreach ($subjects as $subject)
@if ($subject->decks->isNotEmpty())

    <div class="card mb-2">
    <div class="card-header">
        <h4>{{$subject->name}}</h4>
    </div>                
    <div class="card-body">
        @foreach ($subject->decks as $deck)
            <div class="form-group ">
                <input name="id[]" value="{{$deck->id}}" type="checkbox" data-toggle="checkbox" data-group="list">
                <a class="btn btn-link" href="{{route('deck.show', [$id = $deck->id])}}">
                    {{$deck->name}}</a>
                <div class="float-right">
                    <a class="btn btn-success btn-sm" href="{{route('test', [$id = $deck->id])}}"><i class="fa fa-rocket"></i> {{__('Menu.Test')}}</a>
                    <a class="btn btn-success btn-sm" href="{{route('test.revers', [$id = $deck->id])}}"><i class="fa fa-reply-all"></i> {{__('Menu.ReversTest')}}</a> 
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-info btn-sm" href="{{route('deck.edit', [$id => $deck->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm"
                            href="#"
                            data-toggle="modal"
                            data-target="#dellingForm"
                            data-deck-id="{{$deck->id}}"
                            data-deck-name="{{$deck->name}}"
                            role="delDeck"><i class="fa fa-trash-alt"></i></a> 
                    </div>
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
<div class="modal fade shadow-large" id="addingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
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

<!-- Deletion modal form -->
<div class="modal fade" id="dellingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h3 class="modal-title" id="dellingForm">{{__('Label.Subjects.Delete')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="setForm" action="{{route('deck.delete')}}"  method="POST">
            @csrf
                <label>{{__('Label.Subjects.Warn')}} <span id='deckName' class="text text-danger">$Model->Name;</span>?</label>
                <input name='id' type='hidden' value='1232123' >
                <div class="form-group text-right">
                <input type="submit" value="{{__('Label.Delete')}}" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Deletion modal form -->
<div class="modal fade" id="massDellingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h3 class="modal-title" id="dellingForm">{{__('Label.Subjects.Delete')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <label>{{__('Label.Subjects.Warn')}} <span id='deckName' class="text text-danger">$Model->Name;</span>?</label>
                <div class="form-group text-right">
                <input id="confirmMassDeletion" type="button" value="{{__('Label.Delete')}}" class="btn btn-danger">
                </div>
        </div>
    </div>
</div>
</div>


@endsection
@section('scripts')
<script>
$(function(){
    $("#dellingForm").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        modal.find('input[name=id]').val(button.data('deck-id'));
        modal.find('span#deckName').html(button.data('deck-name'));
    });  
    $("#addingForm").on('show.bs.modal', function (event) {
        $(this).find('input[name=name]').focus();
    }); 

 $('#confirmMassDeletion').on('click', function(event){
        $("form[name='TestRequest']").submit();
    });


});
</script>
<script src="/js/CheckboxesGroupes.js"></script>
@endsection