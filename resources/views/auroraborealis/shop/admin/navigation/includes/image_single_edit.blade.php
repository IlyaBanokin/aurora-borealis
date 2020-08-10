<div class="card-header">
    <h3 class="card-title">Изображение</h3>
</div>
<div class="card-body">
    <div id="singleMenu" class="btn btn-success" data-url="{{ route('shop.admin.navigation.addImage') }}"
         data-name="singleMenu">
        Выбрать файл
    </div>
    <p><small>Рекомендуемые размеры: 150x150px</small></p>
    <div class="singleMenu">
        <img src="{{'/' . env('THEME') . '/img/nav-menu/' . $item->img}}" style="max-height: 150px;max-width:220px;">
    </div>
</div>
<div class="overlay" id="overlay">
    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
