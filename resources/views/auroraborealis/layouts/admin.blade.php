<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset(env('THEME')) }}/adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/dist/css/my.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="{{ asset(env('THEME')) }}/adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset(env('THEME')) }}/adminLte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Include CKeditor  -->
    <script src="{{ asset(env('THEME')) }}/adminLte/plugins/ckeditor/ckeditor.js"></script>
    <!-- Include CKfinder  -->
    <script src="{{ asset(env('THEME')) }}/adminLte/plugins/ckfinder/ckfinder.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('admin') }}" class="nav-link">Главная</a>
            </li>
            @auth
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('get.logout') }}" class="nav-link">Выйти</a>
                </li>
            @endauth
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Поиск" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
            <img src="{{ asset(env('THEME')) }}/img/logoAuroraBorealis.png" alt="Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Администратор</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
        @yield('navigation')
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Главная</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>
        <!-- /.content-header -->
        <div class="card-body">
            @php
                /**  @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Ошибка!</h5>
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session()->get('success')}}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @yield('content')
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@yield('footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- Validator -->
<script src="{{ asset(env('THEME')) }}/adminLte/js/validator.js"></script>
<!-- My.js -->
<script src="{{ asset(env('THEME')) }}/adminLte/js/my.js"></script>
<!-- ChartJS -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/moment/moment.min.js"></script>
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="{{ asset(env('THEME')) }}/adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset(env('THEME')) }}/adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset(env('THEME')) }}/adminLte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset(env('THEME')) }}/adminLte/dist/js/demo.js"></script>
<script src="{{ asset(env('THEME')) }}/adminLte/js/ajaxupload.js"></script>
<script>
    if ($('div').is('#single')) {
        var buttonSingle = $("#single"),
            file;
    }
    if (buttonSingle) {
        new AjaxUpload(buttonSingle, {
            action: buttonSingle.data('url') + "?upload=1",
            data: {name: buttonSingle.data('name'), _token: '{{csrf_token()}}'},
            name: buttonSingle.data('name'),
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                    alert('Ошибка! Разрешены только картинки');
                    return false;
                }
                buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'block'});

            },
            onComplete: function (file, response) {
                setTimeout(function () {
                    buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'none'});

                    response = JSON.parse(response);
                    $('.' + buttonSingle.data('name')).html('<img src="{{'/' . env('THEME') . '/img/menu/'}}' + response.file + '" style="max-width:220px;max-height: 150px;">');
                }, 1000);
            }
        })
    }
</script>
<script>
    if ($('div').is('#singleProduct')) {
        var buttonSingle = $("#singleProduct"),
            file;
    }
    if (buttonSingle) {
        new AjaxUpload(buttonSingle, {
            action: buttonSingle.data('url') + "?upload=1",
            data: {name: buttonSingle.data('name'), _token: '{{csrf_token()}}'},
            name: buttonSingle.data('name'),
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                    alert('Ошибка! Разрешены только картинки');
                    return false;
                }
                buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'block'});

            },
            onComplete: function (file, response) {
                setTimeout(function () {
                    buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'none'});

                    response = JSON.parse(response);
                    $('.' + buttonSingle.data('name')).html('<img src="{{'/' . env('THEME') . '/img/dish/'}}' + response.file + '" style="max-width:220px;max-height: 150px;">');
                }, 1000);
            }
        })
    }
</script>
<script>
    if ($('div').is('#singleMenu')) {
        var buttonSingle = $("#singleMenu"),
            file;
    }
    if (buttonSingle) {
        new AjaxUpload(buttonSingle, {
            action: buttonSingle.data('url') + "?upload=1",
            data: {name: buttonSingle.data('name'), _token: '{{csrf_token()}}'},
            name: buttonSingle.data('name'),
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                    alert('Ошибка! Разрешены только картинки');
                    return false;
                }
                buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'block'});

            },
            onComplete: function (file, response) {
                setTimeout(function () {
                    buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'none'});

                    response = JSON.parse(response);
                    $('.' + buttonSingle.data('name')).html('<img src="{{'/' . env('THEME') . '/img/nav-menu/'}}' + response.file + '" style="max-width:220px;max-height: 150px;">');
                }, 1000);
            }
        })
    }
</script>
<script>
    if ($('div').is('#singleSlider')) {
        var buttonSingle = $("#singleSlider"),
            file;
    }
    if (buttonSingle) {
        new AjaxUpload(buttonSingle, {
            action: buttonSingle.data('url') + "?upload=1",
            data: {name: buttonSingle.data('name'), _token: '{{csrf_token()}}'},
            name: buttonSingle.data('name'),
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                    alert('Ошибка! Разрешены только картинки');
                    return false;
                }
                buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'block'});

            },
            onComplete: function (file, response) {
                setTimeout(function () {
                    buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'none'});

                    response = JSON.parse(response);
                    $('.' + buttonSingle.data('name')).html('<img src="{{'/' . env('THEME') . '/img/slider/'}}' + response.file + '" style="max-width:220px;max-height: 150px;">');
                }, 1000);
            }
        })
    }
</script>
<script>
    if ($('div').is('#singleBlog')) {
        var buttonSingle = $("#singleBlog"),
            file;
    }
    if (buttonSingle) {
        new AjaxUpload(buttonSingle, {
            action: buttonSingle.data('url') + "?upload=1",
            data: {name: buttonSingle.data('name'), _token: '{{csrf_token()}}'},
            name: buttonSingle.data('name'),
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                    alert('Ошибка! Разрешены только картинки');
                    return false;
                }
                buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'block'});

            },
            onComplete: function (file, response) {
                setTimeout(function () {
                    buttonSingle.closest('.file-upload').find('#overlay').css({'display': 'none'});

                    response = JSON.parse(response);
                    $('.' + buttonSingle.data('name')).html('<img src="{{'/' . env('THEME') . '/img/blog/'}}' + response.file + '" style="max-width:220px;max-height: 150px;">');
                }, 1000);
            }
        })
    }
</script>
</body>
</html>
