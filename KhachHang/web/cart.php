<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="~/css/cart.css">
  <title>Giohang</title>
</head>
<?php
	include("Layout_KhachHang_Header.php");
	$MaKH =  $_SESSION["MaKH"];
  $query = "select * from giohang join giay on giohang.MaGiay = giay.MaGiay join khachhang on giohang.MaKH = khachhang.MaKH where giohang.MaKH = '$MaKH'";
	$result = mysqli_query($con, $query);
  $tongtien = "select sum(giay.GiaBan * giohang.soluong) from giohang join giay on giohang.MaGiay = giay.MaGiay where giohang.MaKH = '$MaKH'";
  $run_tongtien = mysqli_query($con, $tongtien);
  $tinh = mysqli_fetch_column($run_tongtien);
  ?>
<body>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered m-0">
      <thead>
      <tr>
        <th class="text-center py-3 px-4" style="min-width: 400px;">Tên Sản Phẩm</th>
        <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
        <th class="text-center py-3 px-4" style="width: 120px;">Số Lượng</th>
        <th class="text-right py-3 px-4" style="width: 100px;">Giá Tiền</th>
        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="?MaGiay=echo MaGiay" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
      </tr>
      </thead>
      <tbody>
      <?php if (mysqli_num_rows($result) != 0) { ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
           <td><?php echo $row["TenGiay"] ?></td>
            <td><?php echo $row["GiaBan"] ?></td>
            <td>
            <input  class="shop-tooltip close float-none text-danger" type="submit" value="-" style="border-color: #fff" >
              <?php echo $row["soluong"] ?>
              <input class="shop-tooltip close float-none text-danger" type="submit" value="+" style="border-color: #fff" ></input>
            </td>
            <td><?php echo (float) $row["GiaBan"] * (float) $row["soluong"] ?></td>
            <td class="text-center align-middle px-0"><input href="#" class="shop-tooltip close float-none text-danger" type="submit" value="x" style="border-color: #fff" ></input></td>


          </tr>
          <?php } } ?>
      </tbody>
      <table>
    </div>

  </div>
  <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong><?php echo (float) $tinh ?> </strong></div>
                </div>
                <div class="float-right">
              <a href="./oder.php" class="btn btn-lg btn-primary mt-2 text-light">Mua Hàng</a>
            </div>

</body>
</html>