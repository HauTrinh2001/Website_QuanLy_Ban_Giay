<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dat hang</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="~/css/cart.css">
</head>
<?php
function trang_truoc(){
		?>
			<html><head>
			  <meta charset="UTF-8">
			  <title>Đang chuyển về trang trước</title></head>
			<body>
				<script type="text/javascript">
					window.history.back();
				</script>
			</body>
			</html>
		<?php
	}
    ?>
<?php

	include("Layout_KhachHang_Header.php");
	$MaKH =  $_SESSION["MaKH"];
  $query = "select * from giohang join giay on giohang.MaGiay = giay.MaGiay join khachhang on giohang.MaKH = khachhang.MaKH where giohang.MaKH = '$MaKH'";
	$result = mysqli_query($con, $query);
  $tongtien = "select sum(giay.GiaBan * giohang.soluong) from giohang join giay on giohang.MaGiay = giay.MaGiay where giohang.MaKH = '$MaKH'";
  $run_tongtien = mysqli_query($con, $tongtien);
  $tinh = mysqli_fetch_column($run_tongtien);


  if(isset($_POST['dathangne'])){
    $diachi = $_POST["diachi"];
    $qr = "insert into dondathang value(null,'$MaKH',null,0,'cho xac nhan',now(),'$diachi',null)";
    mysqli_query($con, $qr);

    $laymaddh = "select SoDH from dondathang order by SoDH desc limit 1";
    $result_laymaddh = mysqli_query($con, $laymaddh);
    $run_laymaddh = mysqli_fetch_array($result_laymaddh);
    $donhangid = $run_laymaddh["SoDH"];

    $truyvangiohang = "select * from giohang join giay on giohang.MaGiay = giay.MaGiay where MaKH = '$MaKH'";
    $run_truyvangiohang = mysqli_query($con, $truyvangiohang);

    if (mysqli_num_rows($run_truyvangiohang) != 0) {
        while ($row = mysqli_fetch_array($run_truyvangiohang)) {
                $soluong = $row["soluong"];
                $dongia = $row["GiaBan"];
                $mag = $row["MaGiay"];
                $thuchienthem = "insert into chitietdathang value('$donhangid','$mag','$soluong','$dongia')";
            mysqli_query($con, $thuchienthem);

            //xoá giỏ hàng
            $thuchienxoa = "delete from giohang where MaKH = $MaKH";
            mysqli_query($con, $thuchienxoa);
            header("location: ./dathangthanhcong.php");
            echo "<script>
			alert('Cam on ban đã mua hàng nha');location = '.';
			</script>";
        }}






}


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
        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
      </tr>
      </thead>
      <tbody>
      <?php if (mysqli_num_rows($result) != 0) { ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
           <td><?php echo $row["TenGiay"] ?></td>
            <td><?php echo $row["GiaBan"] ?></td>
            <td>
              <?php echo $row["soluong"] ?>
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
    <form  method="post">
        <input class="btn btn-lg mt-2 text-dark border border-primary w-25"  type="text" name="diachi" placeholder="Nhập địa chỉ giao">
        <input class="btn btn-lg btn-primary mt-2 text-light" type="submit" value="Đặt hàng" name="dathangne">
    </form>
</body>
</html>