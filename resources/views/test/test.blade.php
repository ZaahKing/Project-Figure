@extends('layouts.app', [$title = __('Test.Label')])
@section('content')
<div id="test" class="container">
    <div id="tesField" class="jumbotron">
        <h2 id="value" class="text-center h2">{{__('Label.Empty')}}</h2>
    </div>
    <div class="row d-flex justify-content-center">
        <button class="btn col-lg-4 btn-lg btn-success m-2" id="retry">{{__('Label.Recheck')}}</button>
        <button class="btn col-lg-4 btn-lg btn-danger m-2" id="show">{{__('Label.ShowAnswer')}}</button>
        <button class="btn col-lg-4 btn-lg btn-primary m-2" id="next">{{__('Label.Next')}}</button>
    </div>
</div>
<div id="outTest">
<div id="tesField" class="jumbotron">
        <h2 class="text-center">Ones more?</h2>
    </div>
<div class="row d-flex justify-content-center">
    <button class="col-lg-4 btn btn-lg btn-success m-2" id="singleTest">{{__('Label.Repeat')}}</button>
    <button class="col-lg-4 btn btn-lg btn-success m-2" id="reversTest">{{__('Label.ReversTest')}}</button>
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