<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KWADRAT.</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/components-rounded.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    @yield('style')

</head>
<body class="" >

    <div id="app">
        <nav class="navbar navbar-expand-md position-ref fixed-top">
                @guest
                <div class="top-left links d-flex">
                    @if (Route::has('login'))
                        <a href="{{ url('/') }}">
                            myApplication
                        </a>
                    @endif
                </div>
                @else
                <div class="top-left links d-flex">
                    <a  href="{{ url('/home') }}">
                        KWADRAT.
                    </a>
                </div>

                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <div class="top-right links d-flex">
                                <a  href="{{ route('login') }}">{{ __('LOGOWANIE') }}</a>
                                <a href="{{ route('register') }}">{{ __('REJESTRACJA') }}</a>
                            </div>
                        @else
                            <li class="top-right links d-flex">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{Auth::user()->last_name}} <span class="caret"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">{{ __('Twój profil') }}</a>
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}/flats">{{ __('Twoje ogłoszenia') }}</a>
                                    <a class="dropdown-item" href="/flat/create">{{ __('Dodaj ogłoszenie') }}</a>
                                    <a class="dropdown-item" href="/following">{{ __('Obserwowane ogłoszenia') }}</a>
                                    <a class="dropdown-item" href="/messages/{{ Auth::user()->id }}">{{ __('Twoje wiadomości') }}</a>
                                    <a class="dropdown-item" href="/search">{{ __('Wyszukaj mieszkanie') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
        <main class=" position-ref full-height">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/style.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script>
    <script src="{{ asset('public/js/select2.full.min.js') }}"></script>
    @yield('script')
</body>
</html>
