@extends('accounts.admin.layouts.app')

@section('title', 'Добавить дисциплину')

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
        <form class="ui form" action="{{ route('subjects.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="field">
                <label>Наименование</label>
                <input type="text" name="description" value="{{ old('description') }}">
            </div>

            <div class="field">
                <input type="submit" name="addSubject" value="Добавить" class="ui primary button">
            </div>
        </form>
    </div>

@endsection
