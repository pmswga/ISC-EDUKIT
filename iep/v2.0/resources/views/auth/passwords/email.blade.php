
@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="ui segment">
        @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    Ошибка аутентификации
                </div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="ui positive message">
                {{ session('status') }}
            </div>
        @endif
        <form class="ui form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="email">E-Mail</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            </div>

            <div class="field">
                <button type="submit" class="ui primary button">
                    Восстановить пароль
                </button>
            </div>
        </form>
    </div>
@endsection