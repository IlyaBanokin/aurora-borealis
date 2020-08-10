@php /** @var \App\Models\ShopSlider $item  */ @endphp
<form method="POST" action="{{ route('shop.admin.sliders.update', $item->id) }}" data-toggle="validator" role="form">
    @method('PATCH')
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include(env('THEME') . '.shop.admin.sliders.includes.item_edit_main_col')
            </div>
            <div class="col-md-3">
                @include(env('THEME') . '.shop.admin.sliders.includes.item_edit_add_col')
            </div>
        </div>
    </div>
</form>
