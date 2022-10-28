

<?php $__env->startSection('title'); ?>
    <title>Đăng nhập</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-page">
        <div class="login-form">
            <div class="logo">
                <a href="/">
                    <img src="client/images/logo.svg" alt="">
                </a>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="m-0 p-0"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form action="login" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope"></i></label>
                    <input type="email" id="login-email" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="login-password" placeholder="Mật khẩu" name="password">
                </div>
                <div class="login-option">
                    <div class="remember">
                        <input type="checkbox" id="remember-password" name="remember">
                        <label for="remember-password">Ghi nhớ đăng nhập</label>
                    </div>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <button class="btn-login">Đăng nhập</button>
            </form>
            <span>Bạn chưa có tài khoản? <a href="register">Đăng ký</a></span>
            <div class="coppyright">
                <p>© 2021 Fast Food</p>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\CodeNam4\OrderFood\resources\views/client/login.blade.php ENDPATH**/ ?>