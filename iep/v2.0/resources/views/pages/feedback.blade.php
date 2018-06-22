@extends('layouts.app')

@section('title', 'Написать письмо')

@section('content')

    <div class="ui segment">
        @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    Ошибка аутентификации
                </div>
                <ul class="list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success_msg'))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header">
                    Поздравляем!
                </div>
                <div class="content">
                    {{ session()->get('success_msg') }}
                </div>
            </div>
        @endif
        <form class="ui form" action="{{ route('feedback.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="three fields">
                <div class="field">
                    <label>Фамилия</label>
                    <input type="text" name="second_name" value="{{ old('second_name') }}">
                </div>
                <div class="field">
                    <label>Имя</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}">
                </div>
                <div class="field">
                    <label>Отчество</label>
                    <input type="text" name="patronymic" value="{{ old('patronymic') }}">
                </div>
            </div>
            <div class="field">
                <label>Ваш E-Mail</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="field">
                <label>Тип письма</label>
                <select name="id_feedback_type">
                    <option value="1">Вопрос</option>
                    <option value="2">Предложение</option>
                </select>
            </div>
            <div class="field">
                <label>Тема письма</label>
                <input type="text" name="subject" value="{{ old('subject') }}">
            </div>
            <div class="field">
                <label>Содержание письма</label>
                <textarea name="content" value="{{ old('content') }}"></textarea>
            </div>
            <div class="field">
                <input type="submit" name="sendMail" value="Отправить" class="ui primary button">
            </div>
        </form>
    </div>

@endsection