@guest
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#" class="nav-link" data-toggle="modal" data-target="#loginForm">{{__('label.login')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">{{__('label.registration')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('about')}}">{{__('label.about')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('contacts')}}">{{__('label.contacts')}}</a></li>
    </ul>
@else
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{route('deck.list')}}" class="nav-link">{{__('label.decks')}}</a>
        </li>
        <li class="nav-item">
            <a href="{{route('subject.list')}}" class="nav-link">{{__('label.subjects')}}</a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('settings')}}">{{__('label.settings')}}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{__('label.logout')}}</a>
                <a class="dropdown-item" href="{{route('about')}}">{{__('label.about')}}</a>
                <a class="dropdown-item" href="{{route('contacts')}}">{{__('label.contacts')}}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>

        </li>
    </ul>
@endguest
