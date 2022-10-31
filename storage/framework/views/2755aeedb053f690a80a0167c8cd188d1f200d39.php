<?php $__env->startSection('title'); ?>
    <title>Quản lý đơn hàng | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Thêm Phiếu Nhập</h3>
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

        <form action="admin/import/add" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <div class="form-group" readonly>
                    <label for="order">Tên nhân viên</label>
                    <select class="form-control" name="userId">
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
                <div class="form-group" readonly>
                    <label for="order">Tên NCC</label>
                    <select class="form-control" name="supplierID" id="supplierID" onchange="test()">
                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="importCreated" placeholder=""
                           value="<?php echo date('Y-m-d H:i:s') ?>">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="importDescription" placeholder=""
                    >Không</textarea>
                </div>
                    <div class="form-group">
                        <label for="order">Tổng tiền</label>
                        <input type="number" class="form-control" id="order" name="importTotal" placeholder=""
                               value="0">
                    </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="importStatus">
                        <option value="0">Huỷ nhập hàng</option>
                        <option value="1" selected>Nhập hàng thành công</option>
                    </select>
                </div>
                <div class="card bg-white form-inline p-2">
                    <div class="row mycopy w-100 pb-3" id="mycopy">
                        <div class="col-6 form-group">
                            <label>Sản phẩm</label>
                            <select id="productSelect" class="form-control sectorSelect m-2" name="productID[]">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <label for="order">Số lượng</label>
                            <input type="number" class="form-control m-2" id="order" name="quantity[]" placeholder=""
                                   value="0"  required>
                        </div>
                        <div class="col-2 form-group">
                            <button class="btn btn-danger" onclick="remove('#mycopy')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addChild()">Thêm sản phẩm</button>
                </div>
                <div class="form-group">
                    <label for="order">Tổng tiền đơn hàng</label>
                    <input type="number" class="form-control" id="order" name="orderCreated" placeholder="" readonly
                           required
                           value="0 ">
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
        var idClone = 1 ;
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        function remove(el) {
            var element = el;
            element.remove();
        }
        function addChild() {
            var elem = document.querySelector('#mycopy');
            var clone = elem.cloneNode(true);
            clone.id = "mycopy"+idClone;
            elem.after(clone);
        }
        function test() {
            supplierID = document.getElementById("supplierID").value;
            console.log("Supplier id" + supplierID)
            $.ajax({
                url:  "http://127.0.0.1:8000/admin/product/getProductBySupplier/" + supplierID, //we use the same url we used in our route file and we are adding the id variable which have the selected value in dropdown#1
                dataType: "json", //we specify that we are going to use json type of data. That's where we sent our query result (from our controller)
                success: function (data) { //*on my understanding using json datatype means that the variable "data" gets the value and that's why we use it to tell what to do since here.*
                    //and this final part is where we use the dropdown#1 value and we set the values for the dropdown#2 just adding the variables that we got from our query (in controllert) through "data" variable.
                    console.log(data)
                    $("#productSelect").empty();
                    for(var i = 0; i < data.length ; i++){
                        console.log(data[i].name)
                        var x = document.getElementById("productSelect");
                        var option = document.createElement("option");
                        option.text = data[i].name;
                        x.add(option);
                    }
                }
            });
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/import/add.blade.php ENDPATH**/ ?>