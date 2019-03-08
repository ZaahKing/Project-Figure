@extends('layouts.card', [$title = __('Subject.Edit'), $label = $title])
@section('card-body')                          
 <form id="subjectForm" method="POST">
    @csrf
    <div class="form-group">
        <label>{{__('Label.Title')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{$subject->name ?? old('name')}}" autofocus>
    </div>
    <div class="form-group">
        <label>{{__('Label.Description')}}</label>
        <textarea name='description' class="form-control" placeholder="{{__('Label.Description')}}" rows='6'>{{$subject->description ?? old('description')}}</textarea>   
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('Label.Add')}}" class="btn btn-primary">
    </div>
    <input type="hidden" name="url" value="{{request()->get('url')??url()->current()}}">
</form>
@endsection