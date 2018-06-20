@extends('accounts.admin.layouts.app')

@section('title', 'Список групп')

@section('content')

    <div class="ui segment">
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Специальность</th>
                    <th>Год начала обучения</th>
                    <th>Год окончания обучения</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($group_list as $group)
                    <tr>
                        <td></td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

@endsection
