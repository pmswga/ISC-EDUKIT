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
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/semantic.js') }}"></script>
    </head>
    <body>
        <div class="ui internally stackable grid">
            <div class="row">
                <div class="sixteen wide column">
                    <div class="ui pointing stackable menu">
                        <div class="header item">
                            УНИКИТ
                        </div>
                        <a class="item" href="{{ route('index') }}">
                            Главная
                        </a>
                        <a class="item" href="#news">
                            Новости
                        </a>
                        <a class="item" href="#news">
                            Мероприятия
                        </a>
                        <a class="item" href="#news">
                            История
                        </a>
                        <a class="item" href="#news">
                            Контакты
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
                                        <a class="item" href="{{ route('home') }}">Профиль</a>
                                        <a class="item" href="{{ route('logout') }}">Выйти</a>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="sixteen wide column">
                    <div class="ui internally celled stackable grid">
                        <div class="three wide column">
                            <div id="left-menu" class="ui vertical menu">
                                <div class="item">
                                    <div class="header">Отделения</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="building outline icon"></i>
                                            Отделение №1
                                        </a>
                                        <a class="item">
                                            <i class="building icon"></i>
                                            Отделение №2
                                        </a>
                                        <a class="item">
                                            <i class="building outline icon"></i>
                                            Отделение №3
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Студенту</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="calendar alternate outline icon"></i>
                                            Расписание
                                        </a>
                                        <a class="item">
                                            <i class="book icon"></i>
                                            Учебные материалы
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Абитуриенту</div>
                                    <div class="menu">
                                        <a class="item">Стоимость обучения</a>
                                        <a class="item">Дни открытых дверей</a>
                                        <a class="item">Документы для поступления</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Об организации</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="file alternate outline icon"></i>
                                            Основные сведения
                                        </a>
                                        <a class="item">
                                            <i class="users icon"></i>
                                            Руководство
                                        </a>
                                        <a class="item">
                                            <i class="file pdf outline icon"></i>
                                            Документы
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Поддержка</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="envelope outline icon"></i>
                                            Написать пиьсмо
                                        </a>
                                        <a class="item">
                                            <i class="question circle outline icon"></i>
                                            Руководство пользователя
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="thirteen wide column">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        <!-- Scripts -->
        <script>

            $('.ui.dropdown').dropdown();
            $('.ui.accordion').accordion();

        </script>
    </body>
</html>
