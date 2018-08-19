@extends('accounts.elder.layouts.app')

@section('title', 'Профиль старосты')

@section('content')
    
    <div class="ui segment">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="first">Статистика</a>
            <a class="item" data-tab="second">Одногруппники</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="first">
            <table class="ui table">
                <tbody>
                    <tr>
                        <td>
                            <div class="ui statistic">
                                <div class="value">
                                    22
                                </div>
                                <div class="label">
                                    Непройденных тестов
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ui statistic">
                                <div class="value">
                                    22
                                </div>
                                <div class="label">
                                    Пройдено тестов
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ui statistic">
                                <div class="value">
                                    22
                                </div>
                                <div class="label">
                                    Посещено пар
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ui statistic">
                                <div class="value">
                                    22
                                </div>
                                <div class="label">
                                    Пропущено пар
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
            
        </div>
    </div>

@endsection
