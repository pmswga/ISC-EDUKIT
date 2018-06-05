<form action="{{ $route }}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Добавить новость</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Заголовок</label>
                  <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
                  <label>Содержание</label>
                  <textarea id="news-editor" name="content" class="form-control"></textarea>
              </div>
              <div class="form-group">
                  <label>Автор</label>
                  <input type="text" class="form-control" value="{{ Auth::user()->second_name." ".Auth::user()->first_name." ".Auth::user()->patronymic }}" readonly>
              </div>
              <div class="form-group">
                  <label>Дата публикации</label>
                  <input type="text" class="form-control" value="{{ date('d.m.Y') }}" readonly>
              </div>
          </div>
          <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Опубликовать">
          </div>
        </div>
      </div>
    </div>
</form>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'news-editor' );
</script>
