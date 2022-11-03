<?php $__env->startSection('title'); ?>
    <title>Quản lý nhập hàng | Sửa thông tin</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Phiếu Nhập</h3>
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

        <form action="admin/import/edit" method="post">
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($import->id); ?>" name="importID">
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
                    <div class="row pt-2">
                        <div class="col-6">
                            <div class="form-group d" readonly>
                                <label for="order">Tên NCC</label>
                                <select class="form-control" name="supplierID">
                                    <option value="<?php echo e($import->supplier_linked->id); ?>"
                                            selected> <?php echo e($import->supplier_linked->name); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" style="padding-top: 32px">

                            <div class="form-group d" readonly>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Thông tin NCC
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông tin NCC</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="order">Tên NCC</label>
                                                    <input type="text" class="form-control" id="" name="" placeholder="" disabled
                                                           value="<?php echo e($import->supplier_linked->name); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="order">Địa chỉ</label>
                                                    <input type="text" class="form-control" id="" name="" placeholder="" disabled
                                                           value="<?php echo e($import->supplier_linked->address); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="order">Mô tả</label>
                                                    <input type="text" class="form-control" id="" name="" placeholder="" disabled
                                                           value="<?php echo e($import->supplier_linked->description); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="order">Liên hệ</label>
                                                    <input type="text" class="form-control" id="" name="" placeholder="" disabled
                                                           value="<?php echo e($import->supplier_linked->contact); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="order">Thời gian tạo đơn</label>
                        <input type="text" class="form-control" id="order" name="importCreated" placeholder=""
                               value="<?php echo e($import -> created_at); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="order">Mô tả</label>
                        <textarea class="form-control" id="order" name="importDescription" placeholder=""
                        ><?php echo e($import -> description); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái đơn hàng</label>
                        <select class="form-control" name="importStatus">
                            <option value="0">Huỷ nhập hàng</option>
                            <option value="1" selected>Nhập hàng thành công</option>
                        </select>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <label for="order">Tổng tiền đơn hàng</label>
                        <input type="number" class="form-control" id="order" name="importTotal" placeholder="" readonly
                               required
                               value="<?php echo e($import -> total); ?>">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

    </div>
    
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    <?php if($import->status != 1 && $import->status != 0): ?> disabled <?php endif; ?> data-target="#exampleModalCenter">
                Thêm chi tiết đơn hàng
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="admin/importdetails/add" method="post" id="myform">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã hoá đơn</label>
                                    <input type="text" class="form-control" name="idImport" readonly
                                           value="<?php echo e($import->id); ?>">

                                </div>
                                <input type="hidden" name="application_url" id="application_url"
                                       value="<?php echo e(url('')); ?>"/>
                                <div class="form-group">
                                    <label>Danh sách sản phẩm</label>
                                    <select id="sectorSelect" class="form-control sectorSelect" name="productID">
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->id); ?>"> <?php echo e($key->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" class="form-control" name="amount" value="">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" name="productPrice" id="productPrice" class="form-control"
                                           value="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
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
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-gray"> Thông tin chi tiết phiếu nhập hàng</div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>

                    <th class="text-center">Tên Sản phẩm</th>
                    <th class="text-center" style="width: 100px">Số lượng</th>
                    <th class="text-center">Giá Nhập</th>
                    <th class="text-center">Tổng tiền</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $importdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key->import_id); ?></td>
                        <td><?php echo e($key->products_linked->name); ?></td>
                        <td><?php echo e($key->amount); ?></td>
                        <td><?php echo e(number_format($key->products_linked->price_import, 0)); ?></td>
                        <td><?php echo e(number_format($key->products_linked->price_import * $key->amount, 0)); ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning"
                               href="admin/importdetails/edit/importID=<?php echo e($key->import_id); ?>&productID=<?php echo e($key->product_id); ?>">
                                <i class="fa fa-pencil fa-fw"></i>Sửa
                            </a>
                            <a class="btn btn-danger"
                               href="admin/importdetails/delete/importID=<?php echo e($key->import_id); ?>&productID=<?php echo e($key->product_id); ?>">
                                <i class="fa fa-trash fa-fw"></i>Xoá
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="6" class="text-right">Tổng tiền : <?php echo e(number_format($import->total ,0)); ?> </td>
                </tr>
                </tbody>
            </table>
            <a href="javascript:history.back()" class="btn btn-default mt-2">Quay lại</a>
        </div>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/import/edit.blade.php ENDPATH**/ ?>