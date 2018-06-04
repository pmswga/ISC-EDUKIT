@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="container">
        <div class="row">
			<div class="col-md-4">
				<fieldset>
					<legend>Фильтр</legend>
					<form>
						<div class="form-group">
							<label>С</label>
							<input type="date" class="form-control">
						</div>
						<div class="form-group">
							<label>До</label>
							<input type="date" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Показать">
						</div>
					</form>
				</fieldset>
			</div>
            <div class="col-md-8">
                <h2>Новости</h2>
				@foreach ($news_list as $news)
					
					{{ $news->title }}
				
				@endforeach
				
					{{ $news_list->links() }}
				
            </div>
        </div>
    </div>
@endsection
