

<?php $__env->startSection('title'); ?>
    <title>Quản lý Món | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Xem thông tin user</h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form action="admin/user/edit" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" id="" name=""
                        placeholder="Nhập tên món ăn" disabled  value="<?php echo e($user->name); ?> ">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder="" disabled value="<?php echo e($user->email); ?>">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder=""disabled value="<?php echo e($user->phone); ?>">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder=""disabled value="<?php echo e($user->address); ?>">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <?php if($user -> status == 1): ?>
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Đang hoạt động">
                    <?php else: ?>
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Đang bi khoá ">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                    <?php if($user -> role == 1): ?>
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Admin">
                    <?php else: ?>
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Người dùng">
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.card-body -->
        </form>

    </div>

    <script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\admin\user\edit.blade.php ENDPATH**/ ?>