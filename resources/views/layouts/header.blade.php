<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/acc439272b.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Chat App</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems, 'left');
        });
    </script>
    <nav>
        <div class="nav-wrapper">
        <a class="brand-logo"><i class="material-icons">chat</i>Chat App</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          @guest
          <li>
              <a href="{{ route('login') }}">{{ __('Login') }}<span class="fas fa-sign-in-alt ml-2"></a>
          </li>
          @if (Route::has('register'))
              <li>
                  <a href="{{ route('register') }}">{{ __('Register') }}<span class="fas fa-user-plus ml-2"></a>
              </li>
          @endif
      @else
          <li>
              <a  href="#" >
                  {{ Auth::user()->name }}<span class="fas fa-user ml-2"></span>
              </a>
            </li>
              <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}<span class="fas fa-sign-out-alt ml-2"></span>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
      @endguest
        </ul>
        </div>
      </nav>
      <ul class="sidenav" id="slide-out">
        @guest
        <li>
            <a href="{{ route('login') }}">{{ __('Login') }}<span class="fas fa-sign-in-alt ml-2"></a>
        </li>
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('Register') }}<span class="fas fa-user-plus ml-2"></a>
            </li>
        @endif
    @else
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="images/image.jpg">
                </div>
                <a href="#user"><img class="circle" src="images/image.jpg"></a>
                <a  href="#" >
                    {{ Auth::user()->name }}<span class="white-text name"></span>
                </a>
                <a  href="#" >
                    {{ Auth::user()->email }}<span class="white-text email"></span>
                </a>
            </div>
          </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}<span class="fas fa-sign-out-alt ml-2"></span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
    @endguest
      </ul>
</body>
