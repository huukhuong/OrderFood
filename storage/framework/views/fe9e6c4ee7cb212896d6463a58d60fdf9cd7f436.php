<?php $__env->startSection('title'); ?>
    <title>Admin | Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('xoathanhcong')): ?>
        <script >
            Swal.fire(
                'Đã xoá!',
                'Bạn đã xoá thành công',
                'success'
            )
        </script>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách thể loại món ăn</h3>
        </div>
        <a href="admin/category/add"> <button class="btn btn-success">Thêm thể loại</button></a>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th >Mã thể loại</th>
                    <th>Tên thể loại</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key -> id); ?></td>
                    <td><?php echo e($key ->name); ?></td>
                    <td class="text-center"><a href="admin/category/edit/<?php echo e($key->id); ?>"><button class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</button></a></td>

                    <td class="text-center"> <input type="button" class="btn btn-danger" value="Xoá" onclick="return xoa(<?php echo e($key->id); ?>);"></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        function xoa(id){
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
                }
                else{
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/admin/category/list.blade.php ENDPATH**/ ?>