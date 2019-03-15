@extends('layouts.app', ['title' => __('label.settings')])

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border border-success">
                <div class="card-header bg-success">{{__('home.changeLang')}}</div>

                <div class="card-body">
                <form action="{{route('locale')}}" method="POST" class="form-inline">
                    @csrf
                    <select name="lang" class="form-control">
                    @foreach (\App\Http\Middleware\CheckLocalization::SuportedLanguages as $langKey => $langName)
                        <option value="{{$langKey}}"
                        @if($langKey == \Auth::user()->locale)
                            selected
                        @endif
                        >{{$langName}}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">{{__('label.change')}}</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
