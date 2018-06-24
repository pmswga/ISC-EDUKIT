@extends('layouts.app')

@section('title', 'Стоимость обучения')

@section('content')
    <div class="ui segment">
        <div class="ui info message">
            <div class="content">
                Стоимость обучения на 2018-2019 учебный год
            </div>
        </div>
        <table class="ui table">
            <thead>
                <tr>
                    <th>Специальность</th>
                    <th>Стоимость обучения</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>09.02.02 "Компьютерные сети"</td>
                    <td>110 000 руб.</td>
                </tr>
                <tr>
                    <td>09.02.03 "Программирование в компьютерных системах"</td>
                    <td>115 000 руб.</td>
                </tr>
                <tr>
                    <td>09.02.05 "Прикладная информатика (по отраслям)"</td>
                    <td>108 000 руб.</td>
                </tr>
                <tr>
                    <td>10.02.03 "Информационная безопасность автоматизированных систем"</td>
                    <td>110 000 руб.</td>
                </tr>
                <tr>
                    <td>21.02.05 "Земельно-имущественные отношения"</td>
                    <td>108 000 руб.</td>
                </tr>
                <tr>
                    <td>42.02.01 "Реклама"</td>
                    <td>108 000 руб.</td>
                </tr>
            </tbody>
        </table>
        <div class="ui warning message">
            <div class="content">
                Оплата по семестрам (50% от стоимости за учебный год)
            </div>
        </div>
    </div>
@endsection
