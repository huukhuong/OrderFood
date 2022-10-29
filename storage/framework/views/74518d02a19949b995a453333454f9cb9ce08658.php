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

        <form action="admin/user/add" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="hidden" name="id" value="">
                    <label for="userName">Tên người dùng</label>
                    <input type="text" class="form-control" id="userName" name="userName"
                           placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Địa chỉ email</label>
                    <input type="email" class="form-control" id="userEmail" name="userEmail"
                           placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="UserPhone">Số điện thoại</label>
                    <input type="number" class="form-control" id="UserPhone" name="userPhone"
                           placeholder="" value="" required >
                </div>
                <div class="form-group">
                    <label for="userAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="userAddress" name="userAddress"
                           placeholder="" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control" name="userStatus">
                        <option value="0">Đang tạm khoá</option>
                        <option value="1" selected>Đang hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                    <select class="form-control" name="userRole">
                        <option value="0" selected >Người dùng</option>
                        <option value="1">Admin</option>
                        <option value="2">Quản lý bán hàng</option>
                        <option value="3">Quản lý kho</option>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/user/add.blade.php ENDPATH**/ ?>