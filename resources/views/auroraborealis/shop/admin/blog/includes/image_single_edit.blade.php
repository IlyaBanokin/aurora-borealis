<div class="card-header">
    <h3 class="card-title">Изображение</h3>
</div>
<div class="card-body">
    <div id="singleBlog" class="btn btn-success" data-url="{{ route('shop.admin.blog.addImage') }}"
         data-name="singleBlog">
        Выбрать файл
    </div>
    <p><small>Рекомендуемые размеры: 240x322px</small></p>
    <div class="singleBlog">
        <img src="{{'/' . env('THEME') . '/img/blog/' . $item->img}}" style="max-height: 150px;max-width:220px;">
    </div>
</div>
<div class="overlay" id="overlay">
    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
