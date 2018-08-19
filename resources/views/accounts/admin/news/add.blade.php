@extends('accounts.admin.layouts.app')

@section('title', 'Добавить новость')

@section('content')

    <div class="ui segment">
        <form class="ui form">
            <div class="field">
                <label for="">Заголовок</label>
                <input type="text" name="caption">
            </div>
            <div class="field">
                <label for="">Содержание</label>
                <textarea name="content" id="news_content" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <label for="">Автор</label>
                <input type="text" readonly value="{{ Auth::user()->second_name.' '.Auth::user()->first_name.' '.Auth::user()->patronymic }}">
            </div>
            <div class="field">
                <label for="">Дата публикации</label>
                <input type="date" value="{{ date('Y-m-d') }}">
            </div>
            <div class="field">
                <input type="submit" class="ui primary button" value="Опубликовать">
            </div>
        </form>
    </div>

@endsection

