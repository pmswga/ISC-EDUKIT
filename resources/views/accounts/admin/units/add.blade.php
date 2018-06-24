@extends('accounts.admin.layouts.app')

@section('title', 'Добавить отделение')

@section('content')
    <div class="ui segment">
        <form class="ui form" action="{{ route('units.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="field">
                <label for="">Номер</label>
                <input type="number" name="number" min="1" max="5">
            </div>

            <div class="field">
                <label for="">Форма обучения</label>
                <select name="id_education_form">
                    @foreach ($education_form_list as $education_form)
                        <option value="1">{{ $education_form }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <input type="submit" name="addEducationUnit" value="Добавить" class="ui primary button">
            </div>
        </form>
    </div>
@endsection
