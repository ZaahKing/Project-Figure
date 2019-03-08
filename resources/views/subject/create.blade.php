@extends('layouts.card', [$title = __('Subject.Create'), $label = $title])
@section('card-body')                          
    @include('subject.create_form')
@endsection