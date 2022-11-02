<?php
include("./Function/Manager/Check_login.php");
?>
<?php
//phân trang
$limit = 10;
if (!isset($_GET['trang'])) {
    $_GET['trang'] = 1;
}
$tv = "select count(*) as total from Giay";
$tv_1 = mysqli_query($conn, $tv);
$tv_2 = mysqli_fetch_array($tv_1);
$total_records = $tv_2['total'];
$so_trang = ceil($total_records  / $limit);
$start = ($_GET['trang'] - 1) * $limit;
$current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
if ($current_page > $so_trang) {
    $current_page = $so_trang;
} else if ($current_page < 1) {
    $current_page = 1;
}
$query = "";
$query = "SELECT * FROM Giay order by MaGiay limit $start,$limit";
if (isset($_POST['searchdata'])) {

    $str = $_POST['str'];
    $query = "select * from Giay where TenGiay like '%$str%' ";
}

$query_run = mysqli_query($conn, $query);

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

<!-- ADD  -->
<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="Label_Add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_Add">Thêm mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Function/Products/Insert.php" method="post">
                    <div class="form-group">
                        <label for="TenGiay">Tên sản phẩm</label>
                        <input required value="" required type="text" name="I_TenGiay" class="form-control" id="I_TenGiay" placeholder="Nhập tên sản phẩm">

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="reset" name="reset" class="btn btn-warning">Xoá dữ liệu</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END ADD  -->



<div class="container-fluid ">

    <div class="card p-3">
        <h2 class="font-weight-bold text-center"> QUẢN LÍ SẢN PHẨM </h2>
    </div>

    <div class="card">
        <div class="card-body d-flex flex-row justify-content-between align-items-center">

            <button type="button" class="btn btn-primary p-3" data-bs-toggle="modal" data-bs-target="#addmodal">
                <i class="bi bi-plus-lg"></i>Thêm mới
            </button>
            <div class="search-bar">
                <form class="search-form d-flex" method="POST">
                    <input class="form-control" type="text" name="str" value="<?php if (isset($str)) echo $str; ?>" placeholder="Tìm kiếm" title="Nhập từ khoá !">
                    <button name="searchdata" class="btn btn-primary " type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div>
                <h6 class="font-weight-bold text-center">
                <?php if(isset($_POST["searchdata"])) { 
                    if($str == "") {
                        echo "";
                    }
                    else {
                        if(mysqli_num_rows($query_run) > 0 ) {
                            echo "Có " .mysqli_num_rows($query_run) ." kết quả được tìm thấy !";
                    }
                    
                    else {
                        echo "Không tìm thâý kết quả nào !";
                    }
                    }
                  
                }  ?>
                </h6>
            </div>
            <?php



            $index = 1;
            ?>
            <table id="data-table" class="table table-bordered table-secondary table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th> Mã</th>
                        <th>Tên sản phẩm</th>
                        <th> Chức năng </th>
                    </tr>
                </thead>
                <?php
                if ($query_run) {
                    foreach ($query_run as $row) {
                ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $index;
                                        $index++; ?></td>
                                <td> <?php echo $row['MaGiay']; ?></td>
                                <td> <?php echo $row['TenGiay']; ?> </td>
                                <td>
                                    <!-- DETAIL  -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_Detail<?php echo $row['MaGiay']; ?>">
                                        Chi tiết
                                    </button> |
                                    <div class="modal fade" id="Modal_Detail<?php echo $row['MaGiay']; ?>" tabindex="-1" aria-labelledby="LabelModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg ">
                                            <!-- modal-xl -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="LabelModal">Chi tiết</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <div class="form-group">
                                                            <p> Mã sản phẩm <?php echo $row['MaGiay']; ?></p>
                                                            <p> Tên sản phẩm <?php echo $row['TenGiay']; ?></p>

                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END-DETAIL  -->


                                    <!-- EDIT  -->

                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['MaGiay']; ?>">
                                        Sửa
                                    </button> |

                                    <div class="modal fade" id="ModalEdit<?php echo $row['MaGiay']; ?>" tabindex="-1" aria-labelledby="Label_Edit" aria-hidden="true">
                                        <div class="modal-dialog modal-lg ">
                                            <!-- modal-xl -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="Label_Edit">Sửa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="./Function/Products/Edit.php" method="post">

                                                        <input type="hidden" name="MaGiay" id="MaGiay" value="<?php echo $row['MaGiay']; ?>">

                                                        <div class="form-group">
                                                            <label> Tên sản phẩm </label>
                                                            <input required value="<?php echo $row['TenGiay']; ?>" type="text" name="TenGiay" id="TenGiay" class="form-control" placeholder="Nhập tên sản phẩm ">
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" name="updatedata" class="btn btn-primary">Cập nhật</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END-EDITL  -->


                                    <!-- DELETE  -->

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['MaGiay']; ?>">
                                        Xoá
                                    </button>
                                    <div class="modal fade" id="ModalDelete<?php echo $row['MaGiay']; ?>" tabindex="-1" aria-labelledby="Label_Edit" aria-hidden="true">
                                        <div class="modal-dialog modal-lg ">
                                            <!-- modal-xl -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="Label_Edit">Xoá</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="./Function/Products/Delete.php" method="post">

                                                        <input type="hidden" name="D_MaGiay" id="D_MaGiay" value="<?php echo $row['MaGiay']; ?>">

                                                        <div class="form-group">
                                                            <label>Bạn có chắc muốn xoá sản phẩm<?php echo $row['TenGiay'] . " không ?"; ?></label>
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" name="deletedata" class="btn btn-primary">Xoá</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END-DELETE  -->

                                </td>
                            </tr>
                        </tbody>
                <?php
                    }
                } else {
                    echo "Truy vấn lỗi";
                }
                ?>
            </table>
        </div>
        <div class="container">
            <ul class="pagination justify-content-center">
                <?php
                if ($current_page > 1 && $so_trang > 1) {
                    echo '<a  class="page-link" href="?thamso=giay&trang=' . ($current_page - 1) . '">Trước</a>';
                }
                for ($i = 1; $i <= $so_trang; $i++) {
                    $link_phan_trang = "?thamso=giay&trang=" . $i;
                    if ($i == $current_page) {
                        echo '<span class="page-link active">' . $i . '</span> ';
                    } else {
                        echo "<a class='page-link' href='$link_phan_trang' >";
                        echo $i;
                        echo "</a> ";
                    }
                }
                if ($current_page < $so_trang && $so_trang > 1) {
                    echo '<a class="page-link" href="?thamso=giay&trang=' . ($current_page + 1) . '">Sau</a>';
                }
                ?>

            </ul>
        </div>
    </div>






</div>