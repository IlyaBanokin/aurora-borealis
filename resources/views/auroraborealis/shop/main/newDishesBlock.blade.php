@if($newDishes && count($newDishes) > 0)
    <div class="dishes padd">
        <div class="container">
            <!-- Default Heading -->
            <div class="default-heading">
                <!-- Crown image -->
                <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown.png" alt=""/>
                <!-- Heading -->
                <h2>Новые Блюда</h2>
                <!-- Paragraph -->
                <p>Спешите попробовать! Новые блюда от наших поваров.</p>
                <!-- Border -->
                <div class="border"></div>
            </div>
            <div class="row">
                @foreach($newDishes as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="dishes-item-container">
                        <!-- Image Frame -->
                        <div class="img-frame">
                            <!-- Image -->
                            <img src="{{ asset(env('THEME')) }}/img/{{ $item->img }}" style="width: 244px;height: 244px;" class="img-responsive" alt="{{ $item->title }}"/>
                            <!-- Block for on hover effect to image -->
                            <div class="img-frame-hover">
                                <!-- Hover Icon -->
                                <a href="{{route('product.info', ['alias' => $item->alias])  }}"><i class="fa fa-cutlery"></i></a>
                            </div>
                        </div>
                        <!-- Dish Details -->
                        <div class="dish-details">
                            <!-- Heading -->
                            <h3>{{ $item->title }}</h3>
                            <!-- Paragraph -->
                            <p>{{ Str::limit($item->excerpt , 65)}}</p>
                            <!-- Button -->
                            <a href="{{route('product.info', ['alias' => $item->alias])  }}" class="btn btn-danger btn-sm">Просмотр</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif


