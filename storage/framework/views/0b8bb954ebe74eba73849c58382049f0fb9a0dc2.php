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
        <a href="admin/product/add">
            <button class="btn btn-success">Thêm món mới</button>
        </a>
    </div>

    <form action="admin/product/search" method="get">
        <?php echo csrf_field(); ?>
        <p>Tìm Kiếm món ăn</p>
        <div class="form-outline mb-4">
            <input type="search" name="searchName" class="form-control" id="" placeholder="Tìm Kiếm">
        </div>
    </form>
    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Danh sách món ăn</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>
                    <th>Tên SP</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>NCC</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key->id); ?></td>
                        <td><?php echo e($key->name); ?></td>
                        <td><?php echo e($key->price); ?></td>
                        <td><?php echo e($key->quantity); ?></td>
                        <td><?php echo e($key->category_linked->name); ?></td>
                        <td style="max-width:150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo e($key->supplier_linked->name); ?></td>
                        <td><img src="./img/products/<?php echo e($key->image); ?>" width="120"></td>
                        
                        <td class="text-truncate" style="max-width: 200px;"><?php echo $key->description; ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="admin/product/edit/<?php echo e($key->id); ?>">
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
        <?php echo e($product->links('pagination::bootstrap-4')); ?>

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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/products/list.blade.php ENDPATH**/ ?>