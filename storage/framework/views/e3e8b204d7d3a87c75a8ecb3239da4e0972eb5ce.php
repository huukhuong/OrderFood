<?php $__env->startSection('title'); ?>
    <title>Admin | Danh sách danh mục</title>
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
        <div class="card-header  bg-blue">
            <h3 class="card-title">Danh sách danh mục món ăn</h3>
        </div>
        <div class="text-center py-3">
            <a href="admin/category/add"> <button class="btn btn-success">Thêm danh mục</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Tên danh mục</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>
                            <td><?php echo e($key->name); ?></td>
                            
                            
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/category/edit/<?php echo e($key->id); ?>">
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
                    location.href = "admin/category/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/category/list.blade.php ENDPATH**/ ?>