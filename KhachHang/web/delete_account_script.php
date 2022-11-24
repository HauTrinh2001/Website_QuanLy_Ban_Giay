<?php
    require 'connection.php';
    session_start();
    $email = $_SESSION['email'];
    $query = "DELETE FROM khachhang WHERE Email='$email'";
    $result = mysqli_query($con, $query);
    if ($result) {
        
        ?>
        <script>
            window.alert("Xóa tài khoản thành công!");
        </script>
        <?php
        session_unset();
        session_destroy();
        ?>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    }
    else {
        ?>
        <script>
            window.alert("Không thể xóa tài khoản!");
        </script>
        <?php
    }
?>