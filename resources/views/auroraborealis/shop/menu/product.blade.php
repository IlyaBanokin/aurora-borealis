<!-- Banner Start -->
<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">{{ (isset($getProduct->title)) ?  $getProduct->title : '#'}}</h2>
        <ol class="breadcrumb">
            {{--<li><a href="/">Главная</a></li>
            <li class="active">{{ (isset($category->title)) ?  $category->title : '#'}}</li>--}}
            {!! $breadcrumbs !!}
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Banner End -->
@if($getProduct )
    <div class="inner-page padd">
        <!-- Single Item Start -->
        <div class="single-item">
            <div class="container">
                <!-- Shopping single item contents -->
                <div class="single-item-content">
                    <div class="row">

                        <div class="col-md-4 col-sm-5">
                            <!-- Product image -->
                            <img class="img-responsive img-thumbnail"
                                 src="{{ asset(env('THEME')) }}/img/dish/{{ $getProduct->img }}"
                                 alt="{{ $getProduct->title }}"/>
                        </div>
                        <div class="col-md-8 col-sm-7">
                            <!-- Heading -->
                            <h3>{{ $getProduct->title }}</h3>
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <!-- Single item details -->
                                    <div class="item-details">
                                        <!-- Paragraph -->
                                        <p class="text-justify">{!! $getProduct->content !!}</p>
                                        <!-- Heading -->
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <!-- Form inside table wrapper -->
                                    <div class="table-responsive">
                                        <!-- Ordering form -->
                                        <form role="form">
                                            <!-- Table -->
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Price</td>
                                                    <td>₽ {{ $getProduct->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Кол-во:</td>
                                                    <td>
                                                        <div class="form-group quantity">
                                                            <input type="number" value="1" name="quantity"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <a class="add-to-cart-link btn btn-danger btn-sm" data-id="{{ $getProduct->id }}" href="{{ route('cart.show', ['id' => $getProduct->id]) }}">Заказать</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form><!--/ Table End-->
                                    </div><!--/ Table responsive class end -->
                                </div>
                            </div><!--/ Inner row end  -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Single Item End -->

    </div>
@else
    <h2>Информация о продукте отстутсвует</h2>
@endif
