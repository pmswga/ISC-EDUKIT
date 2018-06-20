@extends('accounts.admin.layouts.app')

@section('title', 'Панель администрирования')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="row">
                <div class="eight wide column">
                    <fieldset class="ui blue segment">
                        <legend>Вопросы</legend>
                        <div class="ui cards">
                            @foreach ($feedback_list_1 as $list)
                                <div class="ui link fluid card">
                                    <div class="content">
                                        <a class="header">{{ $list->subject }}</a>
                                        <div class="meta">
                                            
                                        </div>
                                        <div class="description">
                                            {{ $list->content }}
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        <div class="ui styled accordion">
                                            <div class="title">
                                                Дать ответ
                                            </div>
                                            <div class="content">
                                                <form class="ui form">
                                                    <div class="field">
                                                        <label>Ответ</label>
                                                        <textarea name="answer"></textarea>
                                                    </div>
                                                    <div class="field">
                                                        <input type="submit" name="" value="Ответить" class="ui primary button">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
                <div class="eight wide column">
                    <fieldset class="ui green segment">
                        <legend>Предложения</legend>
                        <ul class="ui list">
                            @foreach ($feedback_list_2 as $list)

                                <li class="list">
                                    {{ $list->subject }}
                                </li>
                            @endforeach
                        </ul>
                    </fieldset>
                </div>
            </div>
        </div>
        <table class="ui table">
            
        </table>
    </div>
@endsection
