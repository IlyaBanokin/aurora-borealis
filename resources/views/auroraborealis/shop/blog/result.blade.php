<!-- Banner Start -->
<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">Поиск по статьям</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('blog.index') }}">Блог</a></li>
            <li class="active">Поиск</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Banner End -->

<!-- Inner Content -->
<div class="inner-page padd">
    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            @if($posts && count($posts) > 0)
                <div class="row">
                    <div class="col-md-8">
                        <!-- The new post done by user's all in the post block -->
                        <div class="blog-post">
                            <!-- Entry is the one post for each user -->
                            @foreach($posts as $post)
                                <div class="entry">
                                    <!-- Post Images -->
                                    <div class="blog-img pull-left">
                                        <img src="{{ asset(env('THEME')) }}/img/blog/{{ $post->img }}"
                                             class="img-responsive img-thumbnail" alt="{{ $post->title }}"/>
                                    </div>
                                    <!-- Meta for this block -->

                                    <div class="meta">
                                        <i class="fa fa-calendar"></i>&nbsp; {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at)->format('M d Y') }}

                                    </div>
                                    <!-- Heading of the  post -->
                                    <h3><a href="#">{{ $post->title }}</a></h3>
                                    <hr/><!-- Horizontal line -->
                                    <!-- Paragraph -->
                                    <p>{{ \Illuminate\Support\Str::limit($post->content, 490, ' ....') }}</p>
                                    <div class="clearfix"></div>
                                </div>
                        @endforeach
                        <!-- Pagination -->
                            <!-- Pagination -->
                        @if($posts->lastPage() > 0)

                            {{ $posts->links() }}

                        @endif
                        <!-- Pagination end-->
                            <!-- Pagination end-->
                        </div>
                    </div> <!--/ Main blog column end -->
                    <div class="col-md-4">
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
                                              role="form" class="form-inline">
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
                                        <p>В нашем блоге Вы найдете интересные статьи по нашим блюдам, акциям и интересным историям из мира кулинарии. Каждый день вы будете узнавать что то новое и вместе с нами будете в центре событий.</p>
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
                    </div>
                </div><!--/ Row end -->
            @else
                <h2>Поиск не дал результатов...</h2>
            @endif
        </div>
    </div>

</div><!-- / Inner Page Content End -->

<!-- Blog End -->

