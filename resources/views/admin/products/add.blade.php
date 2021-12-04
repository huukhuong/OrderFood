@extends('admin.main')

@section('title')
    <title>Quản lý Món | Thêm mới</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm món ăn</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('chuacofile'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Chưa thêm file',
                })
            </script>
        @endif
        @if (session('themthanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Thêm sản phẩm thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        @endif
        <!-- form start -->
        <form action="admin/product/add" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="productName">Tên món ăn</label>
                    <input type="text" class="form-control" id="productName" name="productName"
                        placeholder="Nhập tên món ăn">
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá tiền</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice"
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
                        @foreach ($category as $key)
                            <option value="{{ $key->id }}"> {{ $key->name }} </option>
                        @endforeach
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

@endsection
