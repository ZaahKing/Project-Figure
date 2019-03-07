@extends('layouts.static', ['title' => __('Subject.Create')])
@section('content')
<div class="card bg-paleorange mx-auto" style="width: 24rem;">
<h2 class="card-header">{{__('Label.Welcome')}}</h2>
<div class="card-body">                               
    @include('subject.editForm')
</div>
</div> 
@endsection