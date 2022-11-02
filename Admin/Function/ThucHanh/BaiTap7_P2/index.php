<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../BaiTap7/style.css">
</head>
<body>
<?php 
    $mang_can = array("Quý","Giáp","Ất","Binh","Đinh","Mậu","Kỷ","Canh","Tân","Nhâm");
    $mang_chi = array("Hợi","Tí","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất");
    $mang_hinh = array("hoi.jpg","ti.jpg","suu.jpg","dan.jpg","mao.jpg","thin.jpg","ran.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg");
    $nam =  $namduong = $loi = "";
    if(isset($_POST["namduong"])) {
        $nam = $_POST["namduong"];
        $namduong = $_POST["namduong"];
        if(is_numeric($nam)) {
            $nam = $nam - 3; 
            $can = $nam % 10;     
            $chi = $nam %12;  
            $nam_al = $mang_can[$can] ." " .$mang_chi[$chi]; 
            $hinh = $mang_hinh[$chi];
            $hinh_anh = "<img src='./Function/ThucHanh/BaiTap7_P2/images/$hinh'>";
        }
        else {
            $loi = "Phải là số ";
        }

    }
?>



    <div class="container">
        <div class="heading"> 
        <h1>Tính năm âm lịch</h1>

        </div>
        <form  method="post">
            <div class="row1">
                <span>Năm dương lịch</span>
                <span>Năm âm lịch</span>
            </div>
            <div class="row">
                <input type="text" name="namduong" value="<?php echo $namduong ?>" >
                <button style="background:#FEFACF">=></button>
                <input  style="background:#FEFACF" type="text" value="<?php
                 if(!empty($_POST["namduong"]) and  is_numeric($nam)) {echo $nam_al; }             
                    else {
                        echo "";
                    }
                ?>">
            </div>
            <div>
                <p ><?php  echo $loi ?></p>
            </div>
            <div class="image">
            <?php
                if(!empty($nam_al)) {
                    echo $hinh_anh; 
                }
                else {
                    echo "";
                }
           ?>
         
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
 .container .row, .row1{
     margin-bottom: 10px;
     display: flex;
     justify-content: space-around;
 }
 
 .container form {
     padding: 5px 5px;
     background-color: #CCD9CF;
 }
 .row input {
    max-width: 30%;    
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
 .image{
     display: flex;
     justify-content: center;
 }
 .image img {
     width: 200px;
 }
 .row button {
    width: 10%;
 }

</style>
</body>
</html>