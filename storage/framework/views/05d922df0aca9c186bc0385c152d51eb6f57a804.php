<?php $__env->startSection('title'); ?>
    <title>Quản lý đơn hàng | thêm thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Thêm thông đơn hàng</h3>
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
                }).then(function () {

                });
            </script>
        <?php endif; ?>

        <form action="admin/order/add" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="order">Tên khách hàng</label>
                    <select class="form-control" name="userId">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">

                    <label for="order">Địa chỉ</label>
                    <input type="text" class="form-control" id="order" name="orderAddress" placeholder=""
                           value="" required>
                </div>
                <div class="form-group">
                    <label for="order">Số điện thoại</label>
                    <input type="number" class="form-control" id="order" name="orderPhone" placeholder=""
                           value="" required>
                </div>
                <div class="form-group">
                    <label>Danh sách partners</label>
                    <select class="form-control" name="partnerId">
                        <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="orderCreated" placeholder=""
                           value="<?php echo date('Y-m-d H:i:s') ?>">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="orderDescription" placeholder=""
                    >Không</textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="orderStatus">
                        <option value="-1">Đơn hàng bị huỷ</option>
                        <option value="0">Đang đợi quán xác nhận</option>
                        <option value="1" selected>Đang chuẩn bị</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Đã nhận được hàng</option>
                    </select>
                </div>
                <div class="card bg- form-inline p-2">
                    <div class="row mycopy w-100 pb-3" id="mycopy">
                        <div class="col-5 form-group">
                            <label>Sản phẩm</label>
                            <select id="sectorSelect" class="form-control sectorSelect" name="productID[]">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label for="order">Số lượng</label>
                            <input type="number" class="form-control" id="order" name="quantity[]" placeholder=""
                                   value="" >
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addChild()">Thêm sản phẩm</button>
                </div>
                <div class="form-group">
                    <label for="order">Tổng đơn hàng</label>
                    <input type="number" class="form-control" id="order" name="orderCreated" placeholder="" readonly
                           required
                           value="">
                </div>
                <div class="form-group" readonly>
                    <label for="order">Tên nhân viên</label>
                    <select class="form-control" name="partnerId">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Auth::user()->role != 1 && $key->id == Auth::user()->id ): ?>
                                <option value="<?php echo e($key->id); ?>"
                                        <?php if(Auth::user()->id == $key ->id): ?> selected <?php endif; ?>> <?php echo e($key->name); ?> </option>
                            <?php endif; ?>
                            <?php if(Auth::user()->role == 1): ?>
                                <option value="<?php echo e($key->id); ?>"
                                        <?php if(Auth::user()->id == $key ->id): ?> selected <?php endif; ?>> <?php echo e($key->name); ?> </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
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

        function addChild() {
            var elem = document.querySelector('#mycopy');
            var clone = elem.cloneNode(true);
            elem.after(clone);
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/order/add.blade.php ENDPATH**/ ?>