@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center"> @lang('messages.welcome') </h1>
            </div>
        </div>
    </div>
@endsection
