@extends('admin.main')

@section('title')
    <title>Quản lý Chi tiết phiếu nhập | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Chi tiết phiếu nhập </h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="card bg-success">
                <p>
                    {!! Session::get('success') !!}
                </p>
            </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('fail'))
                <div class="card bg-danger">
                    <p>
                        {!! Session::get('fail') !!}
                    </p>
                </div>
            @endif
            <form action="admin/importdetails/edit" method="post" id="myform" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã phiếu nhập</label>
                        <input type="text" class="form-control" name="idImport" value="{{ $importDetails->import_id }}" readonly>

                    </div>
                    <input type="hidden" name="application_url" id="application_url" value="{{  url('') }}"/>
                    <div class="form-group">
                        <label>Danh sách sản phẩm</label>
                        <select class="form-control" name="productID" disabled>
                            @foreach ($products as $key)
                                <option  @if ($importDetails->product_id == $key->id) selected @endif value="{{ $key->id }}"> {{ $key->name }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{$importDetails -> product_id}}" name="productID">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" name="amount" id="amount" value="{{ $importDetails->amount }}" required >
                        <p style="color: red" id="amount2" ></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá</label>
                        <input type="number" name="productPrice" id="productPrice" class="form-control"  value="{{ $importDetails->products_linked->price }}" readonly >

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
                    $('#amount2').text("");
                  //  $('#amount2').attr("placeholder", "Số lượng còn lại " + data.quantity);;
                    $('#amount2').text("Số lượng còn lại " + data.quantity)
                }
            });
        });
    </script>


@endsection
