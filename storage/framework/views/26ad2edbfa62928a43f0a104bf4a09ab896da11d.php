

<?php $__env->startSection('title'); ?>
    <title>Quản Đơn Hàng | Xem thông tin chi tiết đơn hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Xem thông tin chi tiết đơn hàng</h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('chuacofile')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Chưa thêm file',

                })
            </script>
        <?php endif; ?>
        <?php if(session('suathanhcong')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Sửa sản phẩm thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        <?php endif; ?>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>

                    <th class="text-center">Tên Sản phẩm</th>
                    <th class="text-center" style="width: 100px">Số lượng</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key-> order_id); ?></td>
                        <td><?php echo e($key->products_linked->name); ?></td>
                        <td><?php echo e($key->amount); ?></td>
                        <td><?php echo e(number_format($key-> price,0)); ?></td>
                        <td><?php echo e(number_format($key->price * $key -> amount ,0)); ?></td>
                        
                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="5" class="text-right">Tổng tiền : <?php echo e($order -> total); ?>  </td>


                </tr>



                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\admin\order\orderdetails.blade.php ENDPATH**/ ?>