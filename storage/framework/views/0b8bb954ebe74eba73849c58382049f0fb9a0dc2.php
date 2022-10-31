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
        <div class="card-header bg-cyan">
            Thông báo
        </div>
        <div class="card-body bg-gray">
            <?php if(!is_null($SanPhamHetHang)): ?>
                Sản phẩm sắp hết hàng :
                <?php $__currentLoopData = $SanPhamHetHang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($key -> name); ?>  ==> <a href="admin/import/add" class="text-cyan">Nhập hàng ngay</a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="admin/product/add">
                <button class="btn btn-success">Thêm món mới</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p>Tìm kiếm sản phẩm</p>
        </div>
        <div class="card-body">
            <form class="form-inline" action="admin/product/search" method="get">
                <?php echo csrf_field(); ?>
                <div class="form-outline p-sm-1">
                    <input type="search" name="searchName" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-outline p-1">
                    <select class="form-control" name="category">
                        <optgroup label="Chọn danh mục">
                            <option value="" selected="selected" style="display:none">Danh mục</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key->id); ?>"><?php echo e($key -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-outline p-1">
                    <select class="form-control" name="supplier">
                        <optgroup label="Chọn nhà sản xuất">
                            <option value="" selected="selected" style="display:none">Nhà cung cấp</option>
                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key->id); ?>"><?php echo e($key -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Danh sách sản phẩm</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="dtBasicExample" class="table table-bordered table-striped table-hover text-center ">
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên SP</th>
                    <th> Đơn giá</th>
                    <th> Giá nhập</th>
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
                        <td><?php echo e(number_format($key->price)); ?></td>
                        <td><?php echo e(number_format($key->price_import)); ?></td>
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