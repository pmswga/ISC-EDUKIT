@extends('accounts.admin.layouts.app')

@section('title', 'Список отделений')

@section('content')

    <div class="ui segment">
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @forelse ($unit_list as $unit)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Отделение №{{ $unit->number }}</td>
                    </tr>
                @empty
                    Отделения ещё не созданы
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
