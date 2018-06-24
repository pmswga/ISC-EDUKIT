@extends('accounts.admin.layouts.app')

@section('title', 'Список дисциплин')

@section('content')

    <div class="ui segment">
        <table class="ui table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Наименование</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @forelse ($subject_list as $subject)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $subject->description }}</td>
                        <td><a href="{{ route('subjects.edit', ['id_subject' => $subject->id_subject ]) }}">Редактировать</a></td>
                        {{-- <td><a href="{{ route('subjects.destroy', $subject) }}">Удалить</a></td> --}}
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

@endsection
