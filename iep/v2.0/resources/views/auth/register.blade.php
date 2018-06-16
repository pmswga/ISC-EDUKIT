@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    @if ($errors->any())
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Обнаружены ошибки при регистрации
            </div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="ui segment">
        <form class="ui form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="name">@lang('reg.first_name_field')</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="field">
                <label for="email">@lang('reg.email_field')</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password">@lang('reg.passwd_field')</label>
                <input type="password" name="password" required>
            </div>

            <div class="field">
                <label for="password-confirm">@lang('reg.confirm_passwd_field')</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div class="field">
                <button type="submit" class="ui primary button">
                    @lang('reg.submit_field')
                </button>
            </div>
        </form>
    </div>
@endsection
