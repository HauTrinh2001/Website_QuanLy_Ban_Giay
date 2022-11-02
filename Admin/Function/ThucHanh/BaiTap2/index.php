<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 2</title>
</head>

<body>

    <?php  
    $pi = 3.14;
    $bankinh = $chuvi = $dientich = "";
    $loi1= "";
    if(isset($_POST["submit"])) {
        if(isset($_POST["bankinh"])) {
            $bankinh = $_POST["bankinh"];
        }
        if(empty(trim($bankinh))){
            $loi1 = "Bạn chưa nhập bán kính !";
        }
        $dientich = $pi * (float) pow((float)$bankinh,2);
        $chuvi = 2 * $pi * (float) $bankinh; 

    }
    if(isset($_POST["lammoi"])) {
        $bankinh = $chuvi = $dientich = $loi1 = null;
        
    }
?>


    <form  method="post">
        <div class="container">
            <h1>Diện tích và chu vi hình tròn</h1>
            <div class="item">
                Bán kính:
                <div>
                    <input type="text" name="bankinh" value="<?php  echo $bankinh ?>">
                    <span><?php  echo $loi1 ?></span>
                </div>
            </div>
            <div class="item">
                Diện tích:
                <input readonly type="text" name="dientich" value="<?php echo $dientich ?>">
            </div>
            <div class="item">
                Chu vi:
                <input readonly type="text" name="chuvi" value="<?php echo $chuvi ?>">
            </div>
            <div class="submit">
                <input type="submit" value="Tính" name="submit">
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