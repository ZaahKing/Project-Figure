@extends('layouts.app', [$title = __('test.title')])
@section('content')
<div id="test" class="container">
    <div id="tesField" class="jumbotron">
        <h2 id="value" class="text-center h2">{{__('test.empty')}}</h2>
    </div>
    <div class="row d-flex justify-content-center">
        <button class="btn col-lg-4 btn-lg btn-success m-2" id="retry">{{__('test.recheck')}}</button>
        <button class="btn col-lg-4 btn-lg btn-danger m-2" id="show">{{__('test.showAnswer')}}</button>
        <button class="btn col-lg-4 btn-lg btn-primary m-2" id="next">{{__('test.next')}}</button>
    </div>
</div>
<div id="outTest">
<div id="tesField" class="jumbotron">
        <h2 class="text-center">{{__('test.msg001')}}</h2>
    </div>
<div class="row d-flex justify-content-center">
    <button class="col-lg-4 btn btn-lg btn-success m-2" id="singleTest">{{__('test.repeat')}}</button>
    <button class="col-lg-4 btn btn-lg btn-success m-2" id="reversTest">{{__('test.reversTest')}}</button>
</div>
</div>
<script>
    var EntityData = {!!$data!!};
    var EntityRevers = {{json_encode(isset($revers))}};
</script>
@endsection

@section('scripts')
<script src="/js/EntityTest.js"></script>
@endsection