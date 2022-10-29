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

        <form action="admin/user/edit" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" name="userId" value="<?php echo e($user->id); ?>">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" id="" name="userName"
                        placeholder=""   value="<?php echo e($user->name); ?> ">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" class="form-control" id="" name="userEmail"
                           placeholder=""  value="<?php echo e($user->email); ?>">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name="userPhone"
                           placeholder="" value="<?php echo e($user->phone); ?>">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="userAddress"
                           placeholder="" value="<?php echo e($user->address); ?>">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control" name="userStatus">
                        <option value="0" <?php if($user -> status == 0): ?> selected <?php endif; ?>>Đang tạm khoá</option>
                        <option value="1" <?php if($user -> status == 1): ?> selected <?php endif; ?>>Đang hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                    <select class="form-control" name="userRole">
                        <option value="0" <?php if($user -> role == 0): ?> selected <?php endif; ?>>Người dùng</option>
                        <option value="1" <?php if($user -> status == 1): ?> selected <?php endif; ?>>Admin</option>
                        <option value="2" <?php if($user -> status == 2): ?> selected <?php endif; ?>>Quản lý bán hàng</option>
                        <option value="3" <?php if($user -> status == 3): ?> selected <?php endif; ?>>Quản lý kho</option>
                    </select>
                </div>
                <a href="javascript:history.back()" class="btn btn-primary">Quay lại</a>
                <button type="submit" class="btn btn-success">Lưu</button>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>