@extends('layouts.app', ['title' => __('label.settings')])

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border border-success">
                <div class="card-header bg-success">{{__('settings.changeLang')}}</div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
