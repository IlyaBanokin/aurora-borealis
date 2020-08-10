@php /** @var \App\Models\ShopCategory $item  */ @endphp
<p style="color:red">* - Поля обязательные к заполнению</p>
<div class="form-group has-feedback">
    <label for="title" class="control-label">Наименование категории *</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Наименование категории"
           data-error="Поле обязательно для заполнения (мин. 2 символа)" data-minlength="2" value="{{ old('title', $item->title) }}" required>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
<div class="form-group">
    <label for="alias" class="control-label">Идентификатор(Slug)</label>
    <input type="text" class="form-control" name="alias" id="alias" value="{{ old('alias', $item->alias) }}" placeholder="Не обязательно к заполнению">
</div>
<div class="form-group has-feedback">
    <label for="keywords" class="control-label">Keywords</label>
    <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Ключевые слова"
           data-error="Максимальное кол-во символов 160"
           data-maxlength="160" value="{{ old('keywords', $item->keywords) }}">
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
<div class="form-group has-feedback">
    <label for="description" class="control-label">Description</label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Метатег Description"
           data-error="Максимальное кол-во символов 180"
           data-maxlength="180" value="{{ old('description', $item->description) }}">
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
<div class="form-group has-feedback">
    <label for="excerpt" class="control-label">Описание *</label>
    <textarea name="excerpt" class="form-control" id="excerpt"
              rows="8" data-error="Поле обязательно для заполнения (мин. 10 символов)"
              data-minlength="10" placeholder="Выдержка" required>{{ old('excerpt', $item->excerpt) }}</textarea>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors" style="color:red;"></div>
</div>
