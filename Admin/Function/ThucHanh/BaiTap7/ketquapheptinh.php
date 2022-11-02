<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 7</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php  
    
    $so1 = $so2 = $pheptinh = $ketqua = $kitu =  "";
    $loi1 = $loi2 = "";
    if(isset($_POST["submit"])) {
        if(!empty($_POST)) {
            if(isset($_POST["so1"])) {
                $so1 = $_POST["so1"];
            }
            if(empty(trim($so1)) or !is_numeric($so1)){
                $loi1 = "Phải là số và không được trống!";
            }
            if(isset($_POST["so2"])) {
                $so2 = $_POST["so2"];
            }
            if(empty(trim($so2)) or !is_numeric($so2)){
                $loi2 = "Phải là số và không được trống!";
            }
            if(isset($_POST["pheptinh"])) {
                $pheptinh = $_POST["pheptinh"];
            }
            if(isset($so1) && isset($so2) && isset($pheptinh)  ) {
                if($pheptinh == "+") {
                    $ketqua = (float) $so1 +(float) $so2;
                    $kitu = "Cộng";
                }
                else if($pheptinh == "-") {
                    $ketqua = (float) $so1 -(float) $so2;
                    $kitu = "Trừ";
        
                }
                else if($pheptinh == "*") {
                    $kitu = "Nhân";
                    $ketqua = (float) $so1 *(float) $so2;
                }
                else {
                    if($so2 == 0) {
                        include("./Function/Sup/Pageback.php");
                        Page_Back();
                        echo '<script> alert("Không thể thực hiện phép chia cho 0"); </script>';
                    }
                    else {
                        $kitu = "Chia";
                        $ketqua = (float) $so1 /(float) $so2;
                    }
                 
        
                }
            }
    
    
        }
    }


   


?>


    <form action="ketquapheptinh.php" method="post">
        <div class="container">
            <h1>Phép tính trên hai số</h1>
            <div class="item">
                Chọn phép tính:
                <div>
                    <span> <?php echo $kitu  ?> </span>
                </div>

            </div>
            <div class="item">
                Số thứ nhất:
                <div>
                    <input type="text"  value="<?php  echo $so1 ?>">
                    <span><?php  echo $loi1  ?></span>
                </div>

            </div>
            <div class="item">
                Số thứ hai:
                <div>
                    <input type="text"  value="<?php echo $so2 ?>">
                    <span><?php echo $loi2 ?></span>
                </div>

            </div>
            <div class="item">
                Kết quả:
                <div>
                    <input type="text" value="<?php echo $ketqua ?>">

                </div>

            </div>
            <div class="submit">
                <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>

            </div>
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
.cal {
    display: flex;
    gap: 3px;
}
</style>
</body>

</html>