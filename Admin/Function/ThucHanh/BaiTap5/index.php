<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 5</title>
    <link rel="stylesheet" href="../BaiTap5/style.css">
</head>

<body>

    <?php  
    $giobatdau = $gioketthuc = $thanhtoan = "";
    $loi1=  $loi2 = $loi3 = "";
    if(!empty($_POST)) {

        if(isset($_POST["giobatdau"])) {
            $giobatdau = $_POST["giobatdau"];
        }
        if(empty(trim($giobatdau))  or !is_numeric($giobatdau)){
            $loi1 = "Giờ bắt đầu phải là số và không được để trống !";
        }
        if(isset($_POST["gioketthuc"])) {
            $gioketthuc = $_POST["gioketthuc"];
        }
        if(empty(trim($gioketthuc))  or !is_numeric($gioketthuc)){
            $loi2 = "Giờ kết thúc phải là số và không được để trống !";
        }
    else if($gioketthuc > $giobatdau) {
            if($giobatdau >= 10 and $gioketthuc <= 17) {
                $thanhtoan = ((float) ($gioketthuc) - (float) ($giobatdau)) * 20000;
            }
            else if($giobatdau >= 17 and $gioketthuc <= 24) {
                $thanhtoan = ((float) ($gioketthuc) - (float) ($giobatdau)) * 45000;
            }
            else if($giobatdau >=10 and $gioketthuc  <= 24) {
                $thanhtoan = ((17 - (float)$giobatdau) * 20000) + (((float) $gioketthuc  - 17 ) * 45000);
            }
            else {
                $loi3 = "Quán chưa hoạt động !";
            }
        }else {
            $loi2 = "Giờ kết thúc phải lớn hơn giờ bắt đầu !";
        }
       
   

    }
    if(isset($_POST["lammoi"])) {
        $giobatdau = $gioketthuc = $thanhtoan = $loi1=  $loi2 = $loi3 =  "";
    }
?>


    <form  method="post">
        <div class="container">
            <h1>Thanh toán tiền điện</h1>
            <div class="item">
                Giờ bắt đầu:
                <div>
                    <input type="text" name="giobatdau" value="<?php  echo $giobatdau ?>">
                    <span><?php  echo $loi1 ?></span>
                </div>
                (h)
            </div>
            <div class="item">
                Giờ kết thúc:
                <div>
                    <input type="text" name="gioketthuc" value="<?php  echo $gioketthuc ?>">
                    <span><?php  echo $loi2 ?></span>
                </div>
                (h)
            </div>

            <div class="item">
                Số tiền thanh toán:
                <input readonly type="text" name="tienthanhtoan"
                    value="<?php if(!empty($giobatdau) or !empty($gioketthuc)) echo $thanhtoan; else echo "" ?>">
                (VNĐ)
            </div>
            <div class="submit">
                <input type="submit" value="Tính tiền">
                <input type="submit" value="Làm mới" name="lammoi">

            </div>
            <span><?php  echo $loi3 ?></span>
        </div>

    </form>
<style>
    .container {
    width: 500px;
    height: 400px;
    background-color: #fffada;
    padding: 0 20px;
    box-sizing: border-box;
}
h1 {
    padding: 3px 0px;
    text-align: center;
    background-color: #fed576;
    text-transform: uppercase;
}
.item {
    display: grid;
    grid-template-columns: 1.5fr 2fr 0.5fr ;
    grid-template-rows: 1fr;
    margin-top: 10px;
    column-gap: 15px;

}

.item input {
    width: 100%;
    height: 25px;
    transform: translate(0, -25%);
}

.submit {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.submit input {
    margin-right: 10px;
}


.submit input:nth-child(1) ,.submit input:nth-child(2){
    cursor: pointer;
    padding: 5px 5px;
}
.item input:last-child {
    background: #ffdcdc;
}
</style>


</body>

</html>