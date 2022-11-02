
<?php
include("../../Connect_DB/connect.php");
include("../../Function/Sup/Pageback.php");
$conn = mysqli_connect($servername, $usename, $pass, $dbname);
?> 
<?php

if (isset($_POST['searchdata'])) {

    $str = $_POST['str'];
    $query = "select * from thuonghieu where TenTH like '%$str%' or MaTH like '%$str%' ";
    Page_Back();
}
?>