<?php $__env->startSection('title'); ?>
    <title>Admin | Danh sách đối tác</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('themthanhcong')): ?>
        <script>
            Swal.fire(
                'Đã thêm!',
                'Bạn đã thêm đối tác thành công',
                'success'
            )
        </script>
    <?php endif; ?>
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
            <h3 class="card-title">Danh sách đối tác</h3>
        </div>
        <div class="text-center py-3">
            <a href="admin/partners/add"> <button class="btn btn-success">Thêm đối tác</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th class="text-center">Tên đối tác</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>
                            <td class="text-center"><?php echo e($key->name); ?></td>
                            <td class="text-center"><?php echo e($key->email); ?></td>
                            <td class="text-center"><?php echo e($key->phone); ?></td>
                            <td class="text-center"><?php echo e($key->address); ?></td>
                            
                            
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/partners/edit/<?php echo e($key->id); ?>">
                                    <i class="fa fa-pencil fa-fw"></i>Sửa
                                </a>
                                <input type="button" class="btn btn-danger" value="Xoá"
                                    onclick="return">
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($partners->links('pagination::bootstrap-4')); ?>

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
                    location.href = "admin/partners/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/partners/list.blade.php ENDPATH**/ ?>