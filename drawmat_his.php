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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b> ประวัติการเบิกวัสดุ</b>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead Bgcolor="#339933" style="color:#FFFFFF">
                    <tr>
                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวนที่เบิก</th>
                      <th>ผู้เบิก/วันเบิก</th>
                      <th>ผู้อนุมัติ/วันอนุมัติ</th>
                      <th>สถานะ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT md1.*,md2.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw md1
LEFT OUTER JOIN meter md2 ON (md1.draw_metid=md2.met_id)
LEFT OUTER JOIN member m1 ON (md1.draw_userid_draw=m1.mem_id)
LEFT OUTER JOIN member m2 ON (md1.draw_userid_app=m2.mem_id)
WHERE md1.draw_userid_draw='$memid' ";
                    $res = mysqli_query($con, $sql);
                    $runing = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                      $draw_id = $row['draw_id'];
                      $draw_date = $row['draw_date'];
                      $draw_num = $row['draw_num'];
                      $draw_metid = $row['draw_metid'];
                      $draw_userid_draw = $row['draw_userid_draw'];
                      $draw_userid_app = $row['draw_userid_app'];
                      $draw_date_app = $row['draw_date_app'];
                      $draw_status = $row['draw_status'];

                      $met_img = $row['met_img'];
                      $met_name = $row['met_name'];

                      $name1draw = $row['name1'];
                      $name2app = $row['name2'];

                      if ($draw_status == '0') {
                        $staname = "<font color='red'>รอรับวัสดุ</font>";
                      } else {
                        $staname = "<font color='green'>รับวัสดุแล้ว</font>";
                      }

                    ?>

                      <tr>
                        <td><?= $runing++; ?></td>
                        <td><img src="<?= $met_img; ?>" width="90"></td>
                        <td Bgcolor="#FFEBCD"><?= $met_name; ?></td>
                        <td Bgcolor="#CCFFFF"><?= $draw_num; ?></td>
                        <td>
                          <?= $name1draw; ?><br>
                          (<?= $draw_date; ?>)
                        </td>
                        <td>
                          <?php if ($draw_status == '0') {
                            echo "รออนุมัติ";
                          } else { ?>
                            <?= $name2app; ?><br>
                            (<?= $draw_date_app; ?>)
                          <?php } ?>
                        </td>
                        <td><?= $staname; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวนที่เบิก</th>
                      <th>ผู้เบิก/วันเบิก</th>
                      <th>ผู้อนุมัติ/วันอนุมัติ</th>
                      <th>สถานะ</th>
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