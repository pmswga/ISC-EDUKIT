@extends('accounts.admin.layouts.app')

@section('title', 'Список групп')

@section('content')

    <div class="ui segment">
        <form class="ui form" action="groups.store" method="POST">
            {{ csrf_field() }}

            <div class="field">
                <label>Название</label>
                <input type="text" name="caption" value="{{ old('caption') }}">
            </div>

        </form>
    </div>

@endsection
