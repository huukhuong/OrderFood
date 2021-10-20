<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.components.header')
        @include('admin.components.menuleft')

        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content py-5">
                <div class="container-fluid">

                    @yield('content')
                    
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
