<style>
    .mid-grid-left {
        display: none;
    }
</style>
<!DOCTYPE html>
<html>
<?php include("Layout_KhachHang_Header.php"); ?>

<head>

</head>

<body>

    <div class="Menu" style="text-align:center">
        <a <?php if (isset($_GET['thamso']) and $_GET['thamso'] == './Member/MinhHau.php') echo "class='active'" ?>href="?thamso=./Member/MinhHau.php">Trịnh Minh Hậu</a>
        <a <?php if (isset($_GET['thamso']) and $_GET['thamso'] == './Member/NhuCua.php') echo "class='active'" ?> href="?thamso=./Member/NhuCua.php">Lê Như Của</a>
        <a <?php if (isset($_GET['thamso']) and $_GET['thamso'] == './Member/AnhNam.php') echo "class='active'" ?>href="?thamso=./Member/AnhNam.php">Hồ Anh Nam</a>
        <a <?php if (isset($_GET['thamso']) and $_GET['thamso'] == './Member/HongHan.php') echo "class='active'" ?>href="?thamso=./Member/HongHan.php">Nguyễn Ngọc Hồng Hân</a>
        <a <?php if (isset($_GET['thamso']) and $_GET['thamso'] == './Member/QuocPhong.php') echo "class='active'" ?>href="?thamso=./Member/QuocPhong.php">Dương Quốc Phong</a>
    </div>
    <div class="noidung">
        <?php if (isset($_GET['thamso'])) {
            include($_GET['thamso']);
        } ?>
    </div>
</body>
<style>
    .Menu {
        margin-top: 24px;
    }

    .Menu a {

        margin-left: 10px;
        padding: 10px 15px;
        background: #fff;
        color: #333;
        transition: 1s;
    }

    .Menu a.active {
        background-color: #333;
        color: #fff
    }

    .Menu a:hover {

        background: #333;
        color: #fff
    }
</style>
<?php include("Layout_KhachHang_Footer.php"); ?>

</html>