<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.4</title>
</head>

<body>
    <?php

    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    // $ketqua = mysqli_query($conn, $truyvanxem);
    // $ketqua = mysqli_query($conn, 'select count(ma_sua) as total from sua');
    // $row = mysqli_fetch_assoc($ketqua);
    // $total_records = $row['total'];
    // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    // $limit = 10;
    // $total_page = ceil($total_records / $limit);
    // if ($current_page > $total_page) {
    //     $current_page = $total_page;
    // } else if ($current_page < 1) {
    //     $current_page = 1;
    // }
    // $start = ($current_page - 1) * $limit;
    // $truyvanxem = "select sua.ten_sua,hang_sua.ten_hang_sua, loai_sua.ten_loai ,sua.trong_luong ,don_gia from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua LIMIT $start, $limit";

    // $ketqua = mysqli_query($conn, $truyvanxem);





//phân trang
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
$query = "select sua.ten_sua,hang_sua.ten_hang_sua, loai_sua.ten_loai ,sua.trong_luong ,don_gia from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua LIMIT $start, $limit";

$query_run = mysqli_query($conn, $query);

?>






    <h2 class="text-center">Thông tin sữa</h2>
    <table style="width:100%">
        <tr>
            <th>Số TT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>

        </tr>
        <?php
        $sel = 0;
        $index = 1;

        if (mysqli_num_rows($query_run) != 0) {
            while ($row = mysqli_fetch_array($query_run)) {
                $sel++;
                if ($sel % 2 == 0) {
                    echo "<tr style='background: #FEE0C1;' >";
                } else {
                    echo "<tr >";
                }
                echo "<td>";
                echo  $index;
                echo  "</td>";
                $index++;
                for ($i = 0; $i < mysqli_num_fields($query_run); $i++) {
                    echo "<td>";
                    echo  $row[$i] . " ";
                    echo  "</td>";
                }
                echo  "</tr>";
            }
        }

        ?>

    </table>
    <div class="container">
    <ul class="pagination justify-content-center">
        <?php
        if ($current_page > 1 && $so_trang > 1) {
            echo '<a  class="page-link" href="?thamso=baitapp3&bai=4&trang=' . ($current_page - 1) . '">Trước</a>';
        }
        for ($i = 1; $i <= $so_trang; $i++) {
            $link_phan_trang = "?thamso=baitapp3&bai=4&trang=" . $i;
            if ($i == $current_page) {
                echo '<span class="page-link active">' . $i . '</span> ';
            }else {
                echo "<a class='page-link' href='$link_phan_trang' >";
                echo $i;
                echo "</a> ";
                 
            }
        }
        if ($current_page < $so_trang && $so_trang > 1) {
            echo '<a class="page-link" href="?thamso=baitapp3&bai=4&trang=' . ($current_page + 1) . '">Sau</a>';
        }
        ?>

</ul>
    </div>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 1.1em;


        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            width: 12.5%;
            padding-left: 20px;

        }

        td {
            border: 1px solid black;
            text-align: center;
            width: 12.5%;
            padding-left: 20px;
        }

    
    </style>


</body>

</html>