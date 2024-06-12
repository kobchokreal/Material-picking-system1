<?php
if (isset($_POST['btsave'])) {

  $mem_name = $_POST['mem_name'];
  $mem_mobile = $_POST['mem_mobile'];
  $mem_user = $_POST['mem_user'];
  $mem_pass = $_POST['mem_pass'];
  $mem_dept = $_POST['mem_dept'];
  $mem_level = $_POST['mem_level'];

  $chk_pic = $_FILES['mem_img']['name'];

  if ($chk_pic <> "") {
    move_uploaded_file($_FILES["mem_img"]["tmp_name"], "img/" . $_FILES["mem_img"]["name"]);
    $mem_img = "img/" . $_FILES["mem_img"]["name"];
  } else {
    $mem_img = '';
  }

  $sql = "INSERT INTO member (mem_id, mem_name, mem_img, mem_mobile, mem_user, mem_pass, mem_level, mem_dept) VALUES ('','$mem_name','$mem_img','$mem_mobile','$mem_user','$mem_pass','$mem_level','$mem_dept')";

  $res = mysqli_query($con, $sql);

  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
  exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form action="index.php?Node=addmem" method="POST" enctype="multipart/form-data">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-11">
          <div class="card card-primary">
            <div class="card-header">
              <h1 class="card-title">กรุณากรอกข้อมูลผู้ใช้งาน</h1>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">ชื่อ-สกุล</label>
                <input type="text" id="inputName" class="form-control" name="mem_name" required="">
              </div>
              <div class="form-group">
                <label for="inputName">เบอร์โทร</label>
                <input type="text" id="inputName" class="form-control" name="mem_mobile" required="">
              </div>
              <div class="form-group">
                <label for="inputName">Username</label>
                <input type="text" id="inputName" class="form-control" name="mem_user" required="">
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input type="text" id="inputName" class="form-control" name="mem_pass" required="">
              </div>
              <div class="form-group">
                <label for="inputStatus">แผนก</label>
                <select id="inputStatus" name="mem_dept" class="form-control custom-select" required="">
                  <option selected disabled>กรุณาเลือกรายการ</option>
                  <?php
                  $sql = "SELECT * FROM department";
                  $res = mysqli_query($con, $sql);
                  while ($row = mysqli_fetch_assoc($res)) {
                    $dept_id = $row['dept_id'];
                    $dept_name = $row['dept_name'];
                  ?>
                    <option value="<?= $dept_id; ?>"><?= $dept_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">สิทธิ์การใช้งาน</label>
                <select id="inputStatus" name="mem_level" class="form-control custom-select" required="">
                  <option selected disabled>กรุณาเลือกรายการ</option>
                  <option value="1">ผู้ดูแลระบบ</option>
                  <option value="2">ผู้ใช้งานทั่วไป</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">รูปภาพ</label>
                <input type="file" id="inputName" class="form-control" name="mem_img" required="">
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
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->