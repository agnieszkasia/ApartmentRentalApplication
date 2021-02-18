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

    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dropzone.js') }}" type="text/javascript"></script>
</head>
<body class="bg">

    <div id="app" >
        <nav class="navbar navbar-expand-md position-ref fixed-top">
                @guest
                <div class="top-left links d-flex">
                    @if (Route::has('login'))
                        <a href="{{ url('/') }}">
                            KWADRAT.
                        </a>
                    @endif
                </div>
                @else
                    {{--Logo Aplikacji--}}
                <div class="top-left links d-flex">
                    <a  href="{{ url('/home') }}">
                        KWADRAT.
                    </a>
                </div>
                @endguest
                <div class="navbar-collapse" id="navbarSupportedContent">
                    {{--prawa część paska nawigacji--}}
                    <ul class=" ml-auto">

                        {{--pasek nawigacji dla niezalogowanego użytkownika--}}
                        @guest
                            <div class="top-right links d-flex">
                                <a  href="{{ route('login') }}">{{ __('LOGOWANIE') }}</a>
                                <a href="{{ route('register') }}">{{ __('REJESTRACJA') }}</a>
                            </div>
                        @else
                            {{--pasek nawigacji po zalogowaniu--}}
                            {{--pasek nawigacji i menu dla zwykłego użytkownika--}}
                            @if(auth()->user()->type_of_user == 'user')
                            <li class="top-right links d-flex">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{--wyświetlenie na pasku nawigacji imienia i nazwiska zalogowanego użytkownika--}}
                                    {{ Auth::user()->name }} {{Auth::user()->last_name}} <span class="caret"></span></a>
                                {{--opcje w menu nawigacji--}}
                                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item  " href="/profile/{{ Auth::user()->id }}">{{ __('Twój profil') }}</a>
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}/flats">{{ __('Twoje ogłoszenia') }}</a>
                                    <a class="dropdown-item" href="/flat/create">{{ __('Dodaj ogłoszenie') }}</a>
                                    <a class="dropdown-item" href="/following">{{ __('Obserwowane ogłoszenia') }}</a>
                                    <a class="dropdown-item" href="/messages/{{ Auth::user()->id }}">{{ __('Twoje wiadomości') }}</a>
                                    <a class="dropdown-item" href="/search">{{ __('Wyszukaj mieszkanie') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       {{--wylogowanie--}}
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                                @else
                                {{--pasek nawigacji i menu dla administratora --}}
                                <li class="top-right links d-flex">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        ADMINISTRATOR <span class="caret"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item  " href="/users">{{ __('Zarejestrowani użytkownicy') }}</a>
                                        <a class="dropdown-item" href="/flats">{{ __('Ogłoszenia użytkowników') }}</a>
                                        <a class="dropdown-item" href="/reviews">{{ __('Opinie użytkowników') }}</a>
                                        <a class="dropdown-item" href="/messages/{{ Auth::user()->id }}">{{ __('Wiadomości') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                            {{ __('Wyloguj') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                        @endguest
                    </ul>
                </div>
        </nav>
        <main class=" position-ref full-height">
            {{--zawartość zmieniana zależna od strony na której przebywa użytkownik--}}
            @yield('content')
        </main>
    </div>
</body>
</html>
