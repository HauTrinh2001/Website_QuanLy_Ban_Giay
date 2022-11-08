<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<body>
    <?php
    include("Layout_KhachHang_Header.php");
    $per_page_record = 9;
    $query = "SELECT * FROM `giay` where HienThiSanPham=1 ";
    $result = mysqli_query($con, $query);
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result / $per_page_record);
    if (isset($_GET['page'])) {

        $page  = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page_record;
    $query = "SELECT * FROM `giay` where HienThiSanPham=1 LIMIT $start_from,$per_page_record ";
    $result = mysqli_query($con, $query);
    ?>

    <!---start-wrap---->
    <!---start-header---->
    <!----//End-bottom-header---->
    <!---//End-header---->
    <!----start-image-slider---->
    <div class="clear"> </div>
    <!----//End-image-slider---->
    <!----start-price-rage--->

    <!----//End-price-rage--->
    <!--- start-content---->
    <div class="content">
        <div class="wrap">
            <div class="content-right">
                <div class="product-grids">
                    <!--- start-rate---->
                    <script src="js/jstarbox.js"></script>
                    <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
                    <script type="text/javascript">
                        jQuery(function() {
                            jQuery('.starbox').each(function() {
                                var starbox = jQuery(this);
                                starbox.starbox({
                                    average: starbox.attr('data-start-value'),
                                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                                    ghosting: starbox.hasClass('ghosting'),
                                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                                    stars: starbox.attr('data-star-count') || 5
                                }).bind('starbox-value-changed', function(event, value) {
                                    if (starbox.hasClass('random')) {
                                        var val = Math.random();
                                        starbox.next().text(' ' + val);
                                        return val;
                                    }
                                })
                            });
                        });
                    </script>

                    <!---//End-rate---->
                    <!---caption-script---->
                    <!---//caption-script---->

                    <?php if (mysqli_num_rows($result) != 0) { ?>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <div onclick="location.href='details.html';" class="product-grid fade">
                                <div class="product-grid-head">
                                    <ul class="grid-social">
                                        <li><a class="facebook" href="#"><span> </span></a></li>
                                        <li><a class="twitter" href="#"><span> </span></a></li>
                                        <li><a class="googlep" href="#"><span> </span></a></li>
                                        <div class="clear"> </div>
                                    </ul>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div> <span> (46)</span>
                                    </div>
                                </div>

                                <div class="product-pic">

                                    <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" ?>
                                    <?php echo '<img src="HinhAnhGiay/' . $row['AnhBia'] . '" width="200px" height="150px">'; ?>
                                    <?php "</a>" ?>
                                    <p>
                                        <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" .  substr($row['TenGiay'], 0, 40) . "</a>" ?>
                                        <span style="color:blue;text-decoration-line:line-through"><?php echo number_format($row['GiaBanCu'], 0, ',', '.')  . ' VNĐ' ?></span>
                                    </p>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-cust">
                                        <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" . 'Details' . "</a>" ?>
                                    </div>
                                    <div class="product-info-price">
                                        <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" . number_format($row['GiaBan'], 0, ',', '.') . 'Đ' . "</a>" ?>
                                    </div>
                                    <div class="clear"> </div>
                                </div>


                            </div>

                        <?php    } ?>
                    <?php } ?>
                </div>
            </div>
            <div style="clear: both ;"></div>
            <div style="text-align:center">


                <?php
                $pagLink = "";
                if ($page >= 2) {

                    echo "<a href='HienThiTatCaSanPham.php?page=" . ($page - 1) . "'>  Prev </a>";
                }

                for ($i = 1; $i <= $number_of_page; $i++) {

                    if ($i == $page) {

                        $pagLink .= "<a class = 'active' href='HienThiTatCaSanPham.php?page="

                            . $i . "'>" . $i . "</a>";
                    } else {

                        $pagLink .= "<a href='HienThiTatCaSanPham.php?page=" . $i . "'>
                 
                 " . $i . " </a>";
                    }
                };
                echo $pagLink;


                if ($page < $number_of_page) {

                    echo "<a href='HienThiTatCaSanPham.php?page=" . ($page + 1) . "'>  Next </a>";
                }
                ?>
            </div>
            <!---- //End-bottom-grids---->
            <!--- //End-content---->
            <!---start-footer---->
        </div>
        <div></div>
        <div></div>
        <?php include("Layout_KhachHang_Footer.php"); ?>
</body>

</html>