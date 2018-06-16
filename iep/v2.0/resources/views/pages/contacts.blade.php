@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
<div class="ui piled segment">
    <div class="ui list">
        <a class="item">
            <i class="building icon"></i>
            <div class="content">
                <div class="header">Адрес</div>
                <div class="description">Москва, Костомаровская Набережная, 29 ст1</div>
            </div>
        </a>
        <a class="item">
            <i class="map icon"></i>
            <div class="content">
                <div class="header">Проезд</div>
                <div class="description">м. Курская, Чкаловская, Площадь Ильича, Римская далее пешком в сторону ДК Метростроя</div>
            </div>
        </a>
        <a class="item">
            <i class="phone icon"></i>
            <div class="content">
                <div class="header">Телефон</div>
                <div class="description">+7 (925) 743-11-91</div>
            </div>
        </a>
        <a class="item">
            <i class="envelope icon"></i>
            <div class="content">
                <div class="header">Электронная почта приёмной комиссии</div>
                <div class="description">priemka@mgkit.ru</div>
            </div>
        </a>
        
    </div>
    <fieldset>
        <legend>Карта</legend>
        <div id="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab5e253926a3dc477f6ad56a08d6aa1e119d60f24b1819ac5b443277175240b29&amp;source=constructor" width="100%" height="650" frameborder="0"></iframe>
        </div>
    </fieldset>
</div>
@endsection
