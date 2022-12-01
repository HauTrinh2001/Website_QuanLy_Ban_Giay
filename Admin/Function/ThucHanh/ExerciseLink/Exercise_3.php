<?php
include("./Function/Manager/Check_login.php");
include("./Connect_DB/connect_ex.php");
if (!isset($_GET['bai'])) {
    $bai = "";
} else {
    $bai = $_GET['bai'];
}
?>

<div class="pagetitle">
    <h2> KẾT HỢP PHP VÀ MYSQL </h2>
    <ul class="nav">
        <?php for ($i = 1; $i <= 10; $i++) {
            $link = "?thamso=baitapp3&bai=" . $i;  ?>
            <li <?php if (isset($bai)) {
                    if ($bai == $i) {

                        echo "class='active'";
                    }
                }  ?>> <a href="<?php echo $link ?>"><?php echo "Bài " . $i; ?></a></li>
        <?php } ?>
    </ul>

</div>

<div class="content">
    <?php





    switch ($bai) {
        case "1":
            include("./Function/ThucHanh/BaiTap2.1/index.php");
            break;
        case "2":
            include("./Function/ThucHanh/BaiTap2.2/index.php");
            break;
        case "3":
            include("./Function/ThucHanh/BaiTap2.3/index.php");
            break;
        case "4":
            include("./Function/ThucHanh/BaiTap2.4/index.php");
            break;
        case "5":
            include("./Function/ThucHanh/BaiTap2.5/index.php");
            break;
        case "6":
            include("./Function/ThucHanh/BaiTap2.6/index.php");
            break;
        case "7":
            include("./Function/ThucHanh/BaiTap2.7/index.php");
            break;
        case "2.7_answer":
            include("./Function/ThucHanh/BaiTap2.7/detail.php");
            break;
        case "8":
            include("./Function/ThucHanh/BaiTap2.8/index.php");
            break;
        case "9":
            include("./Function/ThucHanh/BaiTap2.9/index.php");
            break;
        case "10":
            include("./Function/ThucHanh/BaiTap2.10/index.php");
            break;
    }

    ?>
</div>

<style>
    .pagetitle {
        height: 80px;
    }

    .nav {

        display: flex;

    }

    .nav li {
        margin-right: 24px;

    }

    .nav li ::after {
        content: '';
        width: 0%;
        height: 2px;
        background: #4154f1;
        transition: all 0.7s;

    }

    .nav li:hover ::after {
        content: '';
        width: 100%;

        background: #4154f1;
        display: block;
    }

    .nav li a {
        color: #111;
        font-size: 20px;
        font-weight: 600;
        text-transform: uppercase;
        text-decoration: none;
    }

    .nav li:hover a {
        opacity: 0.8;
    }

    .nav li.active ::after {
        width: 100%;
        background: #4154f1;
        display: block;
    }
</style>