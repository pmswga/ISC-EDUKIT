@extends('accounts.student.layouts.app')

@section('title', 'Настройки')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="row">
                <div class="eight wide column">
                    <div class="ui styled accordion">
                        <div class="title">
                            Сменить пароль
                        </div>
                        <div class="content">
                            <form class="ui form" action="" method="POST">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label>Новый пароль</label>
                                    <input type="password" name="new_password">
                                </div>
                                <div class="field">
                                    <label>Повторите пароль</label>
                                    <input type="password" name="new_password_retry">
                                </div>
                                <div class="field">
                                    <label>Новый пароль</label>
                                    <input type="submit" name="changePassword" value="Сменить пароль" class="ui primary button">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="eight wide column">
                        <table class="ui table">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4>Основная информация</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Фамилия</div>
                                    </td>
                                    <td>{{ Auth::user()->second_name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Имя</div>
                                    </td>
                                    <td>{{ Auth::user()->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Отчество</div>
                                    </td>
                                    <td>{{ Auth::user()->patronymic }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Email</div>
                                    </td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Сотовый телефон</div>
                                    </td>
                                    <td>{{ Auth::user()->cellPhone() }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4>Учебная информация</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Группа</div>
                                    </td>
                                    <td>{{ Auth::user()->group() }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Форма обучения</div>
                                    </td>
                                    <td>{{ Auth::user()->cellPhone() }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="ui ribbon label">Форма оплаты</div>
                                    </td>
                                    <td>{{ Auth::user()->cellPhone() }}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection