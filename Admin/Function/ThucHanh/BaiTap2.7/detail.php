<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.7 detail</title>
</head>

<body>
    <?php 
 
       $conn = mysqli_connect($servername, $username, $pass, $dbname);
       $id = $_GET["id"];
       $truyvan = "select * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua  where Ma_sua ='$id' ";
       $ketqua = mysqli_query($conn, $truyvan);
       

   ?>
    <div class="container">
        <table align="center" bgcolor="#FEFEFE">
            <?php 
               if (mysqli_num_rows($ketqua) != 0) {
                while ($row = mysqli_fetch_array($ketqua)) {
        
             ?>
            <tr bgcolor="#FFEEE6">
                <td colspan="3" align="center">
                    <h1> <?php echo $row["Ten_sua"] ." - " .$row["Ten_loai"] ?></h1>
                </td>
            </tr>

            <tr>
                <td colspan="1">
                    <img src="./Function/ThucHanh/Hinh_sua/<?php echo $row['Hinh']?>" alt='<?php echo $row['Hinh'] ?>'>

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
                    <p id="sub">Trọng lượng: <?php echo $row["Trong_luong"] ." gr - Đơn giá: "  .$row["Don_gia"]  ?> </p>
                </td>
                
            </tr>
           <tr>
           <td id="back">
                    
           <a href="javascript:window.history.back(-1);">Quay về</a>

                </td>
           </tr>
            <?php                            
                    }
                }
            ?>

        </table>
    </div>
    <style>
    .container {
        width: 700px;
        margin: 0 auto;
    }

    img {

        max-height: 100%;
    }

    td {
        padding: 2px 10px;
        border: 1px solid #222;
    }
    #sub {
        text-align: right;
    }
    #back {
        border: none;
        text-align: right;
    }
    </style>
</body>

</html>