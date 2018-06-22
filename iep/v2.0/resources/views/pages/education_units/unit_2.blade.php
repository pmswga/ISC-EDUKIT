@extends('layouts.app')

@section('title', 'Учебное отделение №2')

@section('content')
    <div class="ui segment">
        <div class="ui styled accordion">
            <div class="title">
                Заведующий отделением №2
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Коннова Ирина Геннадьевна</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Контактный телефон</label>
                                <input type="tel" value="+7 (495) 917-59-47" readonly>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="i.konnova@mgutm.ru" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                            <img src="{{ asset('img/personal/unit-managers/unit-manager-2.jpg') }}" width="100%" alt="Заведующий отделением №2">
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
                    <td>108, 109к</td>
                </tr>
                <tr>
                    <td rowspan="2">II</td>
                    <td>10.02.03 "Информационная безопасность автоматизированных систем"</td>
                    <td>З-209, З-210, З-211к</td>
                </tr>
                <tr>
                    <td>42.02.01 "Реклама"</td>
                    <td>Р-213к</td>
                </tr>
                <tr>
                    <td rowspan="2">III</td>
                    <td>10.02.03 "Информационная безопасность автоматизированных систем"</td>
                    <td>З-308, З-309, З-310к</td>
                </tr>
                <tr>
                    <td>42.02.01 "Реклама"</td>
                    <td>Р-312к</td>
                </tr>
                <tr>
                    <td rowspan="2">IV</td>
                    <td>42.02.01 "Реклама"</td>
                    <td>Р-407к</td>
                </tr>
                <tr>
                    <td>10.02.03 "Информационная безопасность автоматизированных систем"</td>
                    <td>З-406к</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
