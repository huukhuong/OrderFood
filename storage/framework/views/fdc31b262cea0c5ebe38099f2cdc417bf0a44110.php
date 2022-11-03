<?php $__env->startSection('title'); ?>
    <title>Quản lý Món | Thêm mới</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Thêm món ăn</h3>
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
                    text: 'Thêm sản phẩm thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        <?php endif; ?>
        <!-- form start -->
        <form action="admin/product/add" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="productName">Tên món ăn</label>
                    <input type="text" class="form-control" id="productName" name="productName"
                        placeholder="Nhập tên món ăn">
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá bán</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice"
                        placeholder="Nhập giá tiền">
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá nhập</label>
                    <input type="number" class="form-control" id="productPrice" name="productPriceImport"
                           placeholder="Nhập giá tiền">
                </div>
                <div class="form-group">
                    <label for="productQuantity">Số lượng</label>
                    <input type="number" class="form-control" id="productQuantity" name="productQuantity"
                        placeholder="Nhập số lượng">
                </div>
                <div class="form-group">
                    <label>Danh sách thể loại</label>
                    <select class="form-control" name="productCategoryID">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Danh sách NCC</label>
                    <select class="form-control" name="supplierID">
                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="productDescription" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <label for="">Chọn ảnh</label>
                <div class="custom-file">
                    <input type="file" name="productImage" id="imgInp" class="custom-file-input" id="productImage">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <img src="" style="max-width: 200px" id="blah">
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/products/add.blade.php ENDPATH**/ ?>