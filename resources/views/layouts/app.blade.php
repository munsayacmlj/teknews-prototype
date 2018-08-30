<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  {{-- Fontawesome --}}
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">

</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
          <span class="h4">{{ config('app.name') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto h5">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('posts') }}">News Feed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('people') }}">Members</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('chat') }}">Chatroom</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            <li class="nav-item ml-2">
              <a href="#" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#postModal">
                <i class="fas fa-pencil-alt"></i> Create Post
              </a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto mr-3">
            <!-- Authentication Links -->
            @guest
            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
            <li class="nav-item dropdown inline">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href='/people/{{ $user }}'><i class="fas fa-user"></i> View Profile</a>
                </li>

                <li>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </ul>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="p-0">
      @yield('content')
    </main>
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/alertify.min.js') }}"></script>
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
