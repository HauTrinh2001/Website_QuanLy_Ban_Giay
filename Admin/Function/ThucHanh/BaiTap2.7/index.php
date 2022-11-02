<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.7</title>
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
    <div class="app">
        <div class="heading">
            <h1>Thông tin các sản phẩm</h1>
        </div>
        <div class="container">
            <?php                
               if (mysqli_num_rows($query_run) != 0) {
                while ($row = mysqli_fetch_array($query_run)) {      
            ?>
            <div class="roww">

                <h4>
                    <a class="text-decoration-underline" href="?thamso=baitapp3&bai=2.7_answer&id=<?php echo $row["Ma_sua"]?>">
                        <?php echo $row["Ten_sua"]  ?>
                    </a>
                </h4>
                <p>
                    <?php echo $row["Trong_luong"]." - " .$row["Don_gia"] ." VNĐ" ?>
                </p>
                <img src="./Function/ThucHanh/Hinh_sua/<?php echo $row['Hinh']?>" alt='<?php echo $row['Hinh'] ?>'>
            </div>

            <?php                            
             }
        }
        ?>
         </div>
        <div class="container-fluid">
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1 && $so_trang > 1) {
                echo '<a  class="page-link" href="?thamso=baitapp3&bai=7&trang=' . ($current_page - 1) . '">Trước</a>';
            }
            for ($i = 1; $i <= $so_trang; $i++) {
                $link_phan_trang = "?thamso=baitapp3&bai=7&trang=" . $i;
                if ($i == $current_page) {
                    echo '<span class="page-link active">' . $i . '</span> ';
                } else {
                    echo "<a class='page-link' href='$link_phan_trang' >";
                    echo $i;
                    echo "</a> ";
                }
            }
            if ($current_page < $so_trang && $so_trang > 1) {
                echo '<a class="page-link" href="?thamso=baitapp3&bai=7&trang=' . ($current_page + 1) . '">Sau</a>';
            }
            ?>

        </ul>
    </div>
    </div>





    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    h1 {
        color: #FB6700;
    }

    .heading {
        text-align: center;
        background: #FFEEE6;
    }

    .roww img {
        height: 100px;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    }

    .roww {
        padding: 8px 4px;
        border: 1px solid #222;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
        background-color: #fff;
        margin: 2px;
        color: #222;
    }


    </style>
</body>

</html>