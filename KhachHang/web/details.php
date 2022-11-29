<style>
.mid-grid-left {
  display: none;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>

  <?php
	include("Layout_KhachHang_Header.php");
	$MaGiay = $_GET['MaGiay'];

	$query = "SELECT `MaGiay`,`TenGiay`, `GiaBan`, `AnhBia`,TenLoaiGiay, MoTa, GiaBanCu FROM `giay`,loaigiay where loaigiay.MaLG= giay.MaLG and  MaGiay = '$MaGiay' and HienThiSanPham=1 ";

	$result = mysqli_query($con, $query);

	if(isset($_POST['submit_cart'])){
		if(isset($_SESSION["MaKH"])){
			$MaKH =  $_SESSION["MaKH"];
			$giohang = "insert into GioHang value(null,'$MaKH','$MaGiay',1,1)";
			$giohang_trung = "select * from giohang where MaKH = '$MaKH' and MaGiay = '$MaGiay'";
			$giohang_trung_result = mysqli_query($con, $giohang_trung);
			$row = mysqli_fetch_array($giohang_trung_result);
			if(mysqli_num_rows($giohang_trung_result) != 0) {
				$soluongmoi =  $row["soluong"]+1;
				$u = "UPDATE giohang SET soluong = '$soluongmoi' WHERE giohang.MaGiay = '$MaGiay';";
				mysqli_query($con, $u);
				echo "<script>
				alert('Da them vao gio thanh cong');
				</script>";

			}else {
				mysqli_query($con, $giohang);
				echo "<script>
				alert('Da them vao gio thanh cong');
				</script>";
			}}
		else {
			echo "<script>
			alert('Vui long dang nhap');
			</script>";
		}
	}

	?>
  <!---start-wrap---->
  <!---start-header---->

  <!----//End-bottom-header---->
  <!---//End-header---->
  <!--- start-content---->
  <div class="content details-page">
    <!---start-product-details--->
    <div class="product-details">
      <div class="wrap">
        <ul class="product-head">
          <li><a href="#">Home</a> <span>::</span></li>
          <li class="active-page"><a href="#">Product Page</a></li>
          <div class="clear"> </div>
        </ul>
        <!----details-product-slider--->
        <!-- Include the Etalage files -->
        <link rel="stylesheet" href="css/etalage.css">
        <script src="js/jquery.etalage.min.js"></script>
        <!-- Include the Etalage files -->
        <script>
        jQuery(document).ready(function($) {

          $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 400,
            source_image_width: 900,
            source_image_height: 1000,
            show_hint: true,
            click_callback: function(image_anchor, instance_id) {
              alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor +
                '"\n(in Etalage instance: "' + instance_id + '")');
            }
          });
          // This is for the dropdown list example:
          $('.dropdownlist').change(function() {
            etalage_show($(this).find('option:selected').attr('class'));
          });

        });
        </script>
        <!----//details-product-slider--->
        <?php if (mysqli_num_rows($result) != 0) { ?>

        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <div class="details-left">
          <div class="details-left-slider">
            <ul id="etalage">

              <li>
                <!-- <img class="etalage_thumb_image" src="images/product-slide/image7_thumb.jpg" /> -->
                <img class="etalage_source_image" <?php echo 'src="HinhAnhGiay/' . $row['AnhBia'] . '" ' ?> />
              </li>
            </ul>
          </div>

          <div class="details-left-info">
            <div class="details-right-head">

              <?php echo "<h1>" . $row['TenGiay'] . "</h1>" ?>
              <ul class="pro-rate">
                <li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
                <li><a href="#">0 Review(s) Add Review</a></li>
              </ul>
              <p class="product-detail-info"><?php echo $row['MoTa']; ?></p>
              <a class="learn-more" href="#">
                <h3>MORE DETAILS</h3>
              </a>
              <div class="product-more-details">
                <ul class="price-avl">
                  <li class="price">
                    <span><?php echo number_format($row['GiaBanCu'], 0, ',', '.') . ' VNĐ' ?></span><label><?php echo number_format($row['GiaBan'], 0, ',', '.') . ' VNĐ' ?></label>
                  </li>

                  <div class="clear"> </div>
                </ul>
                <ul class="product-colors">
                  <h3>available Colors ::</h3>
                  <li><a class="color1" href="#"><span> </span></a></li>
                  <li><a class="color2" href="#"><span> </span></a></li>
                  <li><a class="color3" href="#"><span> </span></a></li>
                  <li><a class="color4" href="#"><span> </span></a></li>
                  <li><a class="color5" href="#"><span> </span></a></li>
                  <li><a class="color6" href="#"><span> </span></a></li>
                  <li><a class="color7" href="#"><span> </span></a></li>
                  <li><a class="color8" href="#"><span> </span></a></li>
                  <div class="clear"> </div>
                </ul>
                <form method="post">
                  <button name="submit_cart" class="ps-btn mb-10 btn btn-danger">Add to cart</button>
                </form>
                <ul class="product-share">
                  <h3>All so Share On</h3>
                  <ul>
                    <li><a class="share-face" href="#"><span> </span> </a></li>
                    <li><a class="share-twitter" href="#"><span> </span> </a></li>
                    <li><a class="share-google" href="#"><span> </span> </a></li>
                    <li><a class="share-rss" href="#"><span> </span> </a></li>
                    <div class="clear"> </div>
                  </ul>
                </ul>
              </div>
            </div>
          </div>
          <div class="clear"> </div>
        </div>

        <div class="clear"> </div>
      </div>
      <!----product-rewies---->
      <div class="product-reviwes">
        <div class="wrap">
          <!--vertical Tabs-script-->
          <!---responsive-tabs---->
          <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
          <script type="text/javascript">
          $(document).ready(function() {
            $('#horizontalTab').easyResponsiveTabs({
              type: 'default', //Types: default, vertical, accordion
              width: 'auto', //auto or any width like 600px
              fit: true, // 100% fit in a container
              closed: 'accordion', // Start closed if in accordion view
              activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
              }
            });

            $('#verticalTab').easyResponsiveTabs({
              type: 'vertical',
              width: 'auto',
              fit: true
            });
          });
          </script>
          <!---//responsive-tabs---->
          <!--//vertical Tabs-script-->
          <!--vertical Tabs-->
          <div id="verticalTab">
            <ul class="resp-tabs-list">
              <li>Description</li>
              <li>Product tags</li>
              <li>Product reviews</li>
            </ul>
            <div class="resp-tabs-container vertical-tabs">
              <div>
                <h3> Details</h3>
                <p><?php echo $row['MoTa']; ?></p>
              </div>
              <div>
                <h3>Product Tags</h3>
                <h4>Add Your Tags:</h4>
                <form>
                  <input type="text"> <input type="submit" value="ADD TAGS" />
                  <span>Use spaces to separate tags. Use single quotes (') for phrases.</span>
                </form>
              </div>
              <div>
                <h3>Customer Reviews</h3>
                <p>There are no customer reviews yet.</p>
              </div>
            </div>
          </div>
          <?php    } ?>
          <?php } ?>
          <div class="clear"> </div>
          <!--- start-similar-products--->
          <!--- //End-similar-products--->
        </div>
      </div>
      <div class="clear"> </div>
      <!--//vertical Tabs-->
      <!----//product-rewies---->
      <!---//End-product-details--->
    </div>
  </div>
  <!---- start-bottom-grids---->
  <div class="clear"> </div>
  </div>
  </div>
  </div>
  <!---- //End-bottom-grids---->
  <!--- //End-content---->
  <!---start-footer---->
  <?php include("Layout_KhachHang_Footer.php"); ?>
  <div class="clear"> </div>
  </div>
  </div>
  <!---//End-footer---->
  <!---//End-wrap---->
</body>

</html>