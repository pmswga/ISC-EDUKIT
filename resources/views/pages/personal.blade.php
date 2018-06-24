@extends('layouts.app')

@section('title', 'Руководство')

@section('content')
    <div class="ui segment">
        <figure id="structure-college-figure">
            <img src="{{ asset('img/personal/structure.png') }}" class="ui fluid image" alt="Структура колледжа">
            <figcaption>Структура колледжа</figcaption>
        </figure>
        <br>
        <div class="ui styled accordion">
            <div class="title">
                Директор
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Александров Роман Викторович</h3>
                        <div class="ui form">
                            <div class="two fields">
                                <div class="field">
                                    <label>Контактный телефон №1</label>
                                    <input type="tel" value="+7 (495) 917-02-82" readonly>
                                </div>
                                <div class="field">
                                    <label>Контактный телефон №2</label>
                                    <input type="tel" value="+7 (495) 917-59-47" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="r.alexandrov@mgutm.ru" readonly>
                            </div>
                            <div class="field">
                                <label>Образование</label>
                                <input type="text" value="Высшее, Московский государственный университет им. М.В. Ломоносова, 1996" readonly>
                            </div>
                            <div class="field">
                                <label>Педагогический стаж</label>
                                <input type="text" value="21 год" readonly>
                            </div>
                            <div class="field">
                                <label>Квалификация</label>
                                <input type="text" value="Высшая" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                        <img src="{{ asset('img/personal/director.jpg') }}" width="100%" alt="Директор колледжа">
                    </div>
                </div>
            </div>
        </div>

        <div class="ui styled accordion">
            <div class="title">
                Заместитель директора по общим вопросам
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Кириллов Алексей Иванович</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Контактный телефон</label>
                                <input type="tel" value="+7 (495) 917-98-63" readonly>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="a.kirillov@mgutm.ru" readonly>
                            </div>
                            <div class="field">
                                <label>Образование</label>
                                <input type="text" value="Высшее, Ростовский государственный университет им. М.А.Суслова, 1985" readonly>
                            </div>
                            <div class="field">
                                <label>Педагогический стаж</label>
                                <input type="text" value="22 года" readonly>
                            </div>
                            <div class="field">
                                <label>Квалификация</label>
                                <input type="text" value="Высшая" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                        <img src="{{ asset('img/personal/deputy-director-1.jpg') }}" width="100%" alt="Заместитель директора по общим вопросам">
                    </div>
                </div>
            </div>
        </div>

        <div class="ui styled accordion">
            <div class="title">
                Заместитель директора по воспитательной работе
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Манохина Марина Михайловна</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Контактный телефон</label>
                                <input type="tel" value="+7 (495) 916-22-48" readonly>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="m.manohina@mgutm.ru" readonly>
                            </div>
                            <div class="field">
                                <label>Образование</label>
                                <input type="text" value="Высшее, Киевский государственный педагогический институт им.А.М. Горького, 1992" readonly>
                            </div>
                            <div class="field">
                                <label>Педагогический стаж</label>
                                <input type="text" value="27 лет" readonly>
                            </div>
                            <div class="field">
                                <label>Квалификация</label>
                                <input type="text" value="Высшая" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                        <img src="{{ asset('img/personal/deputy-director-2.jpg') }}" width="100%" alt="Заместитель директора по воспитательной работе">
                    </div>
                </div>
            </div>
        </div>

        <div class="ui styled accordion">
            <div class="title">
                Заместитель директора по учебной работе
            </div>
            <div class="content">
                <div class="ui stackable grid">
                    <div class="twelve wide column">
                        <h3>Вернер Елена Викторовна</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Контактный телефон</label>
                                <input type="tel" value="+7 (495) 917-11-26" readonly>
                            </div>
                            <div class="field">
                                <label>E-Mail</label>
                                <input type="email" value="e.verner@mgutm.ru" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="four wide column">
                        <img src="{{ asset('img/personal/deputy-director-3.jpg') }}" width="100%" alt="Заместитель директора по учебной работе">
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
