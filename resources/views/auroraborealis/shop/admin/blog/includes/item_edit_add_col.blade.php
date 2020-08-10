<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-danger file-upload">
            @include(env('THEME') . '.shop.admin.blog.includes.image_single_edit')
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Опубликовано</label>
                    <input type="text" value="{{ $item->published_at }}" class="form-control" disabled>
                </div>
                <label for="title">Изменено</label>
                <input type="text" value="{{ $item->updated_at }}" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>ID: {{$item->id}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
