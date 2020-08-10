<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $countCategories }}</h3>
                <p>Категории</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('shop.admin.categories.index') }}" class="small-box-footer">Просмотр категорий <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $countProducts }}<sup style="font-size: 20px">%</sup></h3>

                <p>Товары</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('shop.admin.products.index') }}" class="small-box-footer">Просмотр товаров<i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $countArticles }}</h3>

                <p>Блог</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('shop.admin.blog.index') }}" class="small-box-footer">Просмотр статей <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">
                Слайды на главной
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @if(count($getSlider) > 0)
                    @foreach($getSlider as $slide)
                        <div class="col-sm-4">
                            <a href="{{route('shop.admin.sliders.edit', $slide->id)}}" data-toggle="lightbox"
                               data-title="sample 11 - white" data-gallery="gallery">
                                <img src="{{ asset(env('THEME')) }}/img/{{ $slide->img }}" class="img-fluid mb-2"
                                     alt="white sample">
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Ошибка!</h5>
                        Не добавлен не один слайд.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Меню</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset(env('THEME')) }}/img/menu/{{ $category->img }}"
                                         alt="{{ $category->title }}" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('shop.admin.products.list', ['alias' => $category->alias]) }}">{{ $category->title }}
                                    </a><a href="{{route('shop.admin.categories.edit', $category->id)}}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <span class="product-description">
                        {{ $category->excerpt }}
                      </span>
                                </div>
                            </li>
                    @endforeach
                @else

                @endif
                <!-- /.item -->
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="{{ route('shop.admin.categories.index') }}" class="uppercase">Просмотр всех категорий</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-md-6">
        <!-- Box Comment -->
        <div class="card card-widget">
            <div class="card-header">
                <h3 class="card-title">Последние записи блога</h3>
                <!-- /.user-block -->
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if(count($lastArticle) > 0)
                @foreach($lastArticle as $article)
                <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{ asset(env('THEME')) }}/img/blog/{{ $article->img }}" alt="{{ $article->title }}">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">{{ $article->title }}</a></h4>

                            <div class="attachment-text">
                                {!! \Illuminate\Support\Str::limit($article->content, 127, ' ') !!}<br/><a
                                    href="#">Редактировать статью</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->
                @endforeach
                @else
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{ asset(env('THEME')) }}/img/blog/no_image.jpg" alt="">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading">Новых статей нет...</h4>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
            <div class="card-footer">
                <a href="#">Просмотр всех статей</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>
