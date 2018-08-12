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
                    <div id="menu" class="ui pointing stackable menu">
                        <a class="header item" href="{{ route('index') }}">
                            Главная
                        </a>
                        <a class="item" href="{{ route('news') }}">
                            Новости
                        </a>
                        <a class="item" href="{{ route('contacts') }}">
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
                                        @switch(Auth::user()->id_account_type)
                                            @case(1)
                                                <a class="item" href="{{ route('student.index') }}">Профиль</a>
                                            @break
                                            @case(2)

                                            @break
                                            @case(3)
                                                <a class="item" href="{{ route('student.index') }}">Профиль</a>
                                            @break
                                            @case(4)

                                            @break
                                            @case(5)

                                            @break
                                            @case(6)
                                                <a class="item" href="{{ route('admin.index') }}">Профиль</a>
                                            @break
                                        @endswitch
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
                    <div class="ui internally celled stackable grid">
                        <div class="three wide column">
                            <div id="left-menu" class="ui vertical menu">
                                <div class="header item">
                                    <img src="{{ asset('img/logos/logo_1.png') }}"  class="ui meduim image" alt="Главная страница">
                                </div>
                                <div class="item">
                                    <div class="header">Отделения</div>
                                    <div class="menu">
                                        <a class="item" href="{{ route('education-unit-1') }}">
                                            <i class="building outline icon"></i>
                                            Отделение №1
                                        </a>
                                        <a class="item" href="{{ route('education-unit-2') }}">
                                            <i class="building icon"></i>
                                            Отделение №2
                                        </a>
                                        <a class="item" href="{{ route('education-unit-3') }}">
                                            <i class="building outline icon"></i>
                                            Отделение №3
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Студенту</div>
                                    <div class="menu">
                                        <a class="item" href="{{ route('schedule') }}">
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
                                        <a class="item" href="{{ route('price') }}">Стоимость обучения</a>
                                        <a class="item">Дни открытых дверей</a>
                                        <a class="item" href="{{ route('admission-documents') }}">Документы для поступления</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Об организации</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="file alternate outline icon"></i>
                                            Основные сведения
                                        </a>
                                        <a class="item" href="{{ route('personal') }}">
                                            <i class="users icon"></i>
                                            Руководство
                                        </a>
                                        <a class="item" href="{{ route('teachers') }}">
                                            <i class="users icon"></i>
                                            Преподавательский состав
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
                                        <a class="item" href="{{ route('feedback.index') }}">
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

        <div id="footer" class="ui inverted vertical footer segment">
            <a class="footer-text" target="__blank" href="http://www.mgutm.ru/">
                Copyright © ФГБОУ ВО "МГУТУ им. К.Г. Разумовского (ПКУ)" УНИКИТ
            <a/>
		</div>

        <!-- Scripts -->
        <script>

            $('.ui.dropdown').dropdown();
            $('.ui.accordion').accordion();

            $('.message .close').on('click', function() {
                $(this).closest('.message').transition('fade');
            });

        </script>
    </body>
</html>
