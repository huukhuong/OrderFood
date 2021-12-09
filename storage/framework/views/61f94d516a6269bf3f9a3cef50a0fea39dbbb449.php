

<?php $__env->startSection('title'); ?>
    <title>Quản lý Danh mục | Thêm mới</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm danh mục món</h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('themthanhcong')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Đã thêm thành công',
                }).then(function() {
                    window.location = "admin/category/list";
                });
            </script>
        <?php endif; ?>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/partners/add" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đối tác</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nhập tên đối tác">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                               placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address"
                               placeholder="Nhập địa chỉ">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\admin\partners\add.blade.php ENDPATH**/ ?>