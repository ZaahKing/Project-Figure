@extends('layouts.app', ['title' => __('Subject.ListTitle')])
@section('content')

<div class="container">
<h2><span class="mr-5">{{__('Subject.Label')}}</span> <a class="btn btn-info" data-toggle="modal" data-target="#addingForm" data-focus="true"><i class="fa fa-plus"></i> {{__('Label.Subjects.Add')}}</a></h2>

@if ($list->isEmpty())  
 NOthing
@else
    <div class="row b-flex align-items-stretch">
    @foreach ($list as $item)
    <div class="col-md-6 col-lg-4 p-2">
            <div class="card p-0 border-secondary h-100 shadow-lg">
                <div class="card-header bg-lightblue">
                    <h4>{{$item->name}}<div class="btn-group float-right" role="group" aria-label="Basic example"> 
                    <a class="btn btn-outline-dark btn-sm" href="{{route('subject.edit', ['id' => $item->id])}}">
                        <i class="fas fa-pen"></i></a>
                    <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#dellingForm" role="delSubj"  data-subj-id="{{$item->id}}" data-subj-name="{{$item->name}}">
                        <i class="far fa-trash-alt"></i></button></div></h4>
                </div>
                <div class="card-body mb-auto">
                    <p class="">{{$item->description}}</p></div>
                    
            </div>
        </div>
    @endforeach
    </div>
@endif

</div>

<!-- Adding modal form -->
<div class="modal fade" id="addingForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content bg-paleorange">
        <div class="modal-header">
            <h3 class="modal-title" id="addingFormLabel">{{__('Label.Subjects.Add')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @include('subject.create_form')
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
            <form id="subjectForm" action="{{route('subject.delete')}}"  method="POST">
            @csrf
                <label>{{__('Label.Subjects.Warn')}} <span id='subjId' class="text text-danger">$Model->Name</span>"?</label>
                <input name='id' type='hidden' value='1232123'>
                <div class="form-group text-right">
                <input type="submit" value="{{__('Label.Delete')}}" class="btn btn-danger">
                </div>
            </form>
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
        modal.find('input[name=id]').val(button.data('subj-id'));
        modal.find('span#subjId').html(button.data('subj-name'));
    }); 
    $("#addingForm").on('show.bs.modal', function (event) {
        $(this).find('input[name=name]').focus();
    });     
});
</script>
@endsection