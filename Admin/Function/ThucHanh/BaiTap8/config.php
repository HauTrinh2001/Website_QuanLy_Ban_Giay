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
    $fullname = $address = $phone = $gender = $country  = $PHPandMySQL = $ASPNet = $CCNA = $Security = $note = "";
   
    if(isset($_POST["fullname"])) {
        $fullname = $_POST["fullname"];
    }
    if(isset($_POST["address"])) {
        $address = $_POST["address"];
    } if(isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    } if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } 
    if(isset($_POST["PHPandMySQL"])) {
        $PHPandMySQL = $_POST["PHPandMySQL"];
    } if(isset($_POST["ASPNet"])) {
        $ASPNet = $_POST["ASPNet"];
    } if(isset($_POST["CCNA"])) {
        $CCNA = $_POST["CCNA"];
    } if(isset($_POST["Security"])) {
        $Security = $_POST["Security"];
    } if(isset($_POST["note"])) {
        $note = $_POST["note"];
    }
    if(isset($_POST["country"])) {
        $country = $_POST["country"];

    }


?>



    <h1>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn đã nhập</h1>
    <p>Họ tên :<?php echo $fullname ?></p>
    <p>Địa chỉ :<?php echo $address ?></p>
    <p>Phone :<?php echo $phone ?></p>
    <p>Gender :<?php echo $gender ?></p>
    <p>Country :<?php echo $country  ?></p>
    <p>Note :<?php echo $note ?></p>
</body>
</html>