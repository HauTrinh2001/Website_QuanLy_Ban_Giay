<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.10</title>
</head>

<body>
    <?php

    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    $limit = 2;
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
    $queryloaisua = "select * from loai_sua";
    $queryhangsua = "select * from hang_sua";

    $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua  LIMIT $start, $limit";
    if (isset($_POST["submit"])) {

        $search = $_POST["search"];
        $loaisua  = $_POST["loaisua"];
        $hangsua  = $_POST["hangsua"];

        if (!empty(trim($loaisua)) and empty(trim($hangsua)) and empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where loai_sua.Ma_loai_sua  like '%$loaisua%' ";
        } else if (empty(trim($loaisua)) and !empty(trim($hangsua)) and empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where hang_sua.Ma_hang_sua  like '%$hangsua%' ";
        } else if (empty(trim($loaisua)) and empty(trim($hangsua)) and !empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where sua.Ten_Sua  like '%$search%' ";
        } else if (!empty(trim($loaisua)) and !empty(trim($hangsua)) and empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where loai_sua.Ma_loai_sua  like '%$loaisua%'  and hang_sua.Ma_hang_sua  like '%$hangsua%' ";
        } else if (!empty(trim($loaisua)) and empty(trim($hangsua)) and !empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where loai_sua.Ma_loai_sua  like '%$loaisua%'  and sua.Ten_Sua  like '%$search%' ";
        } else if (empty(trim($loaisua)) and !empty(trim($hangsua)) and !empty(trim($search))) {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where hang_sua.Ma_hang_sua  like '%$hangsua%'  and sua.Ten_Sua  like '%$search%' ";
        } else {
            $query = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where loai_sua.Ma_loai_sua  like '%$loaisua%' and hang_sua.Ma_hang_sua  like '%$hangsua%'  and sua.Ten_Sua  like '%$search%' ";
        }
    }
    $query_runloaisua = mysqli_query($conn, $queryloaisua);
    $query_runhangsua = mysqli_query($conn, $queryhangsua);
    $query_run = mysqli_query($conn, $query);

    ?>

    <div class="container">
        <div class="search">
            <h1>Tìm kiếm thông tin sữa</h1>
        </div>

        <div class="search">
            <form method="post">
                <div class="top">
                    <label for="loaisua">Loại sữa:</label>

                    <select name="loaisua" id="loaisua">

                        <option value="">--Tất cả--</option>
                        <?php

                        if (mysqli_num_rows($query_runloaisua) != 0) {
                            while ($row = mysqli_fetch_array($query_runloaisua)) {

                        ?>
                                <option <?php if (isset($loaisua) and $row["Ma_loai_sua"] == $loaisua) echo "selected='selected' "; ?> value="<?php echo $row["Ma_loai_sua"] ?>"> <?php echo $row["Ten_loai"] ?>
                                </option>
                        <?php
                            }
                        } ?>

                    </select>
                    <label for="hangsua">Hãng sữa</label>
                    <select name="hangsua" id="hangsua">
                        <option value="">--Tất cả--</option>
                        <?php
                        if (mysqli_num_rows($query_runhangsua) != 0) {
                            while ($row = mysqli_fetch_array($query_runhangsua)) {

                        ?>
                                <option <?php if (isset($hangsua) and $row["Ma_hang_sua"] == $hangsua) echo "selected='selected' "; ?> value="<?php echo $row["Ma_hang_sua"] ?>"><?php echo $row["Ten_hang_sua"] ?>
                                </option>
                        <?php
                            }
                        } ?>
                    </select>

                </div>
                <div class="bottom">
                    <label for="search_input">Tên sữa</label>
                    <input type="text" name="search" id="search_input" value="<?php if (isset($search)) echo $search ?>">
                    <button id="submit" type="submit" name="submit">Tìm kiếm</button>
                </div>

            </form>
        </div>
        <div>
            <h3>
                <?php if (isset($_POST["submit"])) {
                    if ($hangsua == "" and $loaisua == "" and $search == "") {
                        echo "";
                    } else {
                        if (mysqli_num_rows($query_run) > 0) {
                            echo "Có " . mysqli_num_rows($query_run) . " sản phẩm được tìm thâý";
                        } else {
                            echo "Không có sản phẩm nào được tìm thâý";
                        }
                    }
                }  ?>
            </h3>
        </div>
        <table bgcolor="#FEFEFE">
            <?php
            if (mysqli_num_rows($query_run) != 0) {
                while ($row = mysqli_fetch_array($query_run)) {

            ?>
                    <tr bgcolor="#FFEEE6">
                        <td colspan="3" align="center">
                            <h1> <?php echo $row["Ten_sua"] . " - " . $row["Ten_loai"] . " - "  . $row["Ten_hang_sua"] ?></h1>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1">
                            <img src="./Function/ThucHanh/Hinh_sua/<?php echo $row['Hinh'] ?>" alt='<?php echo $row['Hinh'] ?>'>

                        </td>
                        <td>
                            <h4> Thành phần dinh dưỡng</h4>
                            <p>
                                <?php echo $row["TP_Dinh_Duong"]  ?>
                            </p>
                            <h4>Lợi ích</h4>
                            <p>
                                <?php echo $row["Loi_ich"]  ?>
                            </p>
                            <p id="sub">
                            <h4> Trọng lượng: </h4> <span><?php echo $row["Trong_luong"] . "gr" ?></span> - <h4>Đơn giá:</h4>
                            <span><?php echo $row["Don_gia"] . " VNĐ" ?></span>
                            </p>
                        </td>

                    </tr>

            <?php
                }
            }
            ?>


        </table>
        <div class="container-fluid">
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1 && $so_trang > 1) {
                echo '<a  class="page-link" href="?thamso=baitapp3&bai=10&trang=' . ($current_page - 1) . '">Trước</a>';
            }
            for ($i = 1; $i <= $so_trang; $i++) {
                $link_phan_trang = "?thamso=baitapp3&bai=10&trang=" . $i;
                if ($i == $current_page) {
                    echo '<span class="page-link active">' . $i . '</span> ';
                } else {
                    echo "<a class='page-link' href='$link_phan_trang' >";
                    echo $i;
                    echo "</a> ";
                }
            }
            if ($current_page < $so_trang && $so_trang > 1) {
                echo '<a class="page-link" href="?thamso=baitapp3&bai=10&trang=' . ($current_page + 1) . '">Sau</a>';
            }
            ?>

        </ul>
    </div>
    </div>


    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .container {

            background: #FDFEF0;

        }

        /* table {
        max-width: 90%;
        margin: 0 auto;
      
    } */
        .search {
            background: #FECCCD;
            text-align: center;


        }

        h1 {
            color: #FB6700;
        }

        .container span {
            color: red;
        }

        h4 {
            display: inline;
        }

        h3 {
            text-align: center;
        }

        img {
            height: 150px;
        }

        td {
            border: 1px solid black;
            padding: 20px;
        }

        label {
            color: red;
            font-weight: bold;
        }

        button {
            background: #FBCDCF;
            padding: 2px 4px;
        }

        .bottom,
        .top {
            background: #fff;
            padding: 10px 0px;
        }

        .top {
            margin-bottom: 1px;

        }
    </style>
</body>

</html>