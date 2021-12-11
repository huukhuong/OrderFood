

<?php $__env->startSection('title'); ?>
    <title>Admin | Danh sách người dùng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('khoathanhcong')): ?>
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã khoá thành công',
                'success'
            )
        </script>
    <?php endif; ?>
    <?php if(session('mokhoathanhcong')): ?>
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã mở khoá thành công',
                'success'
            )
        </script>
    <?php endif; ?>
    <?php if(session('resetthanhcong')): ?>
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã khôi phục mật khẩu',
                'success'
            )
        </script>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách người dùng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Quyền</th>
                        <th class="text-center">Trạng Thái</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key->id); ?></td>
                            <td><?php echo e($key->email); ?></td>
                            <?php if($key -> role == 1 ): ?>
                               <td>Admin</td>

                            <?php else: ?>
                            <td>Người dùng</td>

                            <?php endif; ?>
                            <?php if($key-> status == 1 ): ?>
                            <td>Active</td>
                            <?php else: ?>
                            <td>Blocked</td>
                            <?php endif; ?>
                            
                            <td class="text-center">
                                <a class="btn btn-success" href="admin/user/edit/<?php echo e($key->id); ?>">
                                    Xem
                                </a>
                                
                                <?php if( $key -> status == 1 ): ?>
                                   <input type="button" class="btn btn-danger" value="Khoá"
                                       onclick="return khoa(<?php echo e($key->id); ?>);">
                                <?php else: ?>
                                    <input type="button" class="btn btn-danger" value="Mở Khoá"
                                           onclick="return khoa(<?php echo e($key->id); ?>);">
                                <?php endif; ?>
                                <input type="button" class="btn btn-primary" value="Khôi phục mật khẩu"
                                       onclick="return resetpasswd(<?php echo e($key->id); ?>);">
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
        function khoa(id) {
            Swal.fire({
                title: 'Bạn có chắc khoá tài khoản này không?',
                text: "Sau khi khoá, để mở khoá bạn nhấn vào mở khoá !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/user/block/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
        function resetpasswd(id) {
            Swal.fire({
                title: 'Bạn có chắc khôi phục lại mật khẩu không?',
                text: "Mật khẩu sau khi khôi phục là 123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/user/resetpasswd/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/admin/user/list.blade.php ENDPATH**/ ?>