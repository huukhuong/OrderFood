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
    <?php if(session('capnhatgiaohang')): ?>
        <script>
            Swal.fire(
                'Đã phân công~',
                'Bạn phân công thành công',
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
                        <th>Tên Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Mô tả</th>
                        <th>Ngày đặt</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>

                            <td><?php echo e($key->user_linked->name); ?></td>
                            <td><?php echo e(number_format($key->total, 0)); ?></td>
                            <?php if($key->status == -1): ?>
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
                            <td><?php echo e($key->created_at); ?></td>
                            <td class="text-left">
                                <a class="btn btn-primary " href="admin/order/details/<?php echo e($key->id); ?>">
                                    Xem chi tiết
                                </a>
                                <a class="btn btn-warning " href="admin/order/edit/<?php echo e($key->id); ?>">
                                    Cập nhật
                                </a>
                                <?php if($key->status == 0): ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#order<?php echo e($key->id); ?>">
                                        Phân công
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="order<?php echo e($key->id); ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="admin/order/savepartner" class=""
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <select class="form-control" name="idpartner">
                                                            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($key2->id); ?>"><?php echo e($key2->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <input type="hidden" value="<?php echo e($key->id); ?>" name="idorder">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
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