@if($menu && count($menu) > 0)
    <div class="menu padd">
        <div class="container">
            <!-- Default Heading -->
            <div class="default-heading">
                <!-- Crown image -->
                <img class="img-responsive" src="{{ asset(env('THEME')) }}/img/crown.png" alt=""/>
                <!-- Heading -->
                <h2>Menu</h2>
                <!-- Paragraph -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.</p>
                <!-- Border -->
                <div class="border"></div>
            </div>
            <!-- Menu content container -->
            <div class="menu-container">
                <div class="row">
                    @foreach($menu as $item)
                            <div class="col-md-4 col-sm-4">
                                <!-- Menu header -->
                                <div class="menu-head">
                                    <!-- Image for menu item -->
                                    <a href="{{ route('products.show', ['alias' => $item->alias]) }}"><img class="menu-img img-responsive img-thumbnail" style="width: 350px;height: 175px;"
                                            src="{{ asset(env('THEME')) }}/img/menu/{{ $item->img }}" alt=""/></a>
                                    <!-- Menu title / Heading -->
                                    <a href="{{ route('products.show', ['alias' => $item->alias]) }}"><h3>{{ $item->title }}</h3></a>
                                    <!-- Border for above heading -->
                                    <div class="title-border br-red"></div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div> <!-- /Menu container end -->
        </div>
    </div>
@endif
