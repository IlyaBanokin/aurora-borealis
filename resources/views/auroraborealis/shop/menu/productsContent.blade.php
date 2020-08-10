<!-- Banner Start -->
<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">{{ (isset($category->title)) ?  $category->title : '#'}}</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('menu.index') }}">Меню</a></li>
            <li class="active">{{ (isset($category->title)) ?  $category->title : '#'}}</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Banner End -->
@if($getProducts && count($getProducts) > 0)
    <!-- Inner Content -->
    <div class="inner-page padd">
        <!-- Shopping Start -->
        <div class="shopping">
            <div class="container">
                <!-- Shopping items content -->
                <div class="shopping-content">
                    <div class="row">
                        @foreach($getProducts as $product)
                            <div class="col-md-3 col-sm-6">
                                <!-- Shopping items -->
                                <div class="shopping-item" style="width: 263px;height: 482px">
                                    <!-- Image -->
                                    <a href="{{route('product.info', ['alias' => $product->alias])  }}"><img
                                            class="img-responsive" style="width: 243px;height: 243px;"
                                            src="{{ asset(env('THEME')) }}/img/dish/{{ $product->img }}"
                                            alt="{{ $product->title }}"/></a>
                                    <!-- Shopping item name / Heading -->
                                    <h4 class="pull-left"><a
                                            href="{{route('product.info', ['alias' => $product->alias])  }}">{{ $product->title }}</a>
                                    </h4>
                                    <span class="item-price pull-right">₽ {{ $product->price }}</span>
                                    <div class="clearfix"></div>
                                    <!-- Paragraph -->
                                    <p>{{ $product->excerpt }}</p>
                                    <!-- Buy now button -->
                                    <div class="visible-xs">
                                        <a class="btn btn-danger btn-sm"
                                           href="{{route('product.info', ['alias' => $product->alias])  }}">Buy Now</a>
                                    </div>
                                    <!-- Shopping item hover block & link -->
                                    <div class="item-hover br-red hidden-xs"></div>
                                    <a class="link hidden-xs add-to-cart-link" data-id="{{ $product->id }}"
                                       href="{{ route('cart.show', ['id' => $product->id]) }}">В корзину</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                @if($getProducts->lastPage() > 0)

                    {{ $getProducts->links() }}

                @endif
                <!-- Pagination end-->
                </div>
            </div>
        </div>

        <!-- Shopping End -->

    </div><!-- / Inner Page Content End -->
@else
    <div class="inner-page padd">
        <div class="inner-menu">
            <div class="container">
                <div class="row">
                    <div class="alert alert-info" role="alert">
                        @lang('ru.no_products')
                    </div>
                </div>
            </div>
        </div>
@endif
