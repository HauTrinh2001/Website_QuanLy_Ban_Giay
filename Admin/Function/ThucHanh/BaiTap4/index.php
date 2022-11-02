<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 4</title>
    <link rel="stylesheet" href="../BaiTap4/style.css">
</head>

<body>

    <?php  
    $toan = $li = $hoa = $tongdiem =$diemchuan  =  $ketquathi = "";
    $loi1=  $loi2=  $loi3 =  $loi4 = "" ;
    if(!empty($_POST)) {
        if(isset($_POST["toan"])) {
            $toan = $_POST["toan"];
        }
        if(empty(trim($toan))  or !is_numeric($toan)){
            $loi1 = "Điểm toán phải là số và không được để trống !";
        }
        if(isset($_POST["li"])) {
            $li = $_POST["li"];
        }
        if(empty(trim($li))  or !is_numeric($li)){
            $loi2 = "Điểm lí phải là số và không được để trống !";
        }  
        if(isset($_POST["hoa"])) {
            $hoa = $_POST["hoa"];
        }
        if(empty(trim($hoa))  or !is_numeric($hoa)){
            $loi3 = "Điểm hoá phải là số và không được để trống !";
        }
        if(isset($_POST["diemchuan"])) {
            $diemchuan = (float)$_POST["diemchuan"];
        }
 
           
            if((($toan >= 0 and $li>= 0 and $hoa>= 0) ) and (($toan<= 10 and $li<= 10 and $hoa<= 10) ) ){
                $tongdiem =  (float) $toan  + (float) $li + (float) $hoa;      
                if((($toan and $li and $hoa) > 0) and $tongdiem > $diemchuan ) {
                    $ketquathi = "Đậu";
                }
                else {
                    $ketquathi = "Rớt";
                }
            
            }
            else {
                $loi4 = "Các hệ số điểm phải lớn hơn 0 và nhỏ hơn 10 !";
            }   
    }





    if(isset($_POST["lammoi"])) {
        $toan = $li = $hoa = $tongdiem  =  $ketquathi =  $loi1=  $loi2=  $loi3 = $loi4 =  "";
        
    }
?>


    <form  method="post">
        <div class="container">
            <h1>Kết quả thi đại học</h1>
            <div class="item">
                Toán:
                <div>
                    <input type="text" name="toan" value="<?php  echo $toan ?>">
                    <span><?php  echo $loi1 ?></span>
                </div>

            </div>
            <div class="item">
                Lí:
                <div>
                    <input type="text" name="li" value="<?php  echo $li ?>">
                    <span><?php  echo $loi2 ?></span>
                </div>

            </div>
            <div class="item">
                Hoá:
                <div>
                    <input type="text" name="hoa" value="<?php  echo $hoa ?>">
                    <span><?php  echo $loi3 ?></span>
                </div>

            </div>
            <div class="item">
                Điểm chuẩn:
                <div>
                    <input readonly type="text" name="diemchuan" value="<?php 
                        if(empty(trim($diemchuan))) {
                            $diemchuan =  20;
                            echo $diemchuan;
                        }
                        else
                         echo $diemchuan 
                       ?>">
                </div>

            </div>
            <div class="item">
                Tổng điểm:
                <input readonly type="text" name="tongdiem"
                    value="<?php if(!empty($toan) or !empty($li) or !empty($hoa)) echo $tongdiem; else echo "" ?>">

            </div>
            <div class="item">
                Kết quả thi:
                <input readonly type="text" name="ketquathi"
                    value="<?php if(!empty($tongdiem)) echo $ketquathi; else echo "" ?>">

            </div>
            <div class="submit">
                <input type="submit" value="Xem kết quả">
                <input type="submit" value="Làm mới" name="lammoi">
            </div>
            <span><?php  echo $loi4 ?></span>
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
    grid-template-columns: 1fr 2fr ;
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