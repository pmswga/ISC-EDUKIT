@extends('student.layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-6">
			<fieldset>
				<legend>Основная информация</legend>
				@component('components.settings_base_info_form')
					@slot('sn') {{ Auth::user()->second_name }} @endslot
					@slot('fn') {{ Auth::user()->first_name }} @endslot
					@slot('pt') {{ Auth::user()->patronymic }} @endslot
					@slot('email') {{ Auth::user()->email }} @endslot
					@slot('type_user') {{ Auth::user()->typeUser() }} @endslot
				@endcomponent
			</fieldset>
			<fieldset>
				<legend>Учебная информация</legend>
				<div class="form-group">
					<label>Группа</label>
					<input type="text" class="form-control" readonly value="Группа П-404к">
				</div>
				<div class="form-group">
					<label>Курс</label>
					<input type="text" class="form-control" readonly value="1">
				</div>
			</fieldset>
        </div>
        <div class="col-md-6">
			<fieldset>
				<legend>Дополнительная информация</legend>
				<form class="" action="" method="POST">
					<div class="form-group">
						<label>Место проживания</label>
						<input type="text" class="form-control" value="">
					</div>
					<div class="form-group">
						<label>Мобильный телефон</label>
						<input type="text" class="form-control" value="">
					</div>
					<div class="form-group">
						<input type="submit" name="changePasswordButton" class="btn btn-primary pull-right" value="Сохранить">
					</div>
				</form>
			</fieldset>
			<fieldset>
				<legend>Изменение пароля</legend>
				<form class="" action="" method="POST">
					<div class="form-group">
						<label>Новый пароль</label>
						<input type="text" class="form-control" value="">
					</div>
					<div class="form-group">
						<label>Повторите пароль</label>
						<input type="text" class="form-control" value="">
					</div>
					<div class="form-group">
						<input type="submit" name="changePasswordButton" class="btn btn-primary pull-right" value="Изменить">
					</div>
				</form>
			</fieldset>
        </div>
      </div>
    </div>
@endsection
