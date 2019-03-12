@extends('layouts.static', ['title' => $title])
@section('content')
<div class="card bg-paleorange mx-auto" style="width: 24rem;">
<h2 class="card-header">{{$label ?? __('label.welcome')}}</h2>
<div class="card-body">   
    @yield('card-body')                            
</div>
</div> 
@endsection