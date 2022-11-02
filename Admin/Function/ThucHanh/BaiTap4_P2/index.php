<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../BaiTap4/style.css">
</head>

<body>
    <?php
    $mang = $socantim = $loi1 = "";
    if (isset($_POST["submit"])) {

        if (isset($_POST["mang"])) {
            $mang = $_POST["mang"];
        }
        if (isset($_POST["socantim"])) {
            $socantim = $_POST["socantim"];
            if (!(is_numeric($socantim))) {
                $loi1 =  "Phải là số và không được để trống!";
            }
        }
    }
    function XuatMang($arr)
    {
        $arr = explode(",", $arr);
        foreach ($arr as $value) {
            echo $value . " ";
        }
    }

    function Tim($arr, $socantim)
    {
        $arr = explode(",", $arr);
        foreach ($arr as $key => $value) {
            if ($socantim == $value) {
                return $key + 1;
            }
        }
    }
    $key = Tim($mang, $socantim);


    ?>


    <div class="container">
        <div class="heading">
            <h1>Tìm kiếm</h1>

        </div>
        <form method="post">
            <div class="roww">
                <span>
                    Nhập mảng:
                </span>
                <div class="roww-main">
                    <input type="text" name="mang" value="<?php echo $mang ?>"> <span>(*)</span>
                </div>

            </div>
            <div class="roww">
                <span>Nhập số cần tìm: </span>
                <input type="text" name="socantim" value="<?php
                                                            echo $socantim;
                                                            ?>">
            </div>
            <p><?php echo $loi1 ?></p>
            <div class="roww">
                <span></span>
                <input style="background:#95CAFD" type="submit" name="submit" value="Tìm kiếm">
            </div>
            <div class="roww">
                <span>
                    Mảng:
                </span>
                <div class="roww-main">
                    <input type="text" name="" value="<?php XuatMang($mang)  ?>">
                </div>

            </div>
            <div class="roww">
                <span>
                    Kết quả cần tìm:
                </span>
                <div class="roww-main">
                    <input type="text" name="" value="<?php if (isset($_POST["mang"])) {
                                                        if (!empty($key) && (is_numeric($socantim) && isset($mang))) {
                                                            echo "Tìm thấy " . $socantim . " tại vị trí thứ " . $key . " trong mảng";
                                                        } else {
                                                            echo "Không tìm thấy " . $socantim . " trong mảng";
                                                        }
                                                    } 

                                                        ?>">

                </div>

            </div>

            <div class="note">
                <span>(*) </span>Các số được ngăn cách nhau bởi dấu ","
            </div>
        </form>
    </div>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            height: auto;

        }

        .roww {

            margin-bottom: 10px;
            display: grid;
            grid-template-columns: 1fr 2fr;
        }

        .roww input {
            width: 50%;
        }

        .container form {
            padding: 5px 5px;
            background-color: #CCD9CF;
        }

        .roww-main input {
            width: 90%;
        }

        .roww-n input {
            width: 75%;
        }

        .roww-main span,
        .note span {
            color: red;
        }

        .note {
            text-align: center;
        }

        .heading {
            text-align: center;
            padding: 5px 0;
            background: #2E9494;
        }

        h1 {
            color: #fff;
            text-transform: uppercase;

        }
    </style>

</body>

</html>