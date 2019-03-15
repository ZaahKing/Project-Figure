@extends('layouts.hello')
@section('content')
    @include('info.about_'.\App::getLocale())
@endsection
