<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Spike shoes Website Template | Home :: w3layouts</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    </script>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <!----start-alert-scroller---->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#demo').hide();
            $('.vticker').easyTicker();
        });
    </script>
    <!----start-alert-scroller---->
    <!-- start menu -->
    <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/megamenu.js"></script>
    <script>
        $(document).ready(function() {
            $(".megamenu").megamenu();
        });
    </script>
    <script src="js/menu_jquery.js"></script>
    <!-- //End menu -->
    <!---slider---->
    <link rel="stylesheet" href="css/slippry.css">
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <script src="js/scripts-f0e4e0c2.js" type="text/javascript"></script>
    <script>
        jQuery('#jquery-demo').slippry({
            // general elements & wrapper
            slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
            // options
            adaptiveHeight: false, // height of the sliders adapts to current slide
            useCSS: false, // true, false -> fallback to js if no browser support
            autoHover: false,
            transition: 'fade'
        });
    </script>
    <!----start-pricerage-seletion---->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script type='text/javascript'>
        //<![CDATA[ 
        $(window).load(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [100, 400],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

        }); //]]>  
    </script>
    <!----//End-pricerage-seletion---->
    <!---move-top-top---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1200);
            });
        });
    </script>
    <!---//move-top-top---->

</head>

<body>
    <?php
    include("connection.php");

    $query1 = "SELECT * FROM loaigiay";
    $result1 = mysqli_query($con, $query1);
    ?>

    <!---start-wrap---->
    <!---start-header---->
    <div class="header">
        <div class="top-header" style="padding: 5px 0px;">
            <div class="wrap">
                <div class="top-header-left">
                    <ul>
                        <!---cart-tonggle-script---->
                        <script type="text/javascript">
                            $(function() {
                                var $cart = $('#cart');
                                $('#clickme').click(function(e) {
                                    e.stopPropagation();
                                    if ($cart.is(":hidden")) {
                                        $cart.slideDown("slow");
                                    } else {
                                        $cart.slideUp("slow");
                                    }
                                });
                                $(document.body).click(function() {
                                    if ($cart.not(":hidden")) {
                                        $cart.slideUp("slow");
                                    }
                                });
                            });
                        </script>
                        <!---//cart-tonggle-script---->
                        <li><a class="cart" href="#"><span id="clickme"> </span></a></li>
                        <!---start-cart-bag---->
                        <div id="cart">Your Cart is Empty <span>(0)</span></div>
                        <!---start-cart-bag---->

                    </ul>
                </div>
                <div class="top-header-center">
                    <div class="top-header-center-alert-left">
                        <h3>SHOP GIÀY CHÍNH HÃNG</h3>
                    </div>
                    <div class="top-header-center-alert-right">
                        <div class="vticker">
                            <ul>
                                <li>Cung cấp những mặt hàng tốt nhất!!! <label>Hãy đến với chúng tôi.</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="top-header-right">
                    <ul>
                    <?php
                            if(isset($_SESSION['email'])){
                            ?>
                                <li class="dropdown o">
                                    <img src="https://img.vn/uploads/thuvien/singa-png-20220719150401Tdj1WAJFQr.png" alt="" srcset="">
                                    <button class="nut_dropdown">Dropdown</button>
                                    <div class="noidung_dropdown">
                                        <a style="color:black;" href="profileKH.php">Xem thông tin</a>
                                        <a style="color:black" href="changepwd.php">Đổi mật khẩu</a>
                                        <a style="color:black" href="logout.php">Đăng xuất</a>
                                    </div>

                                </li>
                            <?php
                           }
                           else{
                            ?>
                            <li><a href="login.php">Login</a><span> </span></li>
                            <li><a href="register.php">Join</a></li>
                           <?php
                           }
                           ?>
                    </ul>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <!----start-mid-head---->
        <div class="mid-header">
            <div class="wrap">
                <div class="mid-grid-left">
                </div>
                <div class="mid-grid-right">

                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <!----//End-mid-head---->
        <!----start-bottom-header---->
        <div class="header-bottom">
            <div class="wrap">
                <!-- start header menu -->
                

            </div>
        </div>

    </div>
    <!----//End-bottom-header---->
    <!---//End-header---->
    <!----start-image-slider---->
    <div class="clear"> </div>
    <!----//End-image-slider---->
    <!----start-price-rage--->

    <!----//End-price-rage--->
    <!--- start-content---->
    <div></div>
    <div></div>


    <?php
    include("connection.php");
    $email = $_SESSION['email'];
    $query = "SELECT * FROM khachhang WHERE Email='$email'";
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    if (mysqli_num_rows($result) <> 0) {
    ?>
    <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
            <div class="col-md-4 text-center" style="display: block; justify-content: center; margin-top: auto; margin-bottom: auto;">
                <?php
                    if (!($row['AnhKH'])) {
                ?>
                        <img src="imgKH/user.jpg" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
                <?php
                    } else {
                        $anh = $row['AnhKH'];
                        echo "<img src='imgKH/$anh'  class='img-fluid rounded' style='width: 180px;height:180px;object-fit: cover;'>";
                    }
                ?>
                <div>
                    <a href="profile_edit.php">
						<button class="mx-auto m-1 btn-sm btn btn-primary">Chỉnh sửa</button>
					</a>
                    <a href="index.php">
                            <button class="mx-auto m-1 btn-sm btn btn-warning text-white">Trang chủ</button>
                    </a>
                </div>
        </div>
        
        <div class="col-md-8">
            <div class="h2" style="font-weight: bold;">THÔNG TIN NGƯỜI DÙNG</div>
            <table class="table table-striped">
                <tr><th style="font-weight: bold;"><i></i> Họ tên</th><td><?=($row['HoTen'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Tên tài khoản</th><td><?=($row['TaiKhoan'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Email</th><td><?=($row['Email'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Địa chỉ</th><td><?=($row['DiaChiKH'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Điện thoại</th><td><?=($row['DienThoaiKH'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Ngày sinh</th><td><?=($row['NgaySinh'])?></td></tr>
                <tr><th style="font-weight: bold;"><i></i> Giới tính</th><td><?php if ($row['GioiTinh']==1) echo "Nam"; if ($row['GioiTinh']==0) echo "Nữ";?></td></tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
    <div>
            <br><br><br><br><br>
            <?php include("Layout_KhachHang_Footer.php"); ?>
        </div>
    </body>
</html>
<style>
    .login-box {
        padding: 0;
        min-height: 700px;
    }
    .login-main h1 {
        color: #08080b;
        font-weight: 700;
        font-size: 1.2em;
        padding: 1em 0;
    }
    .login-main {
        border-top: 1px solid #eee;
    }
    /* Nút Dropdown*/
    .nut_dropdown {
        background: black;
        color: white;

        font-size: 16px;
        border: none;
    }

    /* Thiết lập vị trí cho thẻ div với class dropdown*/
    .dropdown {
        position: absolute;
        display: inline-block;
        z-index: 100000;
    }

    /* Nội dung Dropdown */
    .noidung_dropdown {
        /*Ẩn nội dụng các đường dẫn*/
        display: none;
        position: absolute;
        color: black;
        background: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);


    }


    /* Thiết kế style cho các đường dẫn tronng Dropdown */
    .noidung_dropdown a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;

    }

    /* thay đổi màu background khi hover vào đường dẫn */
    .noidung_dropdown a:hover {
        background-color: #ddd;

    }

    /* hiển thị nội dung dropdown khi hover */

    /* Thay đổi màu background cho nút khi được hover */
    .dropdown:hover .noidung_dropdown {
        display: block;
        z-index: 1000000000000;
    }

    /*Dùng Để hiển thị nội dung*/
    .hienThi {
        display: block;
    }

    .o {

        top: 12px;
        position: absolute;
        right: 230px;
    }

    .o img {
        width: 20px;
        height: 20px;
        border-radius: 50%;

    }
</style>