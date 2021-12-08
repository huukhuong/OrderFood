<?php $__env->startSection('title'); ?>
<title>Đăng ký tài khoản</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="register-page mt-5">
        <div class="register-form">
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
            <form action="register" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name"><i class="fas fa-edit"></i></label>
                    <input type="text" id="name" placeholder="Tên" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i></label>
                    <input type="text" id="phone" placeholder="Số điện thoại" name="phone" value="<?php echo e(old('phone')); ?>">
                </div>
                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope"></i></label>
                    <input type="email" id="email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>">
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="login-password" placeholder="Mật khẩu" name="password" value="<?php echo e(old('password')); ?>">
                </div>
                <div class="form-group">
                    <label for="confirm-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="confirm-password" placeholder="Nhập lại mật khẩu" name="re_password" value="<?php echo e(old('re_password')); ?>">
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-lock"></i></label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ" name="address" value="<?php echo e(old('address')); ?>">
                </div>
                <button class="btn-login">Đăng ký ngay</button>
            </form>
            <span>Bạn đã có tài khoản? <a href="login">Đăng nhập</a></span>
            <div class="coppyright">
                <p>© 2021 Fast Food</p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/register.blade.php ENDPATH**/ ?>