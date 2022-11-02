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
    $dayso = "";
    $tong = 0;
    if(isset($_POST["dayso"])) {
        $dayso = $_POST["dayso"];
        $arr = explode(",",$dayso);
  
        foreach ($arr as  $value) {
            $tong = $tong + (int) $value;
        }
    }
 


?>



    <div class="container">
        <div class="heading"> 
        <h1>Nhập và tính trên dãy số</h1>

        </div>
        <form  method="post">
            <div class="roww">
                <span>  
                 Nhập dãy số: 
                </span>
            <div class="roww-main">
            <input  type="text" name="dayso" value="<?php echo $dayso ?>"> <span>(*)</span>
            </div>
               
            </div>
            <div class="roww">
                 <span></span>
                <input style="background:#FBF994" type="submit" name="submit" value="Tổng dãy số">
            </div>
            <div class="roww">
                 <span>Tổng dãy số: </span>
                <input readonly style="background:#C5FB97;color:red;" type="text" name="tinhtong" value ="<?php
                    if(!empty($dayso)) {
                        echo $tong;
                    }else {
                        echo "";
                    }
                
                ?>">
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
    grid-template-columns: 1fr 2fr ;
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