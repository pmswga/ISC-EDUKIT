@extends('layouts.app')

@section('title', 'Войти')

@section('content')
<div class="row">
    <div class="sixteen wide column">
        <div class="ui grid">
            <div class="four wide column"></div>
            <div class="eight wide column">
                <form class="ui form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <label for="password" class="col-md-4 control-label">Пароль</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>Запомнить меня</label>
                        </div>
                    </div>

                    <div class="field">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="ui primary button">
                                Войти
                            </button>

                            <a class="" href="{{ route('password.request') }}">
                                Забыли пароль?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="four wide column"></div>
        </div>
    </div>
</div>
@endsection
