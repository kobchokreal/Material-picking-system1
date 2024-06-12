<style>
  table thead,
  tfoot {
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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>รายการวัสดุสำหรับเบิก</b>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead Bgcolor="#339933" style="color:#FFFFFF">
                    <tr align="center">
                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>รายละเอียด</th>
                      <th>ประเภทวัสดุ</th>
                      <th>จำนวนสต็อก</th>
                      <th>เบิก</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id) WHERE meter.met_total>='1' ";
                    $res = mysqli_query($con, $sql);
                    $runing = 1;
                    while ($row = mysqli_fetch_assoc($res)) {

                      $met_id = $row['met_id'];
                      $met_name = $row['met_name'];
                      $met_detail = $row['met_detail'];
                      $met_img = $row['met_img'];
                      $met_total = $row['met_total'];
                      $met_mtype = $row['met_mtype'];

                      $mtype_name = $row['mtype_name'];

                    ?>

                      <tr align="center">
                        <td><?= $runing++; ?></td>
                        <td><img src="<?= $met_img; ?>" width="90"></td>
                        <td Bgcolor="#FFEBCD"><?= $met_name; ?></td>
                        <td><?= $met_detail; ?></td>
                        <td><?= $mtype_name; ?></td>
                        <td Bgcolor="#CCFFFF" style="color:red"><?= $met_total; ?></td>
                        <td>
                          <a href="index.php?Node=drawmat&MATID=<?= $met_id; ?>" onclick="if(confirm('คุณต้องการเบิกรายการนี้ใช่ไหม?')) return true; else return false;">เบิก</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>รายละเอียด</th>
                      <th>ประเภทวัสดุ</th>
                      <th>จำนวนสต็อก</th>
                      <th>เบิก</th>
                    </tr>
                  </tfoot>
                </table>
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
  </section>
  <!-- /.content -->

</div>