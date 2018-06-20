@extends('accounts.admin.layouts.app')

@section('title', 'Настройки')

@section('content')
    <div class="ui segment">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="cd_1">Формы обучения</a>
            <a class="item" data-tab="cd_2">Формы оплаты</a>
            <a class="item" data-tab="cd_3">Типы родства</a>
            <a class="item" data-tab="cd_4">Типы аккаунтов</a>
            <a class="item" data-tab="cd_5">Дни обучения</a>
            <a class="item" data-tab="cd_6">Пары</a>
            <a class="item" data-tab="cd_7">Типы сообщений</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="cd_1">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_education_form as $education_form)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $education_form->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_2">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_education_pay_form as $education_pay_form)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $education_pay_form->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_3">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_relation_type as $relation_type)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $relation_type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_4">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_account_type as $account_type)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $account_type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th colspan="3">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_5">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Сокращённое наименование</th>
                        <th>Полное наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_education_day as $education_day)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $education_day->short_caption }}</td>
                            <td>{{ $education_day->full_caption }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_6">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Начало</th>
                        <th>Окончание</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_education_pair as $education_pair)
                        <tr>
                            <td>{{ $education_pair->number }}</td>
                            <td>{{ $education_pair->time_start }}</td>
                            <td>{{ $education_pair->time_end }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="cd_7">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($list_feedback_type as $feedback_type)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $feedback_type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="ui styled accordion">
            <div class="title">
                Резервные копии
            </div>
            <div class="content">

            </div>
        </div>
    </div>
@endsection
