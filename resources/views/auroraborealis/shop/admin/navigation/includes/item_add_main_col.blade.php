<div class="row">
    <div class="col-md-6">
        <div class="form-group has-feedback">
            <label for="title" class="control-label">Наименование</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Наименование"
                   data-error="Поле обязательно для заполнения (мин. 3 символа)" data-minlength="3"
                   value="{{ old('title', $item->title) }}" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" style="color:red;"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="alias" class="control-label">Путь</label>
            <input type="text" class="form-control" name="path" id="path" value="{{ old('path', $item->path) }}"
                   placeholder="Не обязательно к заполнению">
        </div>
    </div>
</div>
