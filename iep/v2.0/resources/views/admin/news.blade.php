@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addNews">
                    Добавить новость
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Список новостей</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Содержание</th>
                            <th class="text-right">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
            			@forelse ($news_list as $news)
            				<tr>
            					<td>{{ $news->title }}</td>
            					<td>{{ $news->content }}</td>
                                <td>
                                    <form onsubmit="return confirm('Удалить?');" action="{{ route('admin.news.destroy', $news) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
    <!-- Button trigger modal -->

<!-- Modal -->
    <form action="{{ route('admin.news.store') }}" method="POST">
        <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Название модали</h4>
              </div>
              <div class="modal-body">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label>Заголовок</label>
                      <input type="text" name="title" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Краткое описание</label>
                      <textarea name="description" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                      <label>Содержание</label>
                      <textarea name="content" class="form-control"></textarea>
                  </div>

                  <input type="hidden" name="id_author" value="1">
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Опубликовать">
              </div>
            </div>
          </div>
        </div>
      </form>

@endsection
