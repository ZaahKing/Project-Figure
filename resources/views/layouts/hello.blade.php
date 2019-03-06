<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/Icon/brain-64.png">        
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
        
    <title>{{ $title ?? config('app.name', 'Welcome') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/site.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark fixed-top" >
    <a href="{{ url('/') }}" class="navbar-brand">
        <img width="30px" height="30px" src="/Icon/brain-64.png" alt="Memorizer logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        _Menu_T
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @include('layouts.menu')
    </div>
    </nav>

    <div id="caruselHello" class="carousel slider" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#caruselHello" data-slide-to="0"></li>
            <li data-target="#caruselHello" data-slide-to="1"></li>
            <li data-target="#caruselHello" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/i/hello-jt-1.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>__Label.Welcome__</h3>
                    <p>__Phrase.Better__</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/i/hello-jt-2.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>...</h3>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/i/hello-jt-3.jpg" alt="" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h3>...</h3>
                    <p>...</p>
                </div>
            </div>
        </div>
        <a href="#caruselHello" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">__Previous__</span>
        </a>
        <a href="#caruselHello" class="carousel-control-next" role="button" data-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">__Next__</span>
        </a>
    </div>
    @yield('content')
    @include('layouts.footer')
    @guest
    @include('layouts.loginForm')
    @endguest
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
@yield('scripts')  
<script>
function SetNavbarVisibility(){
    if($(window).scrollTop() >150 ) $('.navbar').hide();
    else $('.navbar').show();
}
(function ($) {
    $(document).ready(function(){
        SetNavbarVisibility()
        $(function () {
            $(window).scroll(function () {
                SetNavbarVisibility()
            });
        });
    });
}(jQuery));
</script>
</body>
</html>

