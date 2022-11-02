<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.2</title>
</head>

<body>
    <?php
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    $truyvanxem = "select * from khach_hang";
    $ketqua = mysqli_query($conn, $truyvanxem);
    ?>
    <h2 class="text-center">Thông tin khách hàng</h2>
    <table style="width:100%">
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên</th>
            <th>Phái</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>

        </tr>
        <?php
        $sel = 0;
        if (mysqli_num_rows($ketqua) != 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $sel++;
                if ($sel % 2 == 0) {
                    echo "<tr style='background: #FEE0C1;' >";
                } else {
                    echo "<tr >";
                }
                for ($i = 0; $i < mysqli_num_fields($ketqua) - 1; $i++) {

                        
                       
                    
       
                    echo "<td>";
                    echo  $row[$i] . " ";
                    echo  "</td>";
                }
                echo  "</tr>";
            }
        }

        ?>

    </table>
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