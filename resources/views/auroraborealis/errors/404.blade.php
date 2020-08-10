@extends(env('THEME').'.layouts.app')

@section('content')
    <!-- Inner Content -->
    <div class="inner-page padd">

        <!-- Error Start -->

        <div class="error">
            <div class="container">
                <!-- Error page content -->
                <div class="error-content">
                    <!-- Heading -->
                    <h3>404<span class="red">!!!</span></h3>
                    <!-- Message paragraph -->
                    <p class="text-muted">К сожалению, запрошенная Вами страница не может быть найдена.</p>
                    <!-- search button and input box -->
                </div>
            </div>
        </div>

        <!-- Error End -->

    </div><!-- / Inner Page Content End -->
@endsection
