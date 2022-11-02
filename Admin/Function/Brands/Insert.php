
<?php
include("../../Connect_DB/connect.php");
include("../../Function/Sup/Pageback.php");
$conn = mysqli_connect($servername, $usename, $pass, $dbname);
?> 

<?php


    if(isset($_POST['insertdata']))
    {   
        
        $I_TenTH = $_POST['I_TenTH'];
        $query = "insert into thuonghieu values (null,'$I_TenTH')";
        $query_run = mysqli_query($conn, $query);
      
        if($query_run)
        {
            echo '<script> alert("Thêm dữ liệu thành công!"); </script>';
            Page_Back();
            
          
        }
        else
        {
            echo '<script> alert("Dữ liệu chưa được thêm"); </script>';
        }
    }
?>