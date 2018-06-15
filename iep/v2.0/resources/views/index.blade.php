@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <fieldset>
        <legend>Объявления</legend>
        <div class="ui three column grid">
            <div class="column">
                <div class="ui piled red segment">
                    <h3>Важные</h3>
                </div>
            </div>
            <div class="column">
                <div class="ui piled orange segment">
                    <h3>Обычные</h3>
                </div>
            </div>
            <div class="column">
                <div class="ui piled blue segment">
                    <h3>Информационные</h3>
                </div>
            </div>
        </div>
    </fieldset>

@endsection