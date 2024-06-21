@extends('admin.main')

@section('title')
    <title>Quản lý Món | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa thông tin món</h3>
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
        @if (session('suathanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Sửa sản phẩm thành công',
                }).then(function() {
                    // window.location = "admin/product/list";
                });
            </script>
        @endif

        <form action="admin/product/edit" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <label for="productName">Tên món ăn</label>
                    <input type="text" class="form-control" id="productName" name="productName"
                        placeholder="Nhập tên món ăn" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá tiền</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice"
                        placeholder="Nhập giá tiền" value="{{ $product->price }}" required>
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá nhập</label>
                    <input type="number" class="form-control" id="productPrice" name="productPriceImport"
                           placeholder="Nhập giá tiền" value="{{$product->price_import}}" required>
                </div>
                <div class="form-group">
                    <label for="productQuantity">Số lượng</label>
                    <input type="number" class="form-control" id="productQuantity" name="productQuantity"
                        placeholder="Nhập số lượng" value="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                    <label>Danh sách thể loại</label>
                    <select class="form-control" name="productCategoryID">
                        @foreach ($category as $key)
                            @if ($product->category_id == $key->id)
                                <option selected value="{{ $product->category_id }}"> {{ $key->name }} </option>
                            @else
                                <option value="{{ $key->id }}"> {{ $key->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Danh sách NCC</label>
                    <select class="form-control" name="supplierID">
                        @foreach ($suppliers as $key)
                            @if ($product->id_supplier == $key->id)
                                <option selected value="{{ $product->id_supplier }}"> {{ $key->name }} </option>
                            @else
                                <option value="{{ $key->id }}"> {{ $key->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="productDescription" rows="3" placeholder="Enter ..."
                        value="">{{ $product->description }}</textarea>
                </div>
                <label for="">Chọn ảnh</label>
                <div class="custom-file">
                    <input type="file" name="productImage" id="imgInp" class="custom-file-input" id="productImage"
                        value="{{ $product->image }}">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <img src="img/products/{{ $product->image }}" style="max-width: 200px" id="blah">
                    <input type="hidden" name="productImage2" value="{{ $product->image }}">
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
    </script>

@endsection
