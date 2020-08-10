<!-- Blog page sidebar -->
<div class="blog-sidebar">
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <!-- Blog sidebar page widget -->
            <div class="sidebar-widget">
                <!-- Widget Heading -->
                <h4>Поиск по блогу</h4>
                <!-- search button and input box -->
                <form action="{{ route('blog.result') }}" method="GET" autocomplete="off"
                      role="form" class="form">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchBlog"
                               name="searchBlog" placeholder="Название статьи">
                        <span class="input-group-btn">
															<button class="btn btn-danger" type="submit"><i
                                                                    class="fa fa-search"></i></button>
											</span>
                    </div>
                </form><!--/ Form end -->
            </div><!--/ Widget end -->
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- Blog sidebar page widget -->
            <div class="sidebar-widget">
                <!-- Widget Heading -->
                <h4>О нас</h4>
                <!-- Paragraph -->
                <p>Гарантированный душевный отдых с друзьями и близкими. Мы работаем для жителей
                    Санкт-Петербурга и Шушар и не понаслышке знаем, что нужно для уставшего от
                    городской суеты человека.</p>
                <!-- Social media icon -->
                <div class="social">
                    <a target="_blank" href="https://vk.com/auroraborealisspb" class="facebook"><i
                            class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://www.instagram.com/aurora_borealis_spb"
                       class="google-plus"><i
                            class="fa fa-vk" aria-hidden="true"></i></a>
                </div>
            </div><!--/ Widget end -->
        </div>
    </div><!--/ Inner row end -->
</div><!--/ Page sidebar end -->
