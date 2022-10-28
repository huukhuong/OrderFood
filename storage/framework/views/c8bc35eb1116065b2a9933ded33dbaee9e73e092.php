<?php $__env->startSection('title'); ?>
    <title>Quản lý Chi tiết hoá đdơn | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Chi tiết hoá đdơn </h3>
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
            <form action="admin/orderdetails/edit" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã chi tiết</label>
                        <input type="text" class="form-control" name="id" value="<?php echo e($orderDetails->order_id); ?>" disabled>

                    </div>
                    <div class="form-group">
                        <label>Danh sách sản phẩm</label>
                        <select class="form-control" name="supplierID">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  <?php if($orderDetails->product_id == $key->id): ?> selected <?php endif; ?> value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" name="id" value="<?php echo e($orderDetails->amount); ?>" >

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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/orderdetails/edit.blade.php ENDPATH**/ ?>