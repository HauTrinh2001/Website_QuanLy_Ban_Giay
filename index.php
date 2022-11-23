<body>
    <?php

    include("Layout_KhachHang_Header.php");

    $query = "SELECT MaGiay,`TenGiay`, `GiaBan`,GiaBanCu, `AnhBia`,TenLoaiGiay FROM `giay`,loaigiay where loaigiay.MaLG= giay.MaLG and  GiaBan > 2000000 and HienThiSanPham=1 ";

    $result = mysqli_query($con, $query);


    ?>
    <form action="" method="post">
        <!---start-wrap---->
        <!---start-header---->

        <!----//End-bottom-header---->
        <!---//End-header---->
        <!----start-image-slider---->
        <div class="img-slider">
            <div class="wrap">
                <ul id="jquery-demo">
                    <li>
                        <a href="#slide1">
                            <img src="images/slide-1.jpg" alt="" />
                        </a>
                        <div class="slider-detils">
                            <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                            <span>Stay true to your team all day, every day, game day.</span>
                        </div>
                    </li>
                    <li>
                        <a href="#slide2">
                            <img src="images/slide-4.jpg" alt="" />
                        </a>
                        <div class="slider-detils">
                            <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                            <span>Stay true to your team all day, every day, game day.</span>
                        </div>
                    </li>
                    <li>
                        <a href="#slide3">
                            <img src="images/slide-1.jpg" alt="" />
                        </a>
                        <div class="slider-detils">
                            <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                            <span>Stay true to your team all day, every day, game day.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
        <!----//End-image-slider---->
        <!----start-price-rage--->
        <div class="wrap">
            <div class="price-rage">
                <h3>MẶT HÀNG GIÁ CAO NHẤT:</h3>
                <div id="slider-range">
                </div>
            </div>
        </div>
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
                                <div style="cursor: pointer;" onclick="location.href='details.php?MaGiay=<?php echo $row['MaGiay'] ?>';" class="product-grid fade">
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

                <!---- //End-bottom-grids---->
                <!--- //End-content---->
                <!---start-footer---->
            </div>

        </div>
        <div></div>
        <div></div>
        <?php include("Layout_KhachHang_Footer.php"); ?>

    </form>

</body>

</html>