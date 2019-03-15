@extends('layouts.hello')
@section('content')
@guest
    @include('info.about_'.\App::getLocale())
@else
<div class="wrapper">
        <div class="demo-header demo-header-image profile-background">
                <div class="motto">
                    <h1 class="title-uppercase">__Label.Welcome__</h1>
                    <h3>__Phrase.Better__</h3>
                </div>
        </div>
    </div>
@endguest
@endsection
