<style>
    .mid-grid-left {
        display: none;
    }
</style>
<!DOCTYPE html>
<html>
<?php include("Layout_KhachHang_Header.php"); ?>

<head>
    <title>Xem ví dụ</title>
    <style type="text/css">
        table,
        th,
        td {
            border: 1px solid #868585;

        }

        table {
            border-collapse: collapse;

            width: 80%;
            margin: 0 auto;

        }

        th,
        td {
            text-align: center;
            padding: 10px;
        }

        table tr:nth-child(odd) {
            background-color: #eee;
        }

        table tr:nth-child(even) {
            background-color: white;
        }

        table tr:nth-child(1) {
            background-color: skyblue;
        }
    </style>
</head>

<body>
    <br>
    <h1 style="color:black;text-align:center">THÔNG TIN</h1>
    <BR>
    <table>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Mã số sinh viên</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Trịnh Minh Hậu</td>
            <td>61133622</td>
            <td>Nam</td>
            <td>Ninh Hòa</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Lê Như Của</td>
            <td>61133452</td>
            <td>Nam</td>
            <td>Ninh Hòa</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Nguyễn Ngọc Hồng Hân</td>
            <td>61132924</td>
            <td>Nữ</td>
            <td>Nha Trang</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Dương Quốc Phong</td>
            <td>61130851</td>
            <td>Nam</td>
            <td>Diên Khánh</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Hồ Anh Nam</td>
            <td>611133984</td>
            <td>Nam</td>
            <td>Ninh Hòa</td>
        </tr>
    </table>
    <br>
</body>
<?php include("Layout_KhachHang_Footer.php"); ?>

</html>