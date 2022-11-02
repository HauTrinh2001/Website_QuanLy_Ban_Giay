
<?php
include("../../Connect_DB/connect.php");
include("../../Function/Sup/Pageback.php");
$conn = mysqli_connect($servername, $usename, $pass, $dbname);
?> 

<?php
    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['MaTH'];
        $TenTH = $_POST['TenTH'];

        $query = "UPDATE ThuongHieu SET TenTH='$TenTH'  WHERE MaTH='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Cập nhật dữ liệu thành công!"); </script>';
            Page_Back();
          
        }
        else
        {
            echo '<script> alert("Dữ liệu chưa được cập nhật"); </script>';
        }
    }
?>