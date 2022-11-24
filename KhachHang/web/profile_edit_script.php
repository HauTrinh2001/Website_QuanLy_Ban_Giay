<?php
    require 'connection.php';
    session_start();
    
    $email = $_SESSION['email'];
    $query = "SELECT * FROM khachhang WHERE Email='$email'";
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    if (mysqli_num_rows($result) <> 0) {
        $hoten=$_POST['hoten'];
        if(isset($hoten)) {
            $result=mysqli_query($con,"update khachhang set HoTen='$hoten' where Email='$email'") or die(mysqli_error($con));
        }
        $taikhoan=$_POST['taikhoan'];
        if(isset($taikhoan)) {
            $result=mysqli_query($con,"update khachhang set TaiKhoan='$taikhoan' where Email='$email'") or die(mysqli_error($con));
        }
        $diachikh=$_POST['diachikh'];
        if(isset($diachikh)) {
            $result=mysqli_query($con,"update khachhang set DiaChiKH='$diachikh' where Email='$email'") or die(mysqli_error($con));
        }
        $dienthoaikh=$_POST['dienthoaikh'];
        if(isset($dienthoaikh)) {
            $result=mysqli_query($con,"update khachhang set DienThoaiKH='$dienthoaikh' where Email='$email'") or die(mysqli_error($con));
        }
        $ngaysinh=$_POST['ngaysinh'];
        if(isset($ngaysinh) and $ngaysinh != $row['NgaySinh'] and !(empty(trim($ngaysinh)) and $ngaysinh != 0)) {
            $result=mysqli_query($con,"update khachhang set NgaySinh='$ngaysinh' where Email='$email'") or die(mysqli_error($con));
        }
        $gioitinh=$_POST['gioitinh'];
        if(isset($gioitinh) and $gioitinh != $row['GioiTinh'] and !(empty(trim($gioitinh)) and $gioitinh != 0)) {
            $result=mysqli_query($con,"update khachhang set GioiTinh='$gioitinh' where Email='$email'") or die(mysqli_error($con));
        }
        $anhkh=$_POST['anhkh'];
        if(isset($anhkh) and $anhkh != $row['AnhKH'] and !(empty(trim($anhkh)) and $anhkh != 0)) {
            $result=mysqli_query($con,"update khachhang set AnhKH='$anhkh' where Email='$email'") or die(mysqli_error($con));
    }
        
?>
        <script>
            window.alert("Cập nhật thông tin thành công!");
        </script>
        <meta http-equiv="refresh" content="1;url=profileKH.php" />
<?php
    }
    
?>