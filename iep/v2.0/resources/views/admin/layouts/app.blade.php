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
                    <a class="navbar-brand" href="{{ route('admin.index') }}">
                        <img src="{{ asset('img/ukit.png') }}" height="100%" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Новости <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
    							<li><a href="#" data-toggle="modal" data-target="#addNews">Добавить новость</a></li>
    							<li><a href="{{ route('admin.news.index') }}">Просмотр</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
								<li><a href="{{ route('index') }}">На главную</a></li>
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
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Modals -->

    <!-- Modal -->
    <form action="{{ route('admin.news.store') }}" method="POST">
        <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Название модали</h4>
              </div>
              <div class="modal-body">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Заголовок</label>
                      <input type="text" name="title" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Краткое описание</label>
                      <textarea name="description" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                      <label>Содержание</label>
                      <textarea name="content" class="form-control"></textarea>
                  </div>

                  <input type="hidden" name="id_author" value="1">
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Опубликовать">
              </div>
            </div>
          </div>
        </div>
      </form>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        $(document).ready(function () {
            console.log("Document is ready");
        });

    </script>
</body>
</html>
