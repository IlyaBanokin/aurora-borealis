<div class="row justify-content-center">
    <div class="col-md-12">
        <p style="color:red">* - Поля обязательные к заполнению</p>
        <div class="card">
            <div class="card-body">
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Основное</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Дополнительно</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-group has-feedback">
                            <label for="title" class="control-label">Наименование товара *</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Наименование товара"
                                   data-error="Поле обязательно для заполнения (мин. 2 символа)" data-minlength="2"
                                   value="{{ old('title', $item->title) }}" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="keywords" class="control-label">Keywords</label>
                            <input type="text" class="form-control" name="keywords" id="keywords"
                                   placeholder="Ключевые слова"
                                   data-error="Максимальное кол-во символов 160"
                                   data-maxlength="160" value="{{ old('keywords', $item->keywords) }}">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="description" class="control-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="Метатег Description"
                                   data-error="Максимальное кол-во символов 180"
                                   data-maxlength="180" value="{{ old('description', $item->description) }}">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="content">Контент *</label>
                            <textarea name="content" id="editor1" style="display:none">
                                {{ old('content', $item->content) }}
                    </textarea>
                        </div>
                        <script>
                            var editor = CKEDITOR.replace('editor1');
                            CKFinder.setupCKEditor(editor);
                        </script>
                        <div class="form-group has-feedback">
                            <label for="price" class="control-label">Цена *</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Цена"
                                   value="{{ old('price', $item->price) }}" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="old_price" class="control-label">Старая цена</label>
                            <input type="text" class="form-control" name="old_price" id="old_price"
                                   placeholder="Старая цена"
                                   value="{{ old('old_price', $item->old_price) }}">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group">
                            <label for="alias" class="control-label">Идентификатор(Slug)</label>
                            <input type="text" class="form-control" name="alias" id="alias"
                                   value="{{ old('alias', $item->alias) }}" placeholder="Не обязательно к заполнению">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="category_id" class="control-label">Родитель</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="excerpt" class="control-label">Выдержка *</label>
                            <textarea name="excerpt" class="form-control" id="excerpt"
                                      rows="8" data-error="Поле обязательно для заполнения (мин. 10 символов)"
                                      data-minlength="10" placeholder="Выдержка"
                                      required>{{ old('excerpt', $item->excerpt) }}</textarea>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" style="color:red;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
