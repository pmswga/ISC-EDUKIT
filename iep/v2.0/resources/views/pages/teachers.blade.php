@extends('layouts.app')

@section('title', 'Преподавательский состав')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="row">
                <div style="display: flex;" class="ui three column stackable grid">
                    @php($i = 1)
                    @while(($i++) < 25)
                        <div class="column">
                            <div class="ui link fluid card">
                                <div class="content">
                                    <a class="header">Александро Роман Викторович</a>
                                    <div class="meta">
                                        Педагогический стаж: 21 год
                                    </div>
                                    <div class="description">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis dolorum nesciunt ullam nam ratione neque blanditiis sunt minus, error rerum eos dolorem cumque illum pariatur quia ipsam quos earum exercitationem?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis vel corporis excepturi voluptatum nisi quaerat delectus, illo expedita unde repellendus maiores recusandae! Veniam, assumenda praesentium ipsa illum non cumque officiis!
                                    </div>
                                </div>
                                <div class="extra content">
                                    <div class="ui tag labels">
                                        <div class="ui label">
                                            label
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endwhile
                </div>
            </div>
        </div>
    </div>
@endsection
