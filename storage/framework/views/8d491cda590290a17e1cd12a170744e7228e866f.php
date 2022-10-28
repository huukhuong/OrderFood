

<?php $__env->startSection('title'); ?>
    <title>Quản lý Danh mục | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sửa danh mục</h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('suathanhcong')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Đã sửa thành công',
                }).then(function() {
                    window.location = "admin/category/list";
                });
            </script>
        <?php endif; ?>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/category/edit" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Danh mục</label>
                        <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                        <input type="text" class="form-control" name="namecategory" id="namecategory"
                            placeholder="Nhập tên Danh mục" value="<?php echo e($category->name); ?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\CodeNam4\OrderFood\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>