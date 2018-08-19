@extends('accounts.admin.layouts.app')

@section('title', 'Список новостей')

@section('content')

    <div class="ui segment">
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Дата публикации</th>
                    <th class="right aligned">Действие</th>
                </tr>
            </thead>
            <tbody>
                @php ($i = 1)
                @while ($i <= 10)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit</td>
                        <td>Фамилия И.О.</td>
                        <td>{{ date("d.m.Y") }}</td>
                        <td class="right aligned">
                            <div class="ui buttons">
                                <a href="#" class="ui primary button">Предосмотр</a>
                                <a href="#" class="ui orange button">Редактировать</a>
                                <a href="#" class="ui red button">Удалить</a>
                            </div>
                        </td>
                    </tr>
                    @php($i += 1)
                @endwhile

            </tbody>
        </table>
    </div>

@endsection
