@extends('layouts.app', ['title' => __('label.deck').': '.$deck->name])
@section('content')
<div class="container">
    <h2>{{$deck->name}}</h2>

<div id="setEditTool" class="mb-1">
    <a href='{{route('learning', [$id = $deck->id])}}' class="btn btn-primary"><i class="fab fa-stack-overflow"></i> {{__('label.learning')}}</a>
    <a href='{{route('test', [$id = $deck->id])}}' class="btn btn-success"><i class="fa fa-rocket"></i> {{__('label.test')}}</a>
    <a href='{{route('test.revers', [$id = $deck->id])}}' class="btn btn-success"><i class="fa fa-reply-all"></i> {{__('label.revers')}}</a>
    <button class="btn btn-info" data-toggle="collapse"
        data-target="#addEntitiesForm" aria-expanded="false" aria-controls="#addEntitiesForm">
        <i class="fa fa-plus"></i>
        {{__('label.add')}}
        <i class="fa fa-caret-down"></i>
    </button>
    <a href='#' class="btn btn-outline-info" data-toggle="modal" data-target="#joinForm" aria-expanded="false" aria-controls="#joinForm">
        <i class="fa fa-object-ungroup"></i>
        {{__('label.joinTo')}}</a>
</div>
<div class='collapse' id='addEntitiesForm'>
        <div class="card col-md-6 my-3 mx-auto bg-paleorange p-0">
            <form method="POST"action="{{route('pair.store', [$id = $deck->id])}}">
            @csrf
                <div class="card-body">

                    <div  id="entityAddTemplate" class="d-none" data-identy="Group">
                        <div class="form-group">
                            <label>{{__('label.key')}}</label>
                            <input type="text" class="form-control" data-identy="Value">
                        </div><div class="form-group">
                            <label>{{__('label.value')}}</label>
                            <input type="text" class="form-control" data-identy="Link">
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-outline-danger btn-sm d-none" data-identy="Del"><i class="far fa-trash-alt"></i> {{__('label.delete')}}</a>

                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-info"  data-toggle="collapse" data-target="#addEntitiesForm" aria-expanded="false" aria-controls="#addEntitiesForm">
                            {{__('label.hide')}}
                            <i class="fa fa-caret-up"></i>
                        </button>
                        <button type="button" class="btn btn-info" id="addPairBtn">
                            <i class="fa fa-plus"></i>
                            {{__('deck.morePair')}}

                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary" id="formSubmit">{{__('label.add')}}</button>
                </div>
            </form>
        </div>
    </div>
@if($deck->pairs->isEmpty())
Nothing
@else
<table class="table table-striped table-dark">
        <thead>
            <tr>
                <th width="1"></th>
                <th>{{__('label.key')}}</th>
                <th>{{__('label.value')}}</th>
                <th width="1"></th>
            </tr>
        </thead>
        <tbody>
        @php
        $counter = 0;
        @endphp
        @foreach ($deck->pairs as $pair)
        @php
            $counter ++;
        @endphp
            <tr>
                <td>{{$counter}}</td>
                <td>{{$pair->key}}</td>
                <td>{{$pair->value}}</td>
                <td>
                <div class="btn-group">
                    <a href='{{route('pair.edit', [$id = $pair->id])}}' class="btn btn-outline-primary btn-sm">
                        <span class="fas fa-pen"></span></a>
                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                        data-target="#dellingForm"
                        role="delEntity"
                        data-pair-id="{{$pair->id}}"
                        data-counter = "{{$counter}}"><span class="far fa-trash-alt"></a>
                </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
</div>

<!-- JoinTo modal form -->
<div class="modal fade shadow-large" id="joinForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-paleorange">
            <div class="modal-header">
                <h3 class="modal-title" id="addingFormLabel">{{__('deck.join')}}</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="deckJoinForm" action="{{route('pair.join')}}"  method="POST">
            <input type="hidden" name="source_id" value="{{$deck->id}}">
            @csrf
            <div class='form-group'>
                <label>{{__('pair.ask_deck')}}</label>
                <select class="form-control" name="reciver_id">
                @foreach (\App\Models\Subject::where('user_id', \Auth::id())->with('decks')->get() as $subject)
                <optgroup label="{{$subject->name}}">
                    @foreach($subject->decks as $deck)
                    <option value="{{$deck->id}}">
                        {{$deck->name}}
                    </option>
                    @endforeach
                </optgroup>
                @endforeach
                </select>
            </div>
            <div class="form-group text-right">
                <input type="submit" value="{{__('label.join')}}" class="btn btn-primary">
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Deletion modal form -->
<div class="modal fade" id="dellingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h3 class="modal-title">{{__('pair.delete')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="entityDelationForm" action="{{route('pair.delete')}}"  method="POST">
            @csrf
            <label>{{__('pair.msg001')}} "#<span id="counter" class="text text-danger"></span>"?</label>
                <input name='id' type='hidden' value='' >
                <div class="form-group text-right">
                <input type="submit" value="{{__('label.delete')}}" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
 @endsection

 @section('scripts')
 <script>
 var AddEntity = {
    Count: 1,
    CloneTemplate:function(){
        var el = $("#entityAddTemplate").clone();
        el.insertBefore('#entityAddTemplate').removeClass('d-none').attr('id', AddEntity.Count);
        el.find('input[data-identy=Value]').attr('name', 'Value[' + AddEntity.Count + ']');
        el.find('input[data-identy=Link]').attr('name', 'Link[' + AddEntity.Count + ']');
        el.find('[data-identy=Del]').on('click', function(){
            $(this).closest('[data-identy=Group]').remove();
            if($('[data-identy=Del]').length == 2) $('[data-identy=Del]').addClass('d-none');
        });
        var $count = $('[data-identy=Del]').length
        if($count > 2) $('[data-identy=Del]').removeClass('d-none');
    }
};

$(function(){
    AddEntity.CloneTemplate();
    $('#addPairBtn').on('click', function(){
        AddEntity.Count +=1;
        AddEntity.CloneTemplate();

    });

    $("#dellingForm").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        modal.find('input[name=id]').val(button.data('pair-id'));
        modal.find('span#counter').html(button.data('counter'));
    });
});
 </script>
 @endsection
