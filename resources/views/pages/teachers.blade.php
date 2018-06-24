@extends('layouts.app')

@section('title', 'Преподавательский состав')

@section('content')
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="row">
                <div style="display: flex;" class="ui three column stackable grid">
                    <div class="column">
                        <div class="ui link fluid card">
                            <div class="content">
                                <a class="header">Сорокин Юрий Сергеевич</a>
                                <div class="meta">
                                    Педагогический стаж: 27 год
                                </div>
                                <div class="description">
                                        высшее, Московский авиационный институт им. С. Орджоникидзе, 1976, кандидат технических наук,1986
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="ui tag labels">
                                    <div class="ui label">
                                        Математика
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui link fluid card">
                            <div class="content">
                                <a class="header">Жуков Евгений Юрьевич</a>
                                <div class="meta">
                                    Педагогический стаж: 27 год
                                </div>
                                <div class="description">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit id rerum cupiditate aperiam nobis inventore dicta sapiente, dolores deserunt, nostrum reiciendis libero? Dignissimos qui sapiente velit nobis autem architecto facilis.
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="ui tag labels">
                                    <div class="ui label">
                                        Операционные системы
                                    </div>
                                    <div class="ui label">
                                        Архитектура компьютерных систем
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui link fluid card">
                            <div class="content">
                                <a class="header">Тарасова Елена Анатольевна</a>
                                <div class="meta">
                                    Педагогический стаж: 23 года
                                </div>
                                <div class="description">
                                    высшее, Московский государственный заочный педагогический институт, 1988
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="ui tag labels">
                                    <div class="ui label">
                                        Русский язык и литература
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui link fluid card">
                            <div class="content">
                                <a class="header">Манохина Мария Михайловна</a>
                                <div class="meta">
                                    Педагогический стаж: 27 года
                                </div>
                                <div class="description">
                                    высшее, Киевский государственный педагогический институт им.А.М. Горького, 1992
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="ui tag labels">
                                    <div class="ui label">
                                        Психология деловых отношений
                                    </div>
                                    <div class="ui label">
                                        Правовое обеспечение профессиональной деятельности 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
