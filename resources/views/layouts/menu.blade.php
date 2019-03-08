@guest
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#" class="nav-link" data-toggle="modal" data-target="#loginForm">{{__('Menu.Authorization')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">{{__('Menu.Registration')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="/Account/About/">{{__('Menu.About')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="/Account/Contacts/">{{__('Menu.Contacts')}}</a></li>
    </ul>
@else
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{route('deck.list')}}" class="nav-link">{{__('Menu.Decks')}}</a>
        </li>                
        <li class="nav-item">
            <a href="{{route('subject.list')}}" class="nav-link">{{__('Menu.Subjects')}}</a>
        </li>
        
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/Account/Profile/">{{__('Menu.Profile')}}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{__('Menu.Logout')}}</a>
                <a class="dropdown-item" href="#">{{__('Menu.About')}}</a>
                <a class="dropdown-item" href="#">{{__('Menu.Contacts')}}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>

        </li>
    </ul>
@endguest