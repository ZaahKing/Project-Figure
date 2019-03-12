@extends('layouts.card', [$title = __('deck.create'), $label = $title])
@section('card-body')                          
    @include('deck.create_form')
@endsection