@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    @if ($errors->any())
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Ошибка аутентификации
            </div>
            <ul class="list">
                @if ($errors->has('email'))
                    <li>{{ $errors->first('email') }}</li>
                @endif
                @if ($errors->has('password'))
                    <li>{{ $errors->first('password') }}</li>
                @endif
            </ul>
        </div>
    @endif
    <div class="ui segment">
        <form class="ui form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="email" class="col-md-4 control-label">@lang('auth.email_field')</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="field">
                <label for="password">@lang('auth.passwd_field')</label>
                <input type="password" name="password" required>

            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                    <label>@lang('auth.remember_me_field')</label>
                </div>
            </div>

            <div class="field">
                <button type="submit" class="ui primary button">
                    Войти
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    @lang('auth.fogot_passwd_field')?
                </a>
            </div>
        </form>
    </div>
@endsection
