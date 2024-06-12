<?php
if (isset($_POST['btsave'])) {

  $met_barcode = $_POST['met_barcode'];
  $met_name = $_POST['met_name'];
  $met_detail = $_POST['met_detail'];
  $met_total = $_POST['met_total'];
  $met_price = $_POST['met_price'];
  $met_mtype = $_POST['met_mtype'];



  $chk_pic = $_FILES['met_img']['name'];

  if ($chk_pic <> "") {
    move_uploaded_file($_FILES["met_img"]["tmp_name"], "matpic/" . $_FILES["met_img"]["name"]);
    $met_img = "matpic/" . $_FILES["met_img"]["name"];
  } else {
    $met_img = '';
  }

  $sql = "INSERT INTO meter ";
  $sql .= "(met_id, met_name, met_detail, met_img, met_total, met_mtype, met_price, met_barcode)";
  $sql .= " VALUES ";
  $sql .= "('','$met_name','$met_detail','$met_img','$met_total','$met_mtype','$met_price','$met_barcode')";

  $res = mysqli_query($con, $sql);

  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=smat">';
  exit;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <form action="index.php?Node=amat" method="POST" enctype="multipart/form-data">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-11">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">กรุณากรอกข้อมูลวัสดุ</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">บาร์โค้ดสินค้า</label>
                <input type="number" id="inputName" class="form-control" name="met_barcode" required="" placeholder="กรอกข้อมูล">
              </div>
              <div class="form-group">
                <label for="inputName">ชื่อวัสดุ</label>
                <input type="text" id="inputName" class="form-control" name="met_name" required="" placeholder="กรอกข้อมูล">
              </div>
              <div class="form-group">
                <label for="inputName">รายละเอียด</label>
                <input type="text" id="inputName" class="form-control" name="met_detail" required="" placeholder="กรอกข้อมูล">
              </div>
              <div class="form-group">
                <label for="inputName">จำนวน</label>
                <input type="number" id="inputName" min="0" max="99999" class="form-control" name="met_total" required="" placeholder="กรอกข้อมูล">
              </div>
              <div class="form-group">
                <label for="inputName">ราคาทุนวัสดุ</label>
                <input type="number" id="inputName" min="0" max="99999" step="0.1" name="met_price" class="form-control" autocomplete="off" placeholder="0.00">
              </div>
              <div class="form-group">
                <label for="inputStatus">ประเภทวัสดุ</label>
                <select id="inputStatus" name="met_mtype" class="form-control custom-select" required="">
                  <option selected disabled>กรุณาเลือกรายการ</option>
                  <?php
                  $sql = "SELECT * FROM metertype";
                  $res = mysqli_query($con, $sql);
                  while ($row = mysqli_fetch_assoc($res)) {
                    $mtype_id = $row['mtype_id'];
                    $mtype_name = $row['mtype_name'];
                  ?>
                    <option value="<?= $mtype_id; ?>"><?= $mtype_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">รูปภาพ</label>
                <input type="file" id="inputName" class="form-control" name="met_img" required="">
              </div>
              <div class="row">
                <div class="col-2">
                  <input type="submit" value="บันทึกรายการ" class="btn btn-primary btn-lg btn-block" name="btsave">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  </form>
  <br>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->