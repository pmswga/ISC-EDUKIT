<form action="{{ $route }}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Название модали</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                  <label>Заголовок</label>
                  <input type="text" name="title" class="form-control">
              </div>

              <div class="form-group">
                  <label>Содержание</label>
                  <textarea name="content" class="form-control"></textarea>
              </div>

              <input type="hidden" name="id_author" value="{{ Auth::user()->id }}">
          </div>
          <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Опубликовать">
          </div>
        </div>
      </div>
    </div>
</form>
