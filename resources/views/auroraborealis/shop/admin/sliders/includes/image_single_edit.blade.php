<div class="card-header">
    <h3 class="card-title">Изображение</h3>
</div>
<div class="card-body">
    <div id="singleSlider" class="btn btn-success" data-url="{{ route('shop.admin.sliders.addImage') }}"
         data-name="singleSlider">
        Выбрать файл
    </div>
    <p><small>Рекомендуемые размеры: 1920x900px</small></p>
    <div class="singleSlider">
        <img src="{{'/' . env('THEME') . '/img/slider/' . $item->img}}" style="max-height: 150px;max-width:220px;">
    </div>
</div>
<div class="overlay" id="overlay">
    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
