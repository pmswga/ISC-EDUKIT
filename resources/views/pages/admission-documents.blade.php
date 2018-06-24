@extends('layouts.app')

@section('title', 'Документы для поступления')

@section('content')
    <div class="ui segment">
        <div class="ui styled accordion">
            <div class="title">Основные документы</div>
            <div class="content">
                <div class="ui vertical steps">
                    <div class="step">
                        <i class="file red text icon"></i>
                        <div class="content">
                            <div class="title">Заявление (заполняется при личном присутствии) </div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file red text icon"></i>
                        <div class="content">
                        <div class="title">Аттестат или ксерокопия аттестата</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file red text icon"></i>
                        <div class="content">
                        <div class="title">Паспорт абитуриента или ксерокопия паспорта</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file red text icon"></i>
                        <div class="content">
                        <div class="title">Паспорт одного из родителей или ксерокопия паспорта</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file red text icon"></i>
                        <div class="content">
                        <div class="title">Фото 4 штук (3х4), подписанных с обратной стороны</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui styled accordion">
            <div class="title">Дополнительные документы</div>
            <div class="content">
                <div class="ui vertical steps">
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                            <div class="title">Медицинская справка по форме 086/у с данными на 2017 год (со всеми печатями)</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                        <div class="title">Ксерокопия полиса медицинского страхования</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                        <div class="title"> Ксерокопия свидетельства пенсионного страхования (если имеется)</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                        <div class="title">Выписка из документа о экзаменах (ОГЭ, ГИА, ЕГЭ)</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                        <div class="title">Свидетельство о постановке на учет в налоговой службе (ИНН)</div>
                        </div>
                    </div>
                    <div class="step">
                        <i class="file orange text icon"></i>
                        <div class="content">
                        <div class="title">Копия приписного удостоверения/военного билета (для юношей)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
