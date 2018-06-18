@extends('layouts.app')

@section('title', 'Учебное отделение №1')

@section('content')
    <div class="ui segment">
        <div class="ui styled accordion">
            <div class="title">
                Заведующий отделением №1
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Миланова Ирина Анатольевна</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Контактный телефон</label>
                                <input type="tel" value="+7 (495) 916-27-87" readonly>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="i.milanova@mgutm.ru" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                         <img src="{{ asset('img/personal/unit-managers/unit-manager-1.jpg') }}" width="100%" alt="Заведующий отделением №1">
                    </div>
                </div>
            </div>
        </div>
        <table class="ui table">
            <thead>
                <tr>
                    <th colspan="3">Учебные группы отделения</th>
                </tr>
                <tr>
                    <th>Курс</th>
                    <th>Специальность</th>
                    <th>Группа</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>I</td>
                    <td></td>
                    <td>103, 104</td>
                </tr>
                <tr>
                    <td rowspan="2">II</td>
                    <td>09.02.03 "Программирование в компьютерных системах"</td>
                    <td>П-203, П-204, П-205к</td>
                </tr>
                <tr>
                    <td>21.02.05 "Земельно-имущественные отношения"</td>
                    <td>ЗО-212к</td>
                </tr>
                <tr>
                    <td rowspan="2">III</td>
                    <td>09.02.03 "Программирование в компьютерных системах"</td>
                    <td>П-303, П-304, П-305к</td>
                </tr>
                <tr>
                    <td>21.02.05 "Земельно-имущественные отношения"</td>
                    <td>ЗО-312к</td>
                </tr>
                <tr>
                    <td rowspan="2">IV</td>
                    <td>09.02.03 "Программирование в компьютерных системах"</td>
                    <td>П-403, П-404к</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
