<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../BaiTap5/style.css">
</head>
<body>
<?php 
    $phantu = $giatricanthay = $giatrithay ="";
    if(isset($_POST["phantu"])) {
        $phantu = $_POST["phantu"];
    }
    if(isset($_POST["giatricanthay"])) {
        $giatricanthay = $_POST["giatricanthay"];
    }
    if(isset($_POST["giatrithay"])) {
        $giatrithay = $_POST["giatrithay"];
    }
    function XuatMangCu($arr) {
        $arr = explode(",",$arr);
        foreach($arr as $value) {
            echo $value ." ";
        }
    }
    function XuatMang($arr) {
        foreach($arr as $value) {
            echo $value ." ";
        }
    }
    // function ThayThe(&$arr,$giatricanthay,$giatrithay) {
    //     $arr = explode(",",$arr);
    //     foreach ($arr as $key => $value) {         
    //             if($value == $giatricanthay) {
    //                 $value = $giatrithay;
    //         }
                  
    //     }
    
    // }
    function ThayThe(&$arr,$giatricanthay,$giatrithay) {
        $arr = explode(",",$arr);
        for($i=0 ; $i<count($arr);$i++) {         
                if($arr[$i] == $giatricanthay) {
                    $arr[$i] = $giatrithay;
            }
                  
        } 
    
    }

  

?>



    <div class="container">
        <div class="heading"> 
        <h1>Thay thế</h1>

        </div>
        <form  method="post">
            <div class="roww">
                <span>  
                 Nhập  các phần tử: 
                </span>
            <div class="roww-main">
            <input  type="text" name="phantu" value="<?php echo $phantu ?>"> <span>(*)</span>
            </div>
               
            </div>
            <div class="roww">
                 <span>Giá trị cần thay thế: </span>
                <input  type="text" name="giatricanthay" value ="<?php
                echo $giatricanthay;
            ?>">
            </div>
            <div class="roww">
                <span>Giá trị thay thế: </span>  
                <input  type="text" name="giatrithay" value ="<?php
                echo $giatrithay;
            ?>">
            </div>
            <div class="roww">
                 <span></span>
                <input style="background:#95CAFD" type="submit" name="submit" value="Thay thế">
            </div>
            <div class="roww">
                <span>  
                 Mảng cũ: 
                </span>
            <div class="roww-main">
            <input readonly style="background:#FDA4A2"  type="text" name="" value="<?php XuatMangCu($phantu)  ?>"> 
            </div>
               
            </div>
            <div class="roww">
                <span>  
                Mảng sau khi thay thế: 
                </span>
            <div class="roww-main">
            <input readonly style="background:#FDA4A2"  type="text" name="" value="<?php 
              ThayThe($phantu,$giatricanthay,$giatrithay) ;
              XuatMang($phantu);
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