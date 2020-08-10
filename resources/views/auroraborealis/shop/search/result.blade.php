@if($products && count($products) > 0)
    <!-- Inner Content -->
    <div class="inner-page padd">

        <!-- Shopping Start -->

        <div class="shopping">
            <div class="container">
                <!-- Shopping items content -->
                <div class="shopping-content">
                    <h3>Поиск по запросу: "{{ $query }}"</h3>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <!-- Shopping items -->
                                <div class="shopping-item" style="width: 263px;height: 482px">
                                    <!-- Image -->
                                    <a href="{{route('product.info', ['alias' => $product->alias])  }}"><img class="img-responsive"
                                                                                                             src="{{ asset(env('THEME')) }}/img/shopping/{{ $product->img }}"
                                                                                                             alt="{{ $product->title }}"/></a>
                                    <!-- Shopping item name / Heading -->
                                    <h4 class="pull-left"><a href="{{route('product.info', ['alias' => $product->alias])  }}">{{ $product->title }}</a></h4>
                                    <span class="item-price pull-right">₽ {{ $product->price }}</span>
                                    <div class="clearfix"></div>
                                    <!-- Paragraph -->
                                    <p>{{ $product->excerpt }}</p>
                                    <!-- Buy now button -->
                                    <div class="visible-xs">
                                        <a class="btn btn-danger btn-sm" href="{{route('product.info', ['alias' => $product->alias])  }}">Buy Now</a>
                                    </div>
                                    <!-- Shopping item hover block & link -->
                                    <div class="item-hover br-red hidden-xs"></div>
                                    <a class="link hidden-xs add-to-cart-link" data-id="{{ $product->id }}" href="{{ route('cart.show', ['id' => $product->id]) }}">В корзину</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                @if($products->lastPage() > 0)

                    {{ $products->links() }}

                @endif
                <!-- Pagination end-->
                </div>
            </div>
        </div>

        <!-- Shopping End -->

    </div><!-- / Inner Page Content End -->
@else
    <h2>Поиск не дал результатов...</h2>
@endif
