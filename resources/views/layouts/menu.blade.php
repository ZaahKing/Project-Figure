@guest
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#" class="nav-link" data-toggle="modal" data-target="#loginForm">__Menu.Authorization__</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">__Menu.Registration__</a></li>
        <li class="nav-item"><a class="nav-link" href="/Account/About/">__ABOUT_US_TR</a></li>
        <li class="nav-item"><a class="nav-link" href="/Account/Contacts/">__CONTACTS_TR</a></li>
    </ul>
@else
<ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/Sets/" class="nav-link">__Menu.Sets__</a>
                </li>                
                <li class="nav-item">
                    <a href="/Subjects/" class="nav-link">__Menu.Subjects__</a>
                </li>
                
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/Account/Profile/">_Profile_T__</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">__Menu.Logout__</a>
                        <a class="dropdown-item" href="#">__ABOUT_US_TR</a>
                        <a class="dropdown-item" href="#">__CONTACTS_TR</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>

                </li>
            </ul>
@endguest