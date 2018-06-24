@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    @if ($errors->any())
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Ошибка регистрации
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
                <label for="second_name">@lang('reg.second_name_field')</label>
                <input type="text" name="second_name" value="{{ old('second_name') }}" required autofocus>
            </div>
            
            <div class="field">
                <label for="first_name">@lang('reg.first_name_field')</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
            </div>

            <div class="field">
                <label for="patronymic">@lang('reg.patronymic_field')</label>
                <input type="text" name="patronymic" value="{{ old('patronymic') }}" required autofocus>
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
                <label>Вы</label>
                <div class="tow fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="frequency" checked="checked">
                            <label>Студент</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="frequency">
                            <label>Родитель</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="field">
                <button type="submit" class="ui primary button">
                    @lang('reg.submit_field')
                </button>
            </div>
        </form>
    </div>
@endsection
