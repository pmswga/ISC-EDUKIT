<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/ukit.png') }}" height="100%" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('history') }}">История</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-expanded="false" aria-haspopup="true" v-pre>Расписание  <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ route('main-schedule') }}">Основное</a></li>
                                <li><a href="{{ route('change-schedule') }}">Изменения</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('news') }}">Новости</a></li>
                        <li><a href="{{ route('teachers') }}">Перподаватели</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    @switch(Auth::user()->id_type_user)
                                        @case(1)
                                            <li><a href="{{ route('admin.index') }}">Личный кабинет</a></li>
                                        @break
                                        @case(2)
                                            <li><a href="{{ route('teacher.index') }}">Личный кабинет</a></li>
                                        @break
                                        @case(3)
                                            <li><a href="{{ route('student.index') }}">Личный кабинет</a></li>
                                        @break
                                        @case(4)
                                            <li><a href="{{ route('student.index') }}">Личный кабинет</a></li>
                                        @break
                                        @case(5)
                                            <li><a href="{{ route('parent.index') }}">Личный кабинет</a></li>
                                        @break
                                        @case(6)
                                            <li><a href="{{ route('admin.index') }}">Личный кабинет</a></li>
                                        @break
                                    @endswitch
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
