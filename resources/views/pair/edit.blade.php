@extends('layouts.card', [$title = __('Deck.Edit'), $label = $title])
@section('card-body')                          
    <form id="setForm" action=""  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('Label.Key')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Value')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Subject')}}</label>
        <select class="form-control" name="subject_id">

        </select>
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('Label.Add')}}" class="btn btn-primary">
    </div>
</form>
@endsection