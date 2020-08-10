@php /** @var \App\Models\ShopBlog $item  */ @endphp
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
                            <label for="title" class="control-label">Наименование статьи *</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Наименование статьи"
                                   data-error="Поле обязательно для заполнения (мин. 62 символа)" data-maxlength="62"
                                   value="{{ old('title', $item->title) }}" required>
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
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group">
                            <label for="alias" class="control-label">Идентификатор(Slug)</label>
                            <input type="text" class="form-control" name="alias" id="alias"
                                   value="{{ old('alias', $item->alias) }}" placeholder="Не обязательно к заполнению">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
