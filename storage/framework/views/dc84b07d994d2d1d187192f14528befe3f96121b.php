<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo $__env->yieldContent('title'); ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <base href="<?php echo e(asset('')); ?>">
    <link rel="stylesheet" href="admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php echo $__env->make('admin.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.components.menuleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content py-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <?php echo $__env->yieldContent('content'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- jQuery -->
    <script src="admin_lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_lte/dist/js/adminlte.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\admin\main.blade.php ENDPATH**/ ?>