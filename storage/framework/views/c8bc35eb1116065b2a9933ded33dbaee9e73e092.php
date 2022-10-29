<?php $__env->startSection('title'); ?>
    <title>Quản lý Chi tiết hoá đdơn | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Chi tiết hoá đdơn </h3>
        </div>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="card bg-success">
                <p>
                    <?php echo Session::get('success'); ?>

                </p>
            </div>
        <?php endif; ?>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if(session('fail')): ?>
                <div class="card bg-danger">
                    <p>
                        <?php echo Session::get('fail'); ?>

                    </p>
                </div>
            <?php endif; ?>
            <form action="admin/orderdetails/edit" method="post" id="myform" >
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã đơn hàng</label>
                        <input type="text" class="form-control" name="idOrder" value="<?php echo e($orderDetails->order_id); ?>" readonly>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã chi tiết</label>
                        <input type="text" class="form-control" name="idOrderDetails" value="<?php echo e($orderDetails->id); ?>" readonly>

                    </div>
                    <input type="hidden" name="application_url" id="application_url" value="<?php echo e(url('')); ?>"/>
                    <div class="form-group">
                        <label>Danh sách sản phẩm</label>
                        <select class="form-control" name="productID">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  <?php if($orderDetails->product_id == $key->id): ?> selected <?php endif; ?> value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="<?php echo e($orderDetails->amount); ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá</label>
                        <input type="number" name="productPrice" id="productPrice" class="form-control"  value="<?php echo e($orderDetails->price); ?>" readonly >

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <script type="text/javascript">
        $('#myform').on('change', 'select', function (e) { //we watch and execute the next lines when any value from the dropdown#1 is selected
            var id = $(this).val(); //we get the selected value on dropdown#1 and store it on id variable
            var url = $('#application_url').val(); //we get the url from our hidden element that we used in first line of our view file, and store it on url variable
            //here comes the ajax function part
            console.log(id);
            console.log(url);
            console.log(url + "/admin/product/getDetails/" + id)
            $.ajax({
                url: url + "/admin/product/getDetails/" + id, //we use the same url we used in our route file and we are adding the id variable which have the selected value in dropdown#1
                dataType: "json", //we specify that we are going to use json type of data. That's where we sent our query result (from our controller)
                success: function (data) { //*on my understanding using json datatype means that the variable "data" gets the value and that's why we use it to tell what to do since here.*
                    //and this final part is where we use the dropdown#1 value and we set the values for the dropdown#2 just adding the variables that we got from our query (in controllert) through "data" variable.
                    console.log(data)
                    $('#productPrice').empty();
                    $('#productPrice').val(data.price);
                    $('#amount').val("");
                    $('#amount').attr("placeholder", "Số lượng còn lại " + data.quantity);;
                }
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/orderdetails/edit.blade.php ENDPATH**/ ?>