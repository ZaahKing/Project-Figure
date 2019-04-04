<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content  bg-paleorange">
        <div class="modal-header">
            <h3 class="modal-title" id="modalFormLabel">{{__('label.login')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('login') }}"  method="POST">
            @csrf
                <div class="form-group">
                    <label for="inputEmail">{{__('label.email')}}</label>
                    <input name="email"  type="text" class="form-control" id="inputEmail" placeholder="{{__('label.email_exemple')}}" aria-describdby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">{{__('label.password')}}</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="{{__('label.pass_holder')}}" aria-describdby="passwordHelp">
                </div>
                <input name="BackUri" type="hidden" value="__back_URI__" />
                <div class="form-group">
                    <input id="remember" type="checkbox">
                    <label for="notMyDevice"> {{__('label.remember')}}</label>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <a href="#" disabled>{{__('label.forgot')}}</a>
                    <button type="submit" class="btn btn-primary">{{__('label.confirm')}}</button>
                </div>
            </form>
            <hr>
            <div class="d-flex justify-content-center">
                <a class="btn-link text-dark" href="{{route('google')}}"><i class="fab fa-google"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
