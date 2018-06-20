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
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
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
                        <a class="item" href="{{ route('admin.settings') }}">
                            Настройки
                        </a>
                        <div class="right menu">
                            <div class="ui dropdown item">
                                {{ Auth::user()->email }}
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="{{ route('admin.index') }}">Профиль</a>
                                    <a class="item" href="{{ route('logout') }}">Выйти</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="row">
                <div class="sixteen wide column">
                    <div class="ui internally celled stackable grid">
                        <div class="three wide column">
                            <div id="left-menu" class="ui vertical menu">
                                <div class="item">
                                    <div class="header">Управление новостями</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="add icon"></i>
                                            Добавить
                                        </a>
                                        <a class="item">
                                            <i class="newspaper icon"></i>
                                            Список новостей
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">пользователи</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="add user icon"></i>
                                            Добавить заведующего отделенеим
                                        </a>
                                        <a class="item">
                                            <i class="add user icon"></i>
                                            Добавить преподавателя
                                        </a>
                                        <a class="item">
                                            <i class="add user icon"></i>
                                            Добавить студента
                                        </a>
                                        <a class="item">
                                            <i class="add user icon"></i>
                                            Добавить родителя
                                        </a>
                                        <a class="item">
                                            <i class="add user icon"></i>
                                            Добавить администратора
                                        </a>
                                        <a class="item" href="{{ route('admin.accounts.index') }}">
                                            <i class="list icon"></i>
                                            Список пользователей
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Управление отделениями</div>
                                    <div class="menu">
                                        <a class="item" href="{{ route('units.create') }}">
                                            <i class="building outline icon"></i>
                                            Добавить
                                        </a>
                                        <a class="item" href="{{ route('units.index') }}">
                                            <i class="list icon"></i>
                                            Список отделений
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Управление специальностями</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="add icon"></i>
                                            Добавить
                                        </a>
                                        <a class="item">
                                            <i class="list icon"></i>
                                            Список специальностей
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Управление группами</div>
                                    <div class="menu">
                                        <a class="item" href="{{ route('groups.create') }}">
                                            <i class="add icon"></i>
                                            Добавить
                                        </a>
                                        <a class="item" href="{{ route('groups.index') }}">
                                            <i class="list icon"></i>
                                            Список групп
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Управление дисциплинами</div>
                                    <div class="menu">
                                        <a class="item" href="{{ route('subjects.create') }}">
                                            <i class="add icon"></i>
                                            Добавить
                                        </a>
                                        <a class="item" href="{{ route('subjects.index') }}">
                                            <i class="list icon"></i>
                                            Список дисциплин
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Управление расписанием</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="calendar outline icon"></i>
                                            Основное
                                        </a>
                                        <a class="item">
                                            <i class="calendar icon"></i>
                                            Изменения
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Мониторинг</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="icon"></i>
                                            Посещаемость
                                        </a>
                                        <a class="item">
                                            <i class="icon"></i>
                                            Успеваемость
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">Настройки</div>
                                    <div class="menu">
                                        <a class="item">
                                            <i class="icon"></i>
                                            Журнал событий
                                        </a>
                                        <a class="item">
                                            <i class="icon"></i>
                                            Руководство администратора
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

        <div id="footer" class="ui borderless inverted menu">
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
