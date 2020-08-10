<div class="form-group has-feedback">
    <label for="title" class="control-label">Заголовок</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Заголовок слайда"
           data-error="Максимальное кол-во символов 30" data-maxlength="30" value="{{ old('title', $item->title) }}">
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
<div class="form-group has-feedback">
    <label for="description" class="control-label">Краткое описание</label>
    <textarea name="description" class="form-control" id="description"
              rows="6" data-error="Максимальное кол-во символов 195"
              data-maxlength="195" placeholder="Описание">{{ old('description', $item->description) }}</textarea>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
