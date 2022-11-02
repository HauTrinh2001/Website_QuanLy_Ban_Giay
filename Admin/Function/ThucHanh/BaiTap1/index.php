<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>

<body>
   
    <?php  
    $dai = $rong = $dientich = "";
    $loi1= "";
    $loi2= "";
    if(!empty($_POST)) {
        if(isset($_POST["dai"])) {
            $dai = $_POST["dai"];
        }
        if(empty(trim($dai))){
            $loi1 = "Bạn chưa nhập chiều dài !";
        }
        if(isset($_POST["rong"])) {
            $rong = $_POST["rong"];
        } 
        if(empty(trim($_POST["rong"]))){
            $loi2 = "Bạn chưa nhập chiều rộng !";
        }
        $dientich = (float)$dai * (float)$rong;      
    }
    if(isset($_POST["lammoi"])) {
        $dai = $rong = $dientich = $loi1 = $loi2 = null;
        
    }
?>


    <form  method="post">

        <div class="container">
            <h1>Diện tích hình chữ nhật</h1>
            <div class="item">
                Chiều dài:
                <div>
                    <input type="text" name="dai" value="<?php  echo $dai ?>">
                    <span><?php  echo $loi1 ?></span>
                </div>
            </div>
            <div class="item">
                Chiều rộng:
                <div>
                    <input type="text" name="rong" value="<?php  echo $rong ?>">
                    <span><?php  echo $loi2 ?></span>
                </div>
            </div>
            <div class="item">
                Diện tích:
                <input readonly type="text" name="dientich" value="<?php echo $dientich ?>">
            </div>
            <div class="submit">
                <input type="submit" value="Tính">
                <input type="submit" value="Làm mới" name="lammoi">
            </div>
        </div>

    </form>
<style>
    .container {
    width: 500px;
    height: 280px;
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