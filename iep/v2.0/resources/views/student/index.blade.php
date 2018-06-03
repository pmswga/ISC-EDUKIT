@extends('student.layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th class="text-center">Пройденных тестов</th>
					<th class="text-center">Посещено дней</th>
					<th class="text-center">Пропущено дней</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="text-center"><h3>15</h3></td>
					<td class="text-center"><h3>30</h3></td>
					<td class="text-center"><h3>24</h3></td>
				  </tr>
				</tbody>
			  </table>
			</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
			<fieldset>
				<legend>Расписание</legend>
			</fieldset>
        </div>
      </div>
    </div>
@endsection
