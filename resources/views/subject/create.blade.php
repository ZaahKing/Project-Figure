@extends('layouts.card', [$title = __('subj.create'), $label = $title])
@section('card-body')                          
    @include('subject.create_form')
@endsection