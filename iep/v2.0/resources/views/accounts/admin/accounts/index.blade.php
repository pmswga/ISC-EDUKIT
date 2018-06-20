@extends('accounts.admin.layouts.app')

@section('title', 'Список пользователей')

@section('content')

    <div class="ui segment">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="general">Общий список</a>
            <a class="item" data-tab="unit-managers">Заведующие отделением</a>
            <a class="item" data-tab="teachers">Преподаватели</a>
            <a class="item" data-tab="students">Студенты</a>
            <a class="item" data-tab="elders">Старосты</a>
            <a class="item" data-tab="parents">Родители</a>
            <a class="item" data-tab="admins">Администраторы</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="general">
            <table class="ui table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th>E-Mail</th>
                        <th>Тип аккаунта</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 1)
                    @forelse ($user_list as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->second_name." ".$user->first_name." ".$user->patronymic }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->accountType()->description }}</td>
                            <td><a class="ui red button">Удалить</a></td>
                        </tr>
                    @empty
                        None
                    @endforelse
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui right floated small primary labeled icon button">
                                <i class="user icon"></i>Добавить пользователя
                            </div>
                            {{ $user_list->links() }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="unit-managers">
            
        </div>
        <div class="ui bottom attached tab segment" data-tab="teachers">
            
        </div>
        <div class="ui bottom attached tab segment" data-tab="students">
            <table class="ui table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th></th>
                        <th>Группа</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 1)
                    @forelse ($student_list as $list)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $student_list->getInfo()->second_name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td><a class="ui red button">Удалить</a></td>
                        </tr>
                    @empty
                        None
                    @endforelse
                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th></th>
                        <th colspan="4">
                            <div class="ui right floated small primary labeled icon button">
                                <i class="user icon"></i>Добавить пользователя
                            </div>
                            {{ $user_list->links() }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="elders">
            
        </div>
        <div class="ui bottom attached tab segment" data-tab="parents">
            
        </div>
        <div class="ui bottom attached tab segment" data-tab="admins">
            
        </div>
    </div>

@endsection