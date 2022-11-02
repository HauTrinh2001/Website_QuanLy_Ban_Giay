<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../BaiTap6/style.css">
</head>
<body>
<?php 
    $mang  ="";
    if(isset($_POST["mang"])) {
        $mang = $_POST["mang"];
    }
    function HoanVi(&$a,&$b) {
        $tam = $a;
        $a = $b;
        $b = $tam;
    }
    function SapXepGiam($arr) {
        $arr= explode(",",$arr);
        for($i=0;$i<(count($arr)-1);$i++) {
        for($j=$i+1;$j<count($arr);$j++) {
            if($arr[$i] < $arr[$j]) {
               HoanVi($arr[$i],$arr[$j]);
            }
        }
        }
        return $arr;
    }
    function SapXepTang($arr) {
        $arr= explode(",",$arr);
        for($i=0;$i<(count($arr)-1);$i++) {
        for($j=$i+1;$j<count($arr);$j++) {
            if($arr[$i] > $arr[$j]) {
               HoanVi($arr[$i],$arr[$j]);
            }
        }
        }
        return $arr;
    }

    function XuatMang($arr) {
        foreach($arr as $value) {
            echo $value ." ";
        }
    }

    $giam = SapXepGiam($mang);
    $tang = SapXepTang($mang);

?>



    <div class="container">
        <div class="heading"> 
        <h1>Sắp xếp mảng</h1>

        </div>
        <form  method="post">
            <div class="roww">
                <span>  
                 Nhập mảng: 
                </span>
            <div class="roww-main">
            <input  type="text" name="mang" value="<?php echo $mang  ?>"> <span>(*)</span>
            </div>
               
            </div>
            <div class="roww">
                 <span></span>
                <input style="background:#95CAFD" type="submit" name="submit" value="Sắp xếp tăng/giảm">
            </div>
            <div class="roww">
                 <span>Sau khi sắp xếp: </span>
               
            </div>
            <div class="roww">
                <span>  
                 Tăng dần: 
                </span>
            <div class="roww-main">
            <input readonly style="background:#FDA4A2"  type="text" name="" value="<?php  XuatMang($tang)  ?>"> 
            </div>
               
            </div>
            <div class="roww">
                <span>  
                Giảm dần
                </span>
            <div class="roww-main">
            <input readonly style="background:#FDA4A2"  type="text" name="" value="<?php    XuatMang($giam)  ?>"> 
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
.roww-n input {
    width: 75%;
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