@php /** @var \App\Models\ShopProduct $item  */ @endphp
<form method="POST" action="{{ route('shop.admin.products.update', $item->id) }}" data-toggle="validator" role="form">
    @method('PATCH')
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include(env('THEME') . '.shop.admin.products.includes.item_edit_main_col')
        </div>
        <div class="col-md-3">
            <br />
            <div class="row justify-content-center">
                @include(env('THEME') . '.shop.admin.products.includes.item_edit_col')
            </div>
        </div>
    </div>
</form>
