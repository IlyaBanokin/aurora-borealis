<!-- Banner Start -->
<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">Контакты</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">Контакты</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<br>
<br>
<!-- Banner End -->

<div class="inner-page padd">
    <!-- Contact Us Start -->
    <div class="contactus">
        <div class="container">
            @include(env('THEME') . '.shop.contacts.includes.result_messages')
            <div class="row">
                <div class="col-md-6">
                    <!-- Contact Us content -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Contact content details -->
                            <div class="contact-details">
                                <!-- Heading -->
                                <h4>Местоположение</h4><!-- Address / Icon -->
                                <i class="fa fa-map-marker br-red"></i> <span>Россия, Санкт-Петербург, <br>Пушкинский район,<br> Московское шоссе, 167</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <!-- Contact content details -->
                            <div class="contact-details">
                                <!-- Heading -->
                                <h4>On-line Order</h4>
                                <!-- Contact Number / Icon -->
                                <i class="fa fa-phone br-green"></i> <span>+7(812)-309-95-25</span>
                                <div class="clearfix"></div>
                                <!-- Email / Icon -->
                                <i class="fa fa-envelope-o br-lblue"></i> <span><a href="mailto:info@aurora-borealis.ru">info@aurora-borealis.ru</a></span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div><!--/ Inner row end -->
                    <!-- Contact form -->
                    <div class="contact-form">
                        <!-- Heading -->
                        <h3>Обратная связь</h3>
                        <!-- Form -->


                        <form action="{{ route('contacts.store') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Имя">
                            </div>
                            <!-- Form input -->
                            <div class="form-group">
                                <!-- Form input -->
                                <input class="form-control" name="email" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <!-- Form text area -->
                                <textarea class="form-control" rows="3" name="text" placeholder="Сообщение..."></textarea>
                            </div>
                            <!-- Form button -->
                            <button class="btn btn-danger btn-sm" type="submit">Отправить</button>&nbsp;
                            <button class="btn btn-default btn-sm" type="reset">Очистить</button>
                        </form>



                    </div><!--/ Contact form end -->
                </div>
                <div class="col-md-6">
                    <!-- Map holder -->
                    <div class="map-container">
                        <!-- Google Map -->
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A8b5cf682707c180b6868635c2947eebac493b553725a5ab8fbc410b6a02c4979&amp;source=constructor" width="549" height="394" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us End -->
</div>
