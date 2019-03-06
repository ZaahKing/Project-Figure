<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content  bg-paleorange">
        <div class="modal-header">
            <h3 class="modal-title" id="modalFormLabel">__Menu.Authorization__</h3>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('login') }}"  method="POST">
            @csrf
                <div class="form-group">
                    <label for="inputEmail">__Label.Login__</label>
                    <input name="email"  type="text" class="form-control" id="inputEmail" placeholder="Email" aria-describdby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="inputPassword">__Label.Password__</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" aria-describdby="passwordHelp">
                </div>
                <input name="BackUri" type="hidden" value="__back_URI__" />
                <div class="form-group">
                    <input id="remember" type="checkbox">
                    <label for="notMyDevice">__Label.Not_my_device__</label>
                </div>
                
                <div class="form-group d-flex justify-content-between">
                    <a href="#">__Label.Forgot___R</a>
                    <button type="submit" class="btn btn-primary">__Label.SignIn__</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>