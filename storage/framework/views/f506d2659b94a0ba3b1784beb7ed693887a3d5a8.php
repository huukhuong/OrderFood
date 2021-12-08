<?php $__env->startSection('title'); ?>
    <title>Admin | Danh sách món</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('xoathanhcong')): ?>
        <script>
            Swal.fire(
                'Đã xoá!',
                'Bạn đã xoá thành công',
                'success'
            )
        </script>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách đơn hàng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Mã Khách hàng</th>
                        <th>Tên Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>
                            <td><?php echo e($key->user_id); ?></td>

                            <td><?php echo e($key->user_linked->name); ?></td>
                            <td><?php echo e(number_format($key->total,0)); ?></td>
                            <?php if($key -> status == -1): ?>
                                <td>
                                    <span class="badge badge-danger">Đã huỷ đơn</span>
                                </td>
                            <?php elseif($key -> status == 0): ?>
                                <td>
                                    <span class="badge badge-warning">Đang chuẩn bị</span>
                                </td>
                            <?php elseif($key -> status == 1): ?>
                                <td>
                                    <span class="badge badge-info">Đang giao hàng</span>
                                </td>
                            <?php elseif($key -> status == 2): ?>
                                <td>
                                    <span class="badge badge-success">Đã giao hàng</span>
                                </td>
                            <?php endif; ?>
                            <td><?php echo e($key->address); ?></td>
                            <td><?php echo e($key->phone); ?></td>
                            <td><?php echo e($key->description); ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="admin/order/details/<?php echo e($key->id); ?>">
                                    Xem chi tiết
                                </a>
                                <a class="btn btn-warning" href="admin/order/edit/<?php echo e($key->id); ?>">
                                    Cập nhật
                                </a>
                                <?php if($key -> status == 0): ?>
                                    <a class="btn btn-secondary" href="admin/order/edit/<?php echo e($key->id); ?>">
                                        Phân Công
                                    </a>
                               <?php endif; ?>

                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>

        </div>
        <!-- /.card-body -->

    </div>
    <div class="d-flex justify-content-center">

    </div>

    <script>
        function xoa(id) {
            Swal.fire({
                title: 'Bạn có chắc xoá không',
                text: "Bạn sẽ không thể trở lại",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xoá',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/product/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/admin/order/list.blade.php ENDPATH**/ ?>