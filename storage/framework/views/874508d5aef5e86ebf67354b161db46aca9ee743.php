<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container p-5 align-items-center" id="print">
    <div class="card">
        <div class="card-header bg-danger"> Hoá Đơn</div>
    </div>
    <div class="p-1">
        Mã khách hàng : 1
    </div>
    <div class="p-1">
        Tên : Võ Hoàng Kiệt
    </div>
    <div class="p-1">
        Số điện thoại : 039527908
    </div>
    <div class="p-1">
        Địa chỉ : Long An
    </div>
    <div class="p-1">
        Ghi chú : không lấy tương
    </div>
    <div class="p-1">
        Thời gian : 2022-10-29 17:19:09
    </div>
    <div class="p-1">
        Tổng tiền : 89000
    </div>
    <div class="p-1">
        Nhân Viên : Long
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Giá</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Pizza cay</td>
            <td>5</td>
            <td>10000</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Pizza cay</td>
            <td>5</td>
            <td>10000</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Pizza cay</td>
            <td>5</td>
            <td>10000</td>
        </tr>
        </tbody>
    </table>
    <h3>Tổng tiền : 89000</h3>
</div>
<button onclick="myprint()">Print this page</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    function myprint(){
        var url = document.getElementById('print').src;
        window.print();
    }
</script>
</body>
</html>
<?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/admin/order/print.blade.php ENDPATH**/ ?>
