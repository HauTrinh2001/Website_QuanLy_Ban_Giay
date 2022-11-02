<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $n = "" ;
 
    function TaoMang($n) {     
        $arr = array();
        for($i = 0;$i<$n;$i++) {
           $arr[$i] = rand(-10,10);
        }
        return $arr;
    }
    function XuatMang($arr){

        foreach($arr as $value) {
            echo $value," ";
        }
    
    }
    function DemChan($arr) {
        $dem =0;
        foreach($arr as $value) {
            if($value % 2 == 0) {
                $dem = $dem +1;
            }
        }
        return $dem;
    }
    function DemNho100($arr) {
        $dem =0;
        foreach($arr as $value) {
            if($value <  100) {
                $dem = $dem +1;
            }
        }
        return $dem;
    }
    function TongAm($arr) {
        $tong =0;
        foreach($arr as $value) {
            if($value <  0) {
               $tong = $tong + $value;
            }
        }
        return $tong;
    }
    function InGiaTri($arr) {
        foreach($arr as $key=>$value) {
            if($value ==  0) {
              echo $key," ";
            }
        }
    }
    function SapXepTang(&$arr) {
        for($i=0;$i<(count($arr)-1);$i++) {
        for($j=$i+1;$j<count($arr);$j++) {
            if($arr[$i] > $arr[$j]) {
                $tam = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tam;
            }
        }

        }
    }




?>
    <h1>Bài tập 1</h1>

    <form  method="post">
        <input type="text" name="n" value="<?php  echo $n ?>">
        <input type="submit" value="Thực hiện">
        <div>
<?php 
    if(!empty($_POST)) {
        if(isset($_POST["n"])) {
            (int) $n =  (int) $_POST["n"];     
            if($n >0) {
               $mang =  TaoMang($n);
               echo "Câu b: ";
               XuatMang($mang);
               $demchan = DemChan($mang);
               echo "<br>Câu c :Số phần tử chẵn là ", $demchan;
               $demnho = DemNho100($mang);
               echo "<br>Câu d :Số phần tử  nhỏ hơn 100 là ", $demnho;
               $tongam = TongAm($mang);
               echo "<br>Câu e :Tổng  nhỏ hơn 100 là ", $tongam;
               echo "<br>Câu f :Vị trí giá trị bằng không ";
               InGiaTri($mang);
               echo "<br>Câu g :Sắp xếp tăng ";
               SapXepTang($mang);
               XuatMang($mang);
            }else {
                echo "N không phải là số nguyên dương ";
            }

        }
    }
 
?>
        </div>
    </form>

 
</body>
</html>