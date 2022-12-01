<?php
include("./Function/Manager/Check_login.php");
include("./Function/Sup/Success.php");
include("./Function/Statistical/Handle.php");
?>






<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



<h1>Thống kê</h1>
<div class="container-fluid ">
  <div id="chart"></div>
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete">
    Chi tiết
  </button>
  <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="Label_Edit" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <!-- modal-xl -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Label_Edit">Chi tiết</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <table id="data-table1" class="table table-bordered table-secondary table-hover display">
            
            <thead class="thead-dark">
           
                <th>Tháng</th>
                <th>Tổng đơn hàng</th>
                <th>Doanh thu</th>
                <th>Tổng sản phẩm bán</th>
              
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result_detail)) { ?>
                <tr>
                  <td><?php echo $row["thang"] ?></td>
                  <td><?php echo $row["donhang"] ?></td>
                 
                  <td> <?php echo number_format($row["tienban"], 0, ',', '.'); ?> đồng</td>
                  <td><?php echo $row["soluong"] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
         

        </div>
        <div class="modal-footer">
          <a class="btn btn-secondary" href="./Function/Statistical/excel.php"> Xuất Excel</a> 
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  Morris.Bar({
    element: 'chart',
    data: [<?php echo $chart_data; ?>],
    xkey: 'thang',
    ykeys: ['doanhthu'],
    labels: ['Doanh thu'],
    hideHover: 'auto',
    stacked: true
  });
</script>

<style>
  #data-table1 thead th {
    background: black;
    color: #fff;
  }
</style>