<?php $__env->startSection('title'); ?>
    <title>Quản lý đơn hàng | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sửa thông đơn hàng</h3>
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
        <?php if(session('capnhatdonhangthanhcong')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Cập nhật trạng thái thành công',
                }).then(function() {

                });
            </script>
        <?php endif; ?>

        <form action="admin/order/edit" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Mã </label>
                     <input type="hidden" class="form-control" id="id" name="idOrder"
                             placeholder=""  value="<?php echo e($order->id); ?>">
                    <input type="text" class="form-control" id="" name=""
                           placeholder="" disabled value="<?php echo e($order->id); ?>">
                </div>
                <div class="form-group">
                    <label for="order">Tên khách hàng</label>
                    <input type="text" class="form-control" id="order" name="order"
                        placeholder="" disabled value="<?php echo e($order->user_linked->name); ?>">
                </div>
                <div class="form-group">

                    <label for="order">Địa chỉ</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder=""  disabled value="<?php echo e($order->address); ?>">
                </div>
                <div class="form-group">
                    <label for="order">Số điện thoại</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="<?php echo e($order->phone); ?>">
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="<?php echo e($order->created_at); ?>">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="order"
                              placeholder="" disabled ><?php echo e($order->description); ?> </textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="status">
                        <option selected value="0">Đang chuẩn bị</option>
                        <option value="1">Đang giao hàng</option>
                        <option value="2">Đã giao hàng</option>
                        <option value="-1">Huỷ đơn hàng</option>
                    </select>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>