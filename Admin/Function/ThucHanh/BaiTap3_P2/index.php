<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../BaiTap3/style.css">
</head>
<body>
<?php 

 $sophantu = $dayso  =$loi1 = "";
 $tong = 0;
 if(isset($_POST["sophantu"])) {
    $sophantu = $_POST["sophantu"];
    if(empty($sophantu) || ($sophantu < 0 )) {
        $loi1 = "Số phần tử phải là số và không được để trống ";
     }
 }

 if(isset($_POST["dayso"])) {
    $dayso = $_POST["dayso"];
 }
 function PhatSinh($n) {
    $arr = array();
    for($i=0;$i<$n;$i++) {
        $arr[$i] = rand(0,20);
    }
    return $arr;
 }
 function XuatMang($arr) {
    foreach($arr as $value) {
        echo $value, " ";
    }
 }


 function GTLN($arr) {
    $max =  $arr[0];
    foreach($arr as $value) {
        if($value > $max) {
            $max = $value;
        }
    }
    return $max;
 }
 function GTNN($arr) {
    $min = $arr[0] ;
    foreach($arr as $value) {
       
        if($value < $min) {
            $min = $value;
        }
    }
    return $min;
  
 }
 function TinhTong($arr) {
    $tong = 0;
    foreach($arr as $value) {
        $tong = $tong + (int) $value;
    }
    return $tong;
 }
 if(isset($_POST["submit"])) {
    $mang =  PhatSinh($sophantu);
    $min = GTNN($mang);
   $max = GTLN($mang);
   $tong = TinhTong($mang);
 }

?>



    <div class="container">
        <div class="heading"> 
        <h1>Phát sinh mảng và tính toán</h1>

        </div>
        <form  method="post">
             <div class="roww roww-n">
                 <span>Nhập số phần tử: </span>
                <input type="text" name="sophantu" value="<?php echo $sophantu;?>">
                                 
            </div>
            <p> <?php echo $loi1;?></p>
            <div class="roww roww-submit">
                 <span></span>
                <input  style="background:#FBF994" type="submit" name="submit" value="Phát sinh và tính">
            </div>
            <div class="roww">
                <span>  
                 Mảng 
                </span>
            <div class="roww-main">
                <input  type="text" name="dayso" value="<?php if(isset($mang)) XuatMang($mang) ?>">
            </div>
               
            </div>
            <div class="roww">
                 <span>GTLN trong mảng: </span>
                <input readonly style="background:#C5FB97;color:red;" type="text" name="GTLN" value ="<?php if(isset($max)) echo $max;
                ?>">
            </div>
            <div class="roww">
                 <span>GTNN trong mảng: </span>
                <input readonly style="background:#C5FB97;color:red;" type="text" name="GTNN" value ="<?php if(isset($min)) echo $min;
                ?>">
            </div>
            <div class="roww">
                 <span>Tổng mảng: </span>
                <input readonly style="background:#C5FB97;color:red;" type="text" name="tinhtong" value ="<?php

                    if(!empty($sophantu) && $sophantu > 0) {
                        echo $tong;
                    }

           
                ?>">
            </div>
            <div class="note">
               <span>(Ghi chú) </span>Các phần tử trong mảng sẽ có giá trị trừ 0 đến 20
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
.roww{
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
.roww-main span ,.note span {
    color:red;
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