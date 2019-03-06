<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content  bg-paleorange">
        <div class="modal-header">
            <h3 class="modal-title" id="modalFormLabel">{{__('Menu.Authorization')}}</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('login') }}"  method="POST">
            @csrf
                <div class="form-group">
                    <label for="inputEmail">{{__('Login.Login')}}</label>
                    <input name="email"  type="text" class="form-control" id="inputEmail" placeholder="{{__('Login.EmailPlaceholder')}}" aria-describdby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">{{__('Login.Password')}}</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="{{__('Login.PassPlaceholder')}}" aria-describdby="passwordHelp">
                </div>
                <input name="BackUri" type="hidden" value="__back_URI__" />
                <div class="form-group">
                    <input id="remember" type="checkbox">
                    <label for="notMyDevice">{{__('Login.RememberMe')}}</label>
                </div>
                
                <div class="form-group d-flex justify-content-between">
                    <a href="#">{{__('Login.Forgot')}}</a>
                    <button type="submit" class="btn btn-primary">{{__('Label.SignIn')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>