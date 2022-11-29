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

  $query2 = "select count(*) as count from giohang join giay on giohang.MaGiay = giay.MaGiay join khachhang on giohang.MaKH = khachhang.MaKH where giohang.MaKH = '$MaKH'";
  $result1 = mysqli_query( $con, $query2 );
  $row1 = mysqli_fetch_assoc($result1);
  $count = $row1['count'];
  // echo "count".$count;
  ?>
  <?php

                  $id = "";
                  $soluong= "";
                if(isset($_POST['tru'])){
                  if(isset($_POST['maId'])){
                    $id = $_POST['maId'];
                   }
                    if(isset($_POST['soluong'])){
                      $soluong=$_POST['soluong'];
                    }

                  $soluong=$soluong-1;
                  $update = "UPDATE `giohang` SET `soluong` = '$soluong' WHERE `giohang`.`id` = '$id';";
                  mysqli_query($con, $update);
                }
                else {
                  if(isset($_POST['cong'])){
                    if(isset($_POST['maId'])){
                      $id = $_POST['maId'];
                     }
                      if(isset($_POST['soluong'])){
                        $soluong=$_POST['soluong'];
                      }
                    $soluong=$soluong+1;
                    $update = "UPDATE `giohang` SET `soluong` = '$soluong' WHERE `giohang`.`id` = '$id';";
                    mysqli_query($con, $update);
                  }
                }
                if($soluong<=0){
                  $qr ="delete from giohang where id='$id'";
                  mysqli_query($con, $qr);
                }


              ?>
<body>
  <div class="card-body">
    <h1>Giỏ Hàng Của Tôi</h1>
    <div class="table-responsive">
      <?php if($count > 0) { ?>

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
        <?php
          while ($row = mysqli_fetch_array($result)) {
            ?>
          <tr>
           <td><?php echo $row["TenGiay"] ?></td>
            <td><?php echo $row["GiaBan"] ?></td>
            <td>
              <form method="post" name="cartnum">
                <input id="tru" class="shop-tooltip close float-none text-danger" name="tru" type="submit" value="-" style="border-color: #fff">
                <input type="hidden" name="maId" value="<?php echo $row['id']?>"  >
                <input type="text" name="soluong" value='<?php echo $row["soluong"] ?>'>
                <input id="cong" class="shop-tooltip close float-none text-danger" name="cong" type="submit" value="+" style="border-color: #fff" ></input>
              </form>
            </td>
            <td><?php echo (float) $row["GiaBan"] * (float) $row["soluong"] ?></td>
            <td><a href="xoa.php?id=<?php echo $row["id"] ?>">Xoa</a></td>
          </tr>
          <?php }} ?>
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
            <?php } else { ?>
              <img src="trong.png" class="img">
              <?php } ?>
</body>
</html>
<style>
  .img {
    align-items: center;
    margin: 0 auto;
    display: flex;
    justify-content: center;
  }
  h1 {
    align-items: center;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 20px;
  }
</style>