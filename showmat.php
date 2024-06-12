<link rel="stylesheet" href="print.css" media="print">

<?php

if (isset($_GET['MATID'])) {

  $MATID = $_GET['MATID'];

  $sql = "DELETE FROM meter WHERE met_id='$MATID' ";
  $res = mysqli_query($con, $sql);

  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=smat">';
  exit;
}

?>
<style>
  table thead {
    background-color: #333333;
    color: white;
  }

  tr th {
    text-align: center;

  }

  td {
    text-align: center;
  }
</style>
<div class="content-wrapper">
  <br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b> จัดการข้อมูลวัสดุ</b>
                <a href="index.php?Node=amat">[เพิ่มวัสดุ]</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead Bgcolor="#339933" style="color:#FFFFFF">
                    <tr >

                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>บาร์โค้ดสินค้า</th>
                      <th width="9%">รหัสวัสดุ</th>
                      <th width="10%">ชื่อวัสดุ</th>
                      <th>รายละเอียด</th>
                      <th width="16%">จำนวนที่มีอยู่/ชิ้น</th>
                      <th width="14%">ราคาทุน/บาท</th>
                      <th width="12%">ราคารวม/บาท</th>
                      <th width="8%">ประเภทวัสดุ</th>
                      <th>
                        <div class="none">ลบรายการ</div>
                      </th>
                      <th>
                        <div class="none">แก้ไขรายการ</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)";
                    $res = mysqli_query($con, $sql);
                    $runing = 1;
                    $runing_id = 1001;
                    $sum_total = 0;
                    while ($row = mysqli_fetch_assoc($res)) {
                      $met_id = $row['met_id'];
                      $met_name = $row['met_name'];
                      $met_detail = $row['met_detail'];
                      $met_img = $row['met_img'];
                      $met_total = $row['met_total'];
                      $met_price = $row['met_price'];
                      $met_barcode = $row['met_barcode'];
                      $met_mtype = $row['met_mtype'];
                      $mtype_name = $row['mtype_name'];

                      $totalprice_curent = $met_total * $met_price; //จำนวนสินค้า*ราคาทุนของสินค้า = ราคาวัสดุ
                      $sum_total = $sum_total + ($met_price * $met_total); //สมการหายอดราคารวมทั้งหมดของราคาวัสดุ

                    ?>
                      <tr >
                        <td><?= $runing++; ?></td>
                        <td><img src="<?= $met_img; ?>" width="90"></td>
                        <td><?= $met_barcode; ?></td>
                        <td><?= $runing_id++; ?></td>
                        <td Bgcolor="#FFEBCD"><?= $met_name; ?></td>
                        <td><?= $met_detail; ?></td>
                        <td Bgcolor="#CCFFFF"><?= number_format($met_total); ?></td>
                        <td Bgcolor="#FFFFCC"><?= number_format($met_price, 2); ?></td>
                        <td Bgcolor="#FFCCFF"><?= number_format($totalprice_curent, 2); ?></td>
                        <td width="15%"><?= $mtype_name; ?></td>

                        <td>
                          <div class="none">
                            <h4><a href="index.php?Node=smat&MATID=<?= $met_id; ?>" class="badge badge-danger" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบรายการ</a></h4>
                          </div>
                        </td>
                        <td>
                          <div class="none">
                            <h4><a href="index.php?Node=emat&MATID=<?= $met_id; ?>" class="badge badge-warning" onclick="if(confirm('คุณต้องการแก้ไขรายการนี้ใช่ไหม?')) return true; else return false;">แก้ไขรายการ</a>
                            </h4>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                    <?php
                    ?>
                </table>
              </div>
              </tr>
              </h3>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
