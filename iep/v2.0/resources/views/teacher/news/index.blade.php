@extends('teacher.layouts.app')

@section('title', 'Список новостей')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Дата публикации</th>
                            <th class="text-right">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
            			@forelse ($news_list as $news)
            				<tr>
            					<td>{{ $news->title }}</td>
            					<td>{{ $news->content }}</td>
            					<td>{{ date('d.m.Y', strtotime($news->publication_date)) }}</td>
                                <td>
                                    {{ $news->id_news }}
                                    <form onsubmit="return confirm('Удалить?');" action="{{ route('teacher.news.destroy', $news) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
            				</tr>
            			@empty
            				<tr>
            					<td colspan="5">Новостей нет</td>
            				</tr>
            			@endforelse
                    </tbody>
            		<tfoot>
            			<tr>
            				<td colspan="3">
            					<ul class="pagination pull-right">
            						{{ $news_list->links() }}
            					</ul>
            				</td>
            			</tr>
            		</tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
