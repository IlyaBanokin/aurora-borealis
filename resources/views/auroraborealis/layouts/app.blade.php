<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Title here -->
    <title>{!! MetaTag::tag('title') !!}</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="{!! MetaTag::tag('description') !!}">
    <meta name="keywords" content="{!! MetaTag::tag('keywords') !!}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset(env('THEME')) }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link href="{{ asset(env('THEME')) }}/css/settings.css" rel="stylesheet">
    <!-- FlexSlider Css -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/flexslider.css" media="screen"/>
    <!-- Portfolio CSS -->
    <link href="{{ asset(env('THEME')) }}/css/prettyPhoto.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link href="{{ asset(env('THEME')) }}/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Less -->
    <link href="{{ asset(env('THEME')) }}/css/less-style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset(env('THEME')) }}/css/style.css" rel="stylesheet">
<!--[if IE]>
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/ie-style.css"><![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="/">
</head>

<body>
<!-- Page Wrapper -->
<div class="wrapper">
    <!-- Header Start -->
    <div class="header">
        <div class="container">
            <!-- Header top area content -->
            <div class="header-top">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!-- Header top left content contact -->
                        <div class="header-contact">
                            <!-- Contact number -->
                            <span><i class="fa fa-phone red"></i> +7(812)-309-95-25</span>
                        </div>
                    </div>
                    @auth
                        <a href="{{ route('get.logout') }}">Выйти</a>
                        @endauth
                    <div class="col-md-4 col-sm-4">
                        <!-- Header top right content search box -->
                        <div class=" header-search">
                            <form action="{{ route('products.result') }}" method="GET" autocomplete="off" class="form"
                                  role="form">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search" name="search"
                                           placeholder="Поиск по меню...">
                                    <span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i
                                                    class="fa fa-search"></i></button>
										  </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <!-- Button Kart -->
                        <div class="btn-cart-md dropdown">
                            <a class="cart-link dropdown-toggle" href="{{ route('cart.index') }}"
                               onclick="getCart(); return false;">
                                <!-- Image -->
                                <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/cart.png" alt=""/>
                                <!-- Heading -->
                                <h4>Корзина товаров</h4>
                                @if(\Session::has("cart-qty") && \Session::has("cart-sum"))
                                    <span
                                        class="simpleCart_total">{{ \Session::get("cart-qty") }} товар(а) ₽{{ \Session::get("cart-sum") }}</span>
                                @else
                                    <span class="simpleCart_total">Корзина пуста</span>
                                @endif
                                <div class="clearfix"></div>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <!-- Link -->
                    <a href="/">
                        <!-- Logo area -->
                        <div class="logo">
                            <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/logoAuroraBorealis.png"
                                 alt=""/>
                            <!-- Heading -->
                            <h1>Северное Сияние</h1>
                            <!-- Paragraph -->
                            <p>Доставка по Санкт-Петербургу и области.</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-7 col-sm-5">
                    <!-- Navigation -->
                @yield('navigation')
                <!-- End Navigation -->
                </div>
            </div>
        </div> <!-- / .container -->
    </div>

    <!-- Header End -->

    <!-- Slider Start
    #################################
        - THEMEPUNCH BANNER -
    #################################	-->

@yield('slider')


<!-- Slider End -->


    <!-- Main Content -->
    <div class="main-content">

        <!-- Dishes Start -->

    @yield('newDishes')

    <!-- Dishes End -->

        <!-- menu Start -->

    @yield('menu')

    <!-- Menu End -->

        @yield('content')


    </div><!-- / Main Content End -->

    <!-- Footer End -->

@yield('footer')

<!-- Footer End -->

</div><!-- / Wrapper End -->


<!-- Scroll to top -->
<span class="totop"><a href="index.html#"><i class="fa fa-angle-up"></i></a></span>

<div class="modal fade in" id="cart" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Корзина товаров</h4>
            </div>
            <div class="modal-body">
                <!-- Items table -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a type="button" href="{{ route('cart.checkout') }}" class="btn btn-info">Оформить заказ</a>
                <button type="button" onclick="clearCart()" class="btn btn-danger">Очистить корзину</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- Javascript files -->
<!-- jQuery -->
<script src="{{ asset(env('THEME')) }}/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset(env('THEME')) }}/js/bootstrap.min.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script type="text/javascript">
    var route = "{{ route('products.search') }}";
    $('#search').typeahead({
        source: function (term, process) {
            return $.get(route, {term: term}, function (data) {
                return process(data);
            });
        }
    });
</script>

{{--Search Blog--}}
<script type="text/javascript">
    var route = "{{ route('blog.search') }}";
    $('#searchBlog').typeahead({
        source: function (term, process) {
            return $.get(route, {term: term}, function (data) {
                return process(data);
            });
        }
    });
</script>
{{--Search Blog--}}

<script src="{{ asset(env('THEME')) }}/js/main.js"></script>
<script type="text/javascript" src="{{ asset(env('THEME')) }}/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="{{ asset(env('THEME')) }}/js/jquery.themepunch.revolution.min.js"></script>
<!-- FLEX SLIDER SCRIPTS  -->
<script defer src="{{ asset(env('THEME')) }}/js/jquery.flexslider-min.js"></script>
<!-- Pretty Photo JS -->
<script src="{{ asset(env('THEME')) }}/js/jquery.prettyPhoto.js"></script>
<!-- Respond JS for IE8 -->
<script src="{{ asset(env('THEME')) }}/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="{{ asset(env('THEME')) }}/js/html5shiv.js"></script>
<!-- Custom JS -->
<script src="{{ asset(env('THEME')) }}/js/custom.js"></script>
<!-- JS code for this page -->
<script>
    /* ******************************************** */
    /*  JS for SLIDER REVOLUTION  */
    /* ******************************************** */
    jQuery(document).ready(function () {
        jQuery('.tp-banner').revolution(
            {
                delay: 9000,
                startheight: 500,

                hideThumbs: 10,

                navigationType: "bullet",


                hideArrowsOnMobile: "on",

                touchenabled: "on",
                onHoverStop: "on",

                navOffsetHorizontal: 0,
                navOffsetVertical: 20,

                stopAtSlide: -1,
                stopAfterLoops: -1,

                shadow: 0,

                fullWidth: "on",
                fullScreen: "off"
            });
    });
    /* ******************************************** */
    /*  JS for FlexSlider  */
    /* ******************************************** */

    $(window).load(function () {
        $('.flexslider-recent').flexslider({
            animation: "fade",
            animationSpeed: 1000,
            controlNav: true,
            directionNav: false
        });
        $('.flexslider-testimonial').flexslider({
            animation: "fade",
            slideshowSpeed: 5000,
            animationSpeed: 1000,
            controlNav: true,
            directionNav: false
        });
    });

    /* Gallery */

    jQuery(".gallery-img-link").prettyPhoto({
        overlay_gallery: false, social_tools: false
    });

</script>
</body>
</html>
