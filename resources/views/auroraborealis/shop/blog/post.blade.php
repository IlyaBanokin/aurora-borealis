<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="img/crown-white.png" alt="">
        <!-- Heading -->
        <h2 class="white">Blog</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('blog.index') }}">Блог</a></li>
            <li class="active">{{ $post->title }}</li>
        </ol>
        <div class="clearfix"></div>
    </div>
</div>

<div class="inner-page padd">
    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- The new post done by user's all in the post block -->
                    <div class="blog-post">
                        <!-- Entry is the one post for each user -->
                        <div class="entry">
                            <!-- Post Images -->
                            <div class="blog-img pull-left">
                                <img src="{{ asset(env('THEME')) }}/img/blog/{{ $post->img }}"
                                     class="img-responsive img-thumbnail" alt="{{ $post->title }}">
                            </div>
                            <!-- Meta for this block -->
                            <div class="meta">
                                <i class="fa fa-calendar"></i>&nbsp; {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at)->format('M d Y') }}
                            </div>
                            <!-- Heading of the  post -->
                            <h3><a href="{{ route('blog.show', ['blog' => $post->alias]) }}">{{ $post->title }}</a></h3>
                            <!-- Paragraph -->
                            <p>{!! $post->content !!}</p>
                            <div class="clearfix"></div>
                        </div>

                    </div><!--/ Blog post class end -->

                </div> <!--/ Main blog column end -->
                <div class="col-md-4">
                    @include(env('THEME') . '.shop.blog.includes.right_col')
                </div>
            </div><!--/ Row end -->
        </div>
    </div>

    <!-- Blog End -->

</div>
