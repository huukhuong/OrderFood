<?php $__env->startSection('title'); ?>
    <title>Admin | Danh sách đơn nhập hàng</title>
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
            <a href="admin/import/add">
                <button class="btn btn-success">Thêm</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p>Tìm kiếm</p>
            <form class="form-inline" action="admin/import/search" method="get">
                <div class="form-outline p-sm-1">
                    <input type="search" name="searchId" class="form-control" id="" placeholder="Nhập mã đơn hàng">
                </div>
                <div class="input-group date" data-provide="datepicker" style="max-width: 500px">
                    <input type="date" class="form-control" name="startDay">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input type="date" class="form-control" name="endDay">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Danh sách đơn nhập hàng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>
                    <th>Tên nhân viên nhập</th>
                    <th>NCC</th>
                    <th>Ghi chú</th>
                    <th>Tổng tiền</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $imports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key->id); ?></td>
                        <td><?php echo e($key->user_linked->name); ?></td>
                        <td><?php echo e($key->supplier_linked->name); ?></td>
                        <td><?php echo e($key->description); ?></td>
                        <td><?php echo e(number_format($key->total ,0)); ?> VNĐ</td>
                        <td><?php echo e($key->created_at); ?></td>
                         <?php if($key->status == 0): ?>
                            <td>
                                <span class="badge badge-danger">Đã huỷ nhập</span>
                            </td>
                        <?php elseif($key -> status == 1): ?>
                            <td>
                                <span class="badge badge-warning">Đã nhập</span>
                            </td>
                        <?php endif; ?>
                        <td class="text-left">
                            <a class="btn btn-primary " href="admin/import/details/<?php echo e($key->id); ?>">
                                Xem chi tiết
                            </a>
                            <a class="btn btn-warning " href="admin/import/edit/<?php echo e($key->id); ?>">
                                Cập nhật
                            </a>
                            <a class="btn btn-dark " href="admin/import/print/<?php echo e($key->id); ?>">
                                PDF
                            </a>
                            
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center">
            <?php echo e($imports->links('pagination::bootstrap-4')); ?>

        </div>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/import/list.blade.php ENDPATH**/ ?>