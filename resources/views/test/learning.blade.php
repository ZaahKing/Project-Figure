@extends('layouts.app', [$title = __('label.lerning')])
@section('content')
<div id="learn" class="container">
    <div id="tesField" class="jumbotron">
        <h2 id="key" class="text-center h2">{{__('test.empty')}}</h2>
        <h2 id="value" class="text-center h2">{{__('test.empty')}}value</h2>
    </div>
    <div class="row d-flex justify-content-center">
        <button class="btn col-lg-4 btn-lg btn-success m-2" id="bothSide">{{__('test.bothSide')}}</button>
        <button class="btn col-lg-4 btn-lg btn-success m-2" id="singleSide">{{__('test.singleSide')}}</button>
        <button class="btn col-lg-4 btn-lg btn-success m-2" id="retry">{{__('test.recheck')}}</button>
        <button class="btn col-lg-4 btn-lg btn-primary m-2" id="turnOver">{{__('test.turnOver')}}</button>
        <button class="btn col-lg-4 btn-lg btn-primary m-2" id="next">{{__('test.next')}}</button>
    </div>
</div>
<div id="outLearn">
    <div id="tesField" class="jumbotron">
        <h2 class="text-center">{{__('test.msg001')}}</h2>
    </div>
    <div class="row d-flex justify-content-center">
        <button class="col-lg-4 btn btn-lg btn-success m-2" id="learning">{{__('test.learning')}}</button>
        <button class="col-lg-4 btn btn-lg btn-success m-2" id="test">{{__('test.repeat')}}</button>
        <button class="col-lg-4 btn btn-lg btn-success m-2" id="reversTest">{{__('test.reversTest')}}</button>
    </div>
</div>
<script>
    var EntityData = {!!$data!!};
    var EntityRevers = {{json_encode(isset($revers))}};
</script>
@endsection

@section('scripts')
<script src="/js/EntityLearning.js"></script>
@endsection
