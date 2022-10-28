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
    <div class="py-3">
        <a href="admin/supplier/add"> <button class="btn btn-success">Thêm nhà cung cấp</button></a>
    </div>

    <form action="admin/supplier/search" method="get">
        <?php echo csrf_field(); ?>
        <p>Tìm Kiếm NCC</p>
        <div class="form-outline mb-4">
            <input type="search" name="searchName" class="form-control" id="" placeholder="Tìm Kiếm">
        </div>
    </form>
    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Danh sách NCC</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Tên NCC</th>
                        <th>Địa chỉ</th>
                        <th>Mô Tả</th>
                        <th>Liên lạc</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>
                            <td><?php echo e($key->name); ?></td>
                            <td><?php echo e($key->address); ?></td>
                            <td><?php echo e($key->description); ?></td>
                            <td><?php echo e($key->contact); ?></td>
                            <td><?php echo e($key->updated_at); ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/supplier/edit/<?php echo e($key->id); ?>">
                                    <i class="fa fa-pencil fa-fw"></i>Sửa
                                </a>
                                
                                <input type="button" class="btn btn-danger" value="Xoá"
                                    onclick="return xoa(<?php echo e($key->id); ?>);">
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($suppliers->links('pagination::bootstrap-4')); ?>

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
                    location.href = "admin/supplier/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/supplier/list.blade.php ENDPATH**/ ?>