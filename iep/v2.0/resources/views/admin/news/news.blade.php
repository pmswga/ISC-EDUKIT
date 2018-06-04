@extends('admin.layouts.app')

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
                            <th class="text-right">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
            			@forelse ($news_list as $news)
            				<tr>
            					<td>{{ $news->title }}</td>
            					<td>{{ $news->description }}</td>
                                <td>
                                    <form onsubmit="return confirm('Удалить?');" action="{{ route('admin.news.destroy', $news) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
            				</tr>
            			@empty
            				<tr>
            					<td colspan="2">Новостей нет</td>
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
