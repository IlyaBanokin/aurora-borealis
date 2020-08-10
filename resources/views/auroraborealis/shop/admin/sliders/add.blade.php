<form method="POST" action="{{ route('shop.admin.sliders.store') }}" data-toggle="validator" role="form">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include(env('THEME') . '.shop.admin.sliders.includes.item_add_main_col')
            </div>
            <div class="col-md-3">
                <br>
                <div class="row justify-content-center">
                    @include(env('THEME') . '.shop.admin.sliders.includes.item_add_col')
                </div>
            </div>
        </div>
    </div>
</form>
