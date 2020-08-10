<!-- Banner Start -->

<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">О нашем уютном кафе</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">О нас</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<br>
<br>

<!-- Banner End -->

<!-- Inner Content -->
<div class="inner-page padd">

    <!-- About company -->
    <div class="about-company padd">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- About Compnay Item -->
                    <div class="about-company-item">
                        <!-- About Company Image -->
                        <img class="img-responsive img-thumbnail" src="{{ asset(env('THEME')) }}/img/chef/about-1.jpg"
                             alt=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- About Compnay Item -->
                    <div class="about-company-item">
                        <!-- Heading -->
                        <h3>О Нашем <span class="lblue">Кафе</span></h3>
                        <!-- Paragraph -->
                        <p>Гарантированный душевный отдых с друзьями и близкими. Мы работаем для жителей Санкт-Петербурга и Шушар и не понаслышке знаем, что нужно для уставшего от городской суеты человека. В нашем меню Вы найдете проверенные и понятные блюда русской и европейской кухни, так же вкусные и свежие морепродкуты прямо от поставщиков</p>
                        <br/><!--/ Line break -->

                    </div>
                </div>

                <div class="general">
                    <div class="col-md-8 col-sm-8">
                        <!-- General information content -->
                        <div class="general-content">
                            <!-- Navigation tab -->
                            <ul class="nav nav-tabs">
                                <!-- Navigation tabs (Job titles ). Use unique value for "href" in "anchor tags". -->
                                <li class="active"><a href="general.html#tab1" data-toggle="tab">Европейская кухня</a>
                                </li>
                                <li class=""><a href="general.html#tab2" data-toggle="tab">Морепродукты</a>
                                </li>
                            </ul>
                            <!-- Tab content -->
                            <div class="tab-content">
                                <!-- In "id", use the value which you used in above anchor tags -->
                                <div class="tab-pane active" id="tab1">
                                    <!-- Heading -->
                                    <h5>Европейская кухня</h5>
                                    <!-- Paragraph -->
                                    <p>Здесь вы можете провести время за общением в компании или просто оставить волнующие мысли после рабочих будней. Наша Европейская кухня порадует вас разнообразием и приятной ценой
                                    </p>
                                    <!-- Paragraph -->
                                    <p>Основу блюд составляют мясо, рыба и морепродукты. Восточно-европейская кухня, в которую входят блюда, популярные в России, Белоруссии и Украине. Именно к ней относится наш любимый борщ, драники, блины, вареники.</p>
                                    <!-- List content -->
                                </div> <!--/ tab-pane end -->
                                <div class="tab-pane" id="tab2">
                                    <!-- heading -->
                                    <h5>Морепродукты</h5>
                                    <!-- Paragraph -->
                                    <p>Мы рекомендуем купить качественные свежие морепродукты в СПб с доставкой, которая позволит вам не тратить собственное время. Если же хотите забрать продукцию самостоятельно, приезжайте к нам. Внешний вид всех категорий товаров соответствует фото, которые размещены на сайте. Все виды продукции могут поставляться в любых необходимых количествах. </p>
                                    <!-- Paragraph -->
                                    <p>Используйте возможность сотрудничать с ответственным поставщиком морепродуктов, который стремится предлагать лучшую продукцию из разных уголков планеты. С нами сотрудничать выгодно и надежно. Ждем ваш заказ и гарантируем его оперативную обработку.</p>
                                    <!-- Paragraph -->
                                </div> <!--/ tab-pane end -->
                            </div><!--/ Tab content end -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <!-- General Sidebar image -->
                        <div class="general-img">
                            <img class="img-responsive img-thumbnail" src="{{ asset(env('THEME')) }}/img/dish/dish1.jpg"
                                 alt="">
                        </div>
                        <!-- General Sidebar image -->
                    </div>
                </div>

            </div>
        </div>
    </div>

</div><!-- / Inner Page Content End -->
