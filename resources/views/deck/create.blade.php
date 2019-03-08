@extends('layouts.card', [$title = __('Deck.Create'), $label = $title])
@section('card-body')                          
    @include('deck.create_form')
@endsection