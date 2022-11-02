<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>

</head>

<body>

    <?php  
    $tenchuho = $chisocu = $chisomoi = $dongia  =  $thanhtoan = "";
    $loi1=  $loi2=  $loi3 = "";
    if(!empty($_POST)) {
        if(isset($_POST["tenchuho"])) {
            $tenchuho = $_POST["tenchuho"];
        }
        if(empty(trim($tenchuho))){
            $loi1 = "Bạn chưa nhập tên chủ hộ !";
        }
        if(isset($_POST["chisocu"])) {
            $chisocu =(float) $_POST["chisocu"];
        }
        if(empty(trim($chisocu))  and is_numeric($chisocu)){
            $loi2 = "Chỉ số cũ phải là số và không được để trống !";
        }
        if(isset($_POST["chisomoi"])) {
            $chisomoi =(float) $_POST["chisomoi"];
            if($chisomoi < $chisocu ) {
                $loi3 = "Chỉ số mới phải lớn hơn chỉ số cũ !";

            }
        }
        if(empty(trim($chisomoi))  and is_numeric($chisomoi)){
            $loi3 = "Chỉ số mới phải là số và không được để trống !";
        }
        if(isset($_POST["dongia"])) {
            $dongia = (float)$_POST["dongia"];
        }
        if($chisomoi > $chisocu) {
            $thanhtoan =  ((float) $chisomoi - (float) $chisocu) * $dongia;
        }
       
   

    }
    if(isset($_POST["lammoi"])) {
        $tenchuho = $chisocu = $chisomoi = $dongia = $thanhtoan = $loi1=  $loi2=  $loi3 = "";
        
    }
?>


    <form  method="post">
        <div class="container">
            <h1>Thanh toán tiền điện</h1>
            <div class="item">
                Tên chủ hộ:
                <div>
                    <input type="text" name="tenchuho" value="<?php  echo $tenchuho ?>">
                    <span><?php  echo $loi1 ?></span>
                </div>

            </div>
            <div class="item">
                Chỉ số cũ:
                <div>
                    <input type="text" name="chisocu" value="<?php  echo $chisocu ?>">
                    <span><?php  echo $loi2 ?></span>
                </div>
                (Kw)
            </div>
            <div class="item">
                Chỉ số mới:
                <div>
                    <input type="text" name="chisomoi" value="<?php  echo $chisomoi ?>">
                    <span><?php  echo $loi3 ?></span>
                </div>
                (Kw)
            </div>
            <div class="item">
                Đơn giá:
                <div>
                    <input type="text" name="dongia" value="<?php 
                        if(empty(trim($dongia))) {
                            $dongia =  20000;
                            echo $dongia;
                        }
                        else
                         echo $dongia 
                       ?>">
                </div>
                (VNĐ)
            </div>
            <div class="item">
                Số tiền thanh toán:
                <input readonly type="text" name="sotienthanhtoan"
                    value="<?php if(!empty($chisomoi) or !empty($chisocu)) echo $thanhtoan; else echo "" ?>">
                (VNĐ)
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
    grid-template-columns: 1.5fr 2fr 0.5fr ;
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