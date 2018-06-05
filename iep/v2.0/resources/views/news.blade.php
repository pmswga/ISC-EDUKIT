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
							<input type="submit" class="btn btn-primary btn-block" value="Показать">
						</div>
					</form>
				</fieldset>
			</div>
            <div class="col-md-8">
                <fieldset>
                    <legend>Страница новостей</legend>
                    {{ $news_list->links() }}
                </fieldset>
				@foreach ($news_list as $news)
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    {{ $news->title }}
                                </h4>
                            </div>
                            <div class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{!! $news->content !!}}
                                </div>
                                <div class="panel-footer">
                                    Дата: {{ date('d.m.Y', strtotime($news->publication_date)) }}, Автор: {{ $news->author()->second_name." ".$news->author()->first_name." ".$news->author()->patronymic }}
                                </div>
                            </div>
                        </div>
                    </diV>

				@endforeach
            </div>
        </div>
    </div>
@endsection
