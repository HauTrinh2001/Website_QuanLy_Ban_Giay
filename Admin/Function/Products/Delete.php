
<?php
include("../../Connect_DB/connect.php");
include("../../Function/Sup/Pageback.php");

$conn = mysqli_connect($servername, $usename, $pass, $dbname);

if(isset($_POST['deletedata']))
{
    $id = $_POST['D_MaTH'];

    $query = "DELETE FROM ThuongHieu WHERE MaTH='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Xoá dữ liệu thành công"); </script>';
        Page_Back();
    }
    else
    {
        echo '<script> alert("Chưa xoá"); </script>';
    }
}

?>