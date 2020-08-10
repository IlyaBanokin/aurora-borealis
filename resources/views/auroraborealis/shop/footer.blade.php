<!-- Footer Start -->

<div class="footer padd">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!-- Footer widget -->
                <div class="footer-widget">
                    <!-- Logo area -->
                    <div class="logo">
                        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/logoAuroraBorealis.png"
                             alt="Logo Aurora Borealis"/>
                        <!-- Heading -->
                        <h1>Северное Сияние</h1>
                    </div>
                    <!-- Paragraph -->
                    <p>Организация питания в офисы и на предприятия Санкт-Петербурга</p>
                    <hr/>
                    <!-- Heading -->
                    <!-- Images -->
                    <a href="index.html#"><img class="payment img-responsive"
                                               src="{{ asset(env('THEME')) }}/img/payment/mastercard.gif" alt=""/></a>
                    <a href="index.html#"><img class="payment img-responsive"
                                               src="{{ asset(env('THEME')) }}/img/payment/paypal.gif" alt=""/></a>
                    <a href="index.html#"><img class="payment img-responsive"
                                               src="{{ asset(env('THEME')) }}/img/payment/visa.gif" alt=""/></a>
                </div> <!--/ Footer widget end -->
            </div>
            <div class="col-md-3 col-sm-6">
            @if($menuFooter && count($menuFooter) > 0)
                <!-- Footer widget -->
                    <div class="footer-widget">
                        <!-- Heading -->
                        <h4>Меню</h4>
                        <!-- Images -->
                        <div class="list-group">
                            @foreach($menuFooter as $item)
                                <a href="{{ route('products.show', ['alias' => $item->alias]) }}"
                                   class="list-group-item">
                                    {{ $item->title }} <span class="badge">{{ count($item->products) }} </span>
                                </a>

                            @endforeach
                        </div>
                    </div> <!--/ Footer widget end -->
                @endif
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-md-3 col-sm-6">
                <!-- Footer widget -->
                <div class="footer-widget">
                    <!-- Heading -->
                    <h4>Блог</h4>
                    @if($lastPostsBlog && count($lastPostsBlog) > 0)
                        <ul class="list-unstyled">
                            @foreach($lastPostsBlog as $post)
                            <li style="margin-top: 10px;"><i style="color: red;" class="fa fa-angle-double-right"></i> <a href="{{route('blog.show', ['blog' => $post->alias]) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                </div> <!--/ Footer widget end -->
            </div>
            <div class="col-md-3 col-sm-6">
                <!-- Footer widget -->
                <div class="footer-widget">
                    <!-- Heading -->
                    <h4>Контакты</h4>
                    <div class="contact-details">
                        <!-- Address / Icon -->
                        <i class="fa fa-map-marker br-red"></i>
                        <span>Россия, Санкт-Петербург, <br/>Пушкинский район,<br/> Московское шоссе, 167</span>
                        <div class="clearfix"></div>
                        <!-- Contact Number / Icon -->
                        <i class="fa fa-phone br-green"></i> <span>+7(812)-309-95-25</span>
                        <div class="clearfix"></div>
                        <!-- Email / Icon -->
                        <i class="fa fa-envelope-o br-lblue"></i> <span><a href="mailto:info@aurora-borealis.ru">info@aurora-borealis.ru</a></span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Social media icon -->
                    <div class="social">
                        <a target="_blank" href="https://www.instagram.com/aurora_borealis_spb" class="facebook"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a target="_blank" href="https://vk.com/auroraborealisspb" class="google-plus"><i
                                    class="fa fa-vk" aria-hidden="true"></i></a>
                    </div>
                </div> <!--/ Footer widget end -->
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright">
            <!-- Paragraph -->
            <p>&copy; Северное Сияние 2020 ИП Радько А.Л.</p>
        </div>
    </div>
</div>

<!-- Footer End -->

<!-- Scroll to top -->
<span class="totop"><a href="index.html#"><i class="fa fa-angle-up"></i></a></span>
