@extends('accounts.admin.layouts.app')

@section('title', 'Панель администрирования')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="row">
                <div class="five wide column">
                    <div class="ui blue segment">
                        <h3>Вопросы</h3>
                        <hr>
                        <ul class="ui list">
                            @foreach ($feedback_list_1 as $list)

                                <li class="list">
                                    {{ $list->subject }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui green segment">
                        <h3>Предложения</h3>
                        <hr>
                        <ul class="ui list">
                            @foreach ($feedback_list_2 as $list)

                                <li class="list">
                                    {{ $list->subject }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui red segment">
                        <h3>Жалобы</h3>
                        <hr>
                        <ul class="ui list">
                            @foreach ($feedback_list_3 as $list)

                                <li class="list">
                                    {{ $list->subject }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <table class="ui table">
            
        </table>
    </div>
@endsection
