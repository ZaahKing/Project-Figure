@extends('layouts.app', ['title' => __('Subject.ListTitle')])
@section('content')
@foreach ($list as $item)
<h3>{{$item->name}}</h3>
<p>{{$item->description}}</p>
@endforeach
    {{$list}}
@endsection