@extends('teacher.layouts.app')

@section('title', 'Личный кабинет преподавателя')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th class="text-center">Опубликовано новостей</th>
					<th class="text-center">Созданных тестов</th>
					<th class="text-center">Пройденных</th>
					<th class="text-center">Непройденных</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="text-center"><h3>{{ $count_news }}</h3></td>
					<td class="text-center"><h3>15</h3></td>
					<td class="text-center"><h3>30</h3></td>
					<td class="text-center"><h3>24</h3></td>
				  </tr>
				</tbody>
			  </table>
			</div>
        </div>
      </div>
    </div>
@endsection
