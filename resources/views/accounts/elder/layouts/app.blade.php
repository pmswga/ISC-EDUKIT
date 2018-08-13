<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title')</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/semantic.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/accounts.css') }}">
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/semantic.js') }}"></script>
    </head>
    <body>
        <div class="ui internally stackable grid">
            <div class="row">
                <div class="sixteen wide column">
                    <div id="menu" class="ui pointing stackable menu">
                        <a class="header item" href="{{ route('index') }}">
                            Главная
                        </a>
                        <a class="item" href="{{ route('student.settings') }}">
                            Настройки
                        </a>
                        <div class="right menu">
                            @guest
                                <a class="item" href="{{ route('login') }}">
                                    Войти
                                </a>
                                <a class="item" href="{{ route('register') }}">
                                    Регистрация
                                </a>
                            @else
                                <div class="ui dropdown item">
                                    {{ Auth::user()->email }}
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                        <a class="item" href="{{ route('student.index') }}">Профиль</a>
                                        <a class="item" href="{{ route('logout') }}">Выйти</a>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="row">
                <div class="sixteen wide column">
                    <div class="ui internally stackable grid">
                        <div class="one wide column"></div>
                        <div class="fourteen wide column">
                            @yield('content')
                        </div>
                        <div class="one wide column"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer" class="ui borderless bottom fixed inverted menu">
            <div class="right menu">
                <a class="item" href="http://www.mgutm.ru/">
                    © ФГБОУ ВО "МГУТУ им. К.Г. Разумовского (ПКУ)" УНИКИТ 2018
                <a/>
            </div>
        </div>
                    
        <!-- Scripts -->
        <script>

            $('.ui.dropdown').dropdown();
            $('.ui.accordion').accordion();

            $('.message .close').on('click', function() {
                $(this).closest('.message').transition('fade');
            });

            $('.menu .item').tab();

        </script>
    </body>
</html>
