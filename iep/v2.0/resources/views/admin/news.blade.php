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
                        </tr>
                    </thead>
                    <tbody>
            			@forelse ($news_list as $news)
            				<tr>
            					<td>{{ $news->caption }}</td>
            					<td>{{ $news->content }}</td>
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
                      <input type="text" name="caption" class="form-control">
                  </div>

                  <div class="form-group">
                      <label>Содержание</label>
                      <textarea name="content" class="form-control"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Опубликовать">
              </div>
            </div>
          </div>
        </div>
      </form>

@endsection
