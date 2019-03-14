@extends('layouts.app', ['title' => __('label.contacts')])
@section('content')
<div class="container">
<h1>{{__('label.contacts')}}</h1>
<a href="mailto:zigiska@gmail.com?Subject=Memorizer" class="btn btn-primary"> Send mail </a>
<br>
Or write me on VK: <a href="https://vk.com/zackuz" target="_blank">Zackuz</a>
</div>
@endsection
