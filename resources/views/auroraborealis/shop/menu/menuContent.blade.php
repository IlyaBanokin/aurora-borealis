<!-- Banner Start -->
<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">Меню</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">Меню</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Banner End -->
@if($categories)
    <div class="inner-page padd">
        <!-- Inner page menu start -->
        <div class="inner-menu">
            <div class="container">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 col-sm-6">
                            <!-- Inner page menu list -->
                            <div class="menu-list">
                                <!-- Menu item heading -->
                                <a href="{{ route('products.show', ['alias' => $category->alias]) }}">
                                    <h3>{{ $category->title }}</h3></a>
                                <!-- Image for menu list -->
                                <a href="{{ route('products.show', ['alias' => $category->alias]) }}"><img
                                        class="img-responsive" style="width: 350px;height: 175px;"
                                        src="{{ asset(env('THEME')) }}/img/menu/{{ $category->img }}"
                                        alt="{{ $category->title }}"/></a>
                                <!-- Menu list items -->
                                <div class="menu-list-item">
                                    <!-- Heading / Dish name -->
                                    <h4 class="pull-left">{{ $category->excerpt }}</h4>
                                    <!-- Dish price -->

                                    <div class="clearfix"></div>
                                </div>
                                <!-- Menu list items -->
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($categories->lastPage() > 0)

                    {{ $categories->links() }}

                @endif
            </div>
        </div>
        <!-- Inner page menu end -->
    </div>
@else
    <div class="alert alert-secondary" role="alert">
        @lang('ru.no_categories')
    </div>
@endif

