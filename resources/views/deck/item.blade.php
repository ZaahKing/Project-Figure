@extends('layouts.app', ['title' => __('Subject.ListTitle')])
@section('content')
<div class="container">
    <h2>{{$deck->name}}</h2>

<div id="setEditTool" class="mb-1">
    <button class="btn btn-info" data-toggle="collapse" 
        data-target="#addEntitiesForm" aria-expanded="false" aria-controls="#addEntitiesForm">
        <i class="fa fa-plus"></i>
        {{__('Label.Sets.AddPairs')}}
        <i class="fa fa-caret-down"></i>
    </button>
    <a href='#' class="btn btn-success"><i class="fa fa-rocket"></i> {{__('Menu.Test')}}</a>
    <a href='#' class="btn btn-success"><i class="fa fa-reply-all"></i> {{__('Menu.ReversTest')}}</a>
    <a href='#' class="btn btn-outline-info">
        <i class="fa fa-object-ungroup"></i>
        {{__('Label.Join')}}</a>
</div>
<div class='collapse' id='addEntitiesForm'>
        <div class="card col-md-6 my-3 mx-auto bg-paleorange p-0">
            <form method="POST"action="{{route('pair.store')}}"> 
            @csrf
                <div class="card-body">
                      
                    <div  id="entityAddTemplate" class="d-none" data-identy="Group">   
                        <div class="form-group">
                            <label>{{__('Label.Entity')}}</label>
                            <input type="text" class="form-control" data-identy="Value">
                        </div><div class="form-group">
                            <label>{{__('Label.Link')}}</label>
                            <input type="text" class="form-control" data-identy="Link">
                        </div>
                        <div class="form-group">
                            <a href="#" class="btn btn-outline-danger btn-sm d-none" data-identy="Del"><i class="fa fa-trash-alt"></i> Delete</a>
                            
                        </div>
                    </div>
                
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-info"  data-toggle="collapse" data-target="#addEntitiesForm" aria-expanded="false" aria-controls="#addEntitiesForm">
                            {{__('Label.HideForm')}}
                            <i class="fa fa-caret-up"></i> 
                        </button>
                        <button type="button" class="btn btn-info" id="addPairBtn"> 
                            <i class="fa fa-plus"></i>
                            {{__('Label.Sets.AddPairs')}}
                                
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary" id="formSubmit">{{__('Label.Add')}}</button>
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
                <th>{{__('Label.Entity')}}</th>
                <th>{{__('Label.Link')}}</th>
                <th width="1"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($deck->pairs as $pair)
            <tr>
                <td>{{$pair->key}}</td>
                <td>{{$pair->value}}</td>
                <td>
                <div class="btn-group">
                    <a href='#' class="btn btn-outline-primary btn-sm">
                        <span class="fas fa-pen"></span></a>
                    <a href='#' class="btn btn-outline-danger btn-sm">
                        <span class="far fa-trash-alt"></span></a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" 
                        data-target="#dellingForm"
                        role="delEntity"
                        data-item-json='echo json_encode($item)'
                        data-set-id='#'>
                    L
                    </a>
                </div>
                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif  



</div>
<script>
console.log('hello m');
</script>
 @endsection

 @section('scripts')
 <script>
console.log('hello');
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
});
 </script>
 @endsection