<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    // include("Layout_KhachHang_Header.php");
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
    ?>
    <?php
        include("connection.php");
        $email = $_SESSION['email'];
        $query = "SELECT * FROM khachhang WHERE Email='$email'";
        $result = mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result) <> 0) {
    ?>
		<div class="row col-lg-8 border rounded mx-auto mt-3 p-2 shadow-lg">
			<div class="col-md-4 text-center" style="display: block; justify-content: center; margin-top: auto; margin-bottom: auto;">
			<?php
                    if (!($row['AnhKH'])) {
                ?>
                        <img src="imgKH/user.jpg" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
                <?php
                    } else {
                        $anh = $row['AnhKH'];
                        echo "<img src='imgKH/$anh'  class='js-image img-fluid rounded' style='width: 180px;height:180px;object-fit: cover;'>";
                    }
                ?>
            </div>
	<div class="col-md-8">
				<div class="h2">Xóa tài khoản</div>

				<div class="alert-danger alert text-center my-2">Bạn có muốn xóa tài khoản không?</div>

				<form method="post" action="delete_account_script.php">
                    
                    <table class="table table-striped">
                    </table>
                    <div class="progress my-3 d-none">
					  
					</div>
					<div class="p-2">
                        <button class="btn btn-danger float-end">Chắc chắn</button>
						<a href="index.php">
							<label class="btn btn-secondary">Không muốn</label>
						</a>
					</div>
				</form>

			</div>
		</div>
<?php } ?>
</body>
</html>