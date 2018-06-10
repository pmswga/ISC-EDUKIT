<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">
        <div class="ui grid">
            <div class="row">
                <div class="sixteen wide column">
                    <div class="ui menu">
                        <a class="item" href="{{ url('/') }}">
                            <img src="{{ asset('img/ukit.png') }}" alt="">
                        </a>
                        <a class="item" href="{{ route('history') }}">История</a>
                        <div class="ui dropdown item">
                            Расписание
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="{{ route('main-schedule') }}">Основное</a>
                                <a class="item" href="{{ route('change-schedule') }}">Изменения</a>
                            </div>
                        </div>
                        <a class="item" href="{{ route('news') }}">Новости</a>
                        <a class="item" href="{{ route('teachers') }}">Перподаватели</a>

                        <div class="right menu">
                            @guest
                                <a class="item" href="{{ route('login') }}">Войти</a>
                                <a class="item" href="{{ route('register') }}">Регистрация</a>
                            @else
                                <div class="ui dropdown item">
                                    {{ Auth::user()->email }}
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                        @switch(Auth::user()->id_type_user)
                                            @case(1)
                                                <a class="item" href="{{ route('director.index') }}">Личный кабинет</a>
                                            @break
                                            @case(2)
                                                <a class="item" href="{{ route('teacher.index') }}">Личный кабинет</a>
                                            @break
                                            @case(3)
                                                <a class="item" href="{{ route('student.index') }}">Личный кабинет</a>
                                            @break
                                            @case(4)
                                                <a class="item" href="{{ route('student.index') }}">Личный кабинет</a>
                                            @break
                                            @case(5)
                                                <a class="item" href="{{ route('parent.index') }}">Личный кабинет</a>
                                            @break
                                            @case(6)
                                                <a class="item" href="{{ route('admin.index') }}">Личный кабинет</a>
                                            @break
                                        @endswitch
                                        <a class="item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                
                @yield('content')
            </div>
        </div>
    </div>

    <script>

        $('.ui.dropdown').dropdown();

    </script>

</body>
</html>
