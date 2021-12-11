<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="apple-touch-icon" sizes="57x57" href="admin_lte/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="admin_lte/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="admin_lte/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="admin_lte/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="admin_lte/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="admin_lte/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="admin_lte/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="admin_lte/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="admin_lte/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="admin_lte/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="admin_lte/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="admin_lte/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin_lte/favicon/favicon-16x16.png">
    <link rel="manifest" href="admin_lte/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="admin_lte/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.components.header')
        @include('admin.components.menuleft')

        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content py-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.components.footer')
    </div>

    <!-- jQuery -->
    <script src="admin_lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_lte/dist/js/adminlte.min.js"></script>
</body>

</html>
