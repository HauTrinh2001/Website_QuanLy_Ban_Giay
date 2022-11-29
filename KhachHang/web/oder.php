<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dat hang</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="~/css/cart.css">
</head>
<?php

function trang_truoc(){
		?>

<html>

<head>
  <meta charset="UTF-8">
  <title>Đang chuyển về trang trước</title>
</head>

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

  $query2 = "select count(*) as count from giohang join giay on giohang.MaGiay = giay.MaGiay join khachhang on giohang.MaKH = khachhang.MaKH where giohang.MaKH = '$MaKH'";
  $result1 = mysqli_query( $con, $query2 );
  $row1 = mysqli_fetch_assoc($result1);
  $count = $row1['count'];
  // echo "count".$count;


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
    <div class="card-body">
      <h1>Giỏ Hàng Của Tôi</h1>
      <?php if($count > 0) { ?>

      <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Giỏ Hàng - <?php echo $count ?> sản phẩm</h5>
              </div>
              <div class="card-body">
                <?php if (mysqli_num_rows($result) != 0) { ?>
                <?php
          while ($row = mysqli_fetch_array($result)) {
            ?>

                <!-- Single item -->
                <div class="row" style="margin-bottom: 20px">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                      <img src="cart.png" class="w-50" alt="Blue Jeans Jacket" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 fw-bold">
                    <!-- Data -->
                    <p><strong><?php echo $row["TenGiay"]  ?></strong></p>

                    <!-- Data -->
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 fw-bold">
                    <!-- Quantity -->
                    <div class="d-flex mb-4" style="max-width: 300px">
                      <form method="post" style="display: flex">
                        <!-- <input type="submit" class="btn btn-primary" name="tru" style="width: 40px; text-align: center;"
                          value="-"> -->

                        <div class="form-outline fw-bold">
                          <input name="soluong" value="<?php echo $row["soluong"]  ?>" type="text"
                            class="form-control w-5" style="width: 100px; text-align: center; border: 0px" />
                          <input type="hidden" name="maId" value="<?php echo $row['id']?>">

                        </div>

                        <!-- <input type="submit" class="btn btn-primary" name="cong" style="width: 40px;text-align: center;"
                          value="+"> -->
                        <!-- </input> -->
                      </form>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <p class="text-start text-md-center fw-bold">
                      <strong style="padding-right: 30px"><?php echo $row['GiaBan']; echo ' VND'; ?></strong>
                    </p>
                    <!-- Price -->
                  </div>
                </div>






                <?php  }} ?>
              </div>

            </div>
            <div class="card-body ">
              <ul class="list-group list-group-flush justify-content-end">
                <li class="list-group-item d-flex justify-content-start align-items-center border-0 px-0 mb-3"
                  style="color: #20E3B2; font-size: 30px;   font-weight: bold;">
                  <span style="padding-right: 10px">Tổng Tiền: </span>
                  <p> <?php echo " " ;echo (float) $tinh; echo " VND" ?></p>
                </li>

                <form method="post">
                  <input class="btn btn-lg mt-2 text-dark border border-primary w-300" type="text" name="diachi"
                    placeholder="Nhập địa chỉ giao">
                  <input class="btn btn-lg btn-primary mt-2 text-light" type="submit" value="Đặt hàng" name="dathangne">

                </form>
              </ul>


            </div>
            <!-- <div class="text-right mt-4">
            <label class="text-muted font-weight-normal m-0">Total price</label>
            <div class="text-large"><strong>

              </strong></div>
          </div>
          <div class="float-right">
            <a href="./oder.php" class="btn btn-lg btn-primary mt-2 text-light">Mua Hàng</a>
          </div> -->
            <?php echo "</div>
          </div>
        </div>
      </div>
    </div>"; } else { ?>
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