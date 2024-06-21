<?php $__env->startSection('title'); ?>
    <title>Quản lý Món | Thêm mới</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Thêm NCC</h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('chuacofile')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Chưa thêm file',
                })
            </script>
        <?php endif; ?>
        <?php if(session('themthanhcong')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Thêm sản NCC thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        <?php endif; ?>
        <!-- form start -->
        <form action="admin/supplier/add" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="productName">Tên NCC</label>
                    <input type="text" class="form-control" id="productName" name="supplierName"
                           placeholder="Nhập tên NCC" value="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="supplierAddress" rows="3" placeholder="Địa chỉ"
                           value="">
                </div>
                <div class="form-group">
                    <label>Liên lạc</label>
                    <input type="text" class="form-control" name="supplierContact" rows="3" placeholder="Số điện thoại hoặc email"
                           value="">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="supplierDescription" rows="3" placeholder="Mô tả"
                              value=""></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
        <!-- /.card-body -->
    </div>

    <script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/supplier/add.blade.php ENDPATH**/ ?>