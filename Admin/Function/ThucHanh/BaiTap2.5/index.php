<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.5</title>
</head>

<body>
    <?php
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    $limit = 10;
    if (!isset($_GET['trang'])) {
        $_GET['trang'] = 1;
    }
    $tv = "select count(ma_sua) as total from sua";
    $tv_1 = mysqli_query($conn, $tv);
    $tv_2 = mysqli_fetch_array($tv_1);
    $total_records = $tv_2['total'];
    $so_trang = ceil($total_records  / $limit);
    $start = ($_GET['trang'] - 1) * $limit;
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    if ($current_page > $so_trang) {
        $current_page = $so_trang;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua LIMIT $start, $limit";

    $query_run = mysqli_query($conn, $query);

    ?>

<div class="container">
    <table  align="center" bgcolor="#FEFEFE">
        <tr bgcolor="#FFEEE6">
            <td colspan="3" align="center">
                <h1>Thông tin các sản phẩm</h1>
            </td>
        </tr>
        <?php
        if (mysqli_num_rows($query_run) != 0) {
            while ($row = mysqli_fetch_array($query_run)) {

        ?>
                <tr>
                    <td colspan="1">
                        <img src="./Function/ThucHanh/Hinh_sua/<?php echo $row['Hinh'] ?>" alt='<?php echo $row['Hinh'] ?>'>

                    </td>
                    <td>
                        <h4> <?php echo $row["Ten_sua"]  ?></h4>
                        <p>Nhà sản xuất:<?php echo $row["Ten_hang_sua"]  ?>
                            <br><?php echo $row["Ten_loai"] . " - " . $row["Trong_luong"] . " - " . $row["Don_gia"] . " VNĐ" ?>
                        </p>
                    </td>
                </tr>

        <?php
            }
        }
        ?>

    </table>
    </div>
    <div class="container">
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1 && $so_trang > 1) {
                echo '<a  class="page-link" href="?thamso=baitapp3&bai=5&trang=' . ($current_page - 1) . '">Trước</a>';
            }
            for ($i = 1; $i <= $so_trang; $i++) {
                $link_phan_trang = "?thamso=baitapp3&bai=5&trang=" . $i;
                if ($i == $current_page) {
                    echo '<span class="page-link active">' . $i . '</span> ';
                } else {
                    echo "<a class='page-link' href='$link_phan_trang' >";
                    echo $i;
                    echo "</a> ";
                }
            }
            if ($current_page < $so_trang && $so_trang > 1) {
                echo '<a class="page-link" href="?thamso=baitapp3&bai=5&trang=' . ($current_page + 1) . '">Sau</a>';
            }
            ?>

        </ul>
    </div>



    <style>
        h1 {
            color: #FB6700;
        }

        img {
            height: 100px;
        }

        td {
            border: 1px solid black;
            padding: 20px;
        }
    </style>
</body>

</html>