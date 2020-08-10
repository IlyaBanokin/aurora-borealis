<!-- Banner Start -->

<div class="banner padd">
    <div class="container">
        <!-- Image -->
        <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown-white.png" alt=""/>
        <!-- Heading -->
        <h2 class="white">Блог</h2>
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">Блог</li>
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
                                    <h3><a href="{{ route('blog.show', ['blog' => $post->alias]) }}">{{ $post->title }}</a></h3>
                                    <hr/><!-- Horizontal line -->
                                    <!-- Paragraph -->
                                    <p>{!! \Illuminate\Support\Str::limit($post->content, 490, ' ....') !!}  </p>
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
                        @include(env('THEME') . '.shop.blog.includes.right_col')
                    </div>
                </div><!--/ Row end -->
            @else
                <h2>Записей в блоге нет...</h2>
            @endif
        </div>
    </div>

</div><!-- / Inner Page Content End -->

<!-- Blog End -->
