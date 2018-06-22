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
                    <td>101, 102к, 105, 106</td>
                </tr>
                <tr>
                    <td rowspan="2">II</td>
                    <td>09.02.02 "Компьютерные сети"</td>
                    <td>КС-201, КС-202к</td>
                </tr>
                <tr>
                    <td>09.02.05 "Прикладная информатика (по отраслям)"</td>
                    <td>И-206, И-207, И-208к</td>
                </tr>
                <tr>
                    <td rowspan="2">III</td>
                    <td>09.02.02 "Компьютерные сети"</td>
                    <td>КС-301, КС-302к,</td>
                </tr>
                <tr>
                    <td>09.02.05 "Прикладная информатика (по отраслям)"</td>
                    <td>И-306к, И-307к</td>
                </tr>
                <tr>
                    <td rowspan="2">IV</td>
                    <td>09.02.02 "Компьютерные сети"</td>
                    <td>КС-401, КС-402к</td>
                </tr>
                <tr>
                    <td>09.02.05 "Прикладная информатика (по отраслям)"</td>
                    <td>И-405к</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
