<?php
if(isset($_GET['MATID'])){
$MATID=$_GET['MATID'];
$sql="SELECT * FROM meter WHERE met_id='$MATID' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
  $met_id=$row['met_id'];
  $met_name=$row['met_name'];
  $met_detail=$row['met_detail'];
  $met_img=$row['met_img'];
  $met_total=$row['met_total'];
  $met_mtype=$row['met_mtype'];
}
?>


<?php
date_default_timezone_set("Asia/Bangkok");
if(isset($_POST['btsave'])){
$met_id=$_POST['met_id'];
$draw_num=$_POST['draw_num'];
$draw_date=date("d-m-Y ");

$sql1="SELECT * FROM meter WHERE met_id='$met_id' ";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($res1);
$met_total=$row1['met_total'];

$total_curent=$met_total-$draw_num;


$sql2="INSERT INTO `meterdraw`(`draw_id`, `draw_date`, `draw_num`, `draw_metid`, `draw_userid_draw`, `draw_userid_app`, `draw_date_app`, `draw_status`) VALUES ('','$draw_date','$draw_num','$met_id','$memid','','','0')";
$res2=mysqli_query($con,$sql2);


$sql3="UPDATE meter SET met_total='$total_curent' WHERE met_id='$met_id' ";
$res3=mysqli_query($con,$sql3);



echo '<meta http-equiv="refresh" content="0; url=index.php?Node=dmat_his">';
exit;

}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <b> <h1>เบิกวัสดุ</h1></b>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<form action="index.php?Node=drawmat" method="POST" enctype="multipart/form-data">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">กรุณากรอกข้อมูลการเบิก</h3>
            </div>
            <div class="card-body">

<input type="hidden" name="met_id" value="<?=$met_id;?>">
<img src="<?=$met_img;?>" width="200"><br><br>
<font size="4">
ชื่อวัสดุ: <?=$met_name;?><br>
รายละเอียด: <?=$met_detail;?><br>
จำนวนสต็อกปัจจุบัน: <font size="5" color="blue"> <?=$met_total;?></font> หน่วย<br>

<div class="form-group">
  <label for="inputName">จำนวนที่ต้องการเบิก <font color="red">(โปรดระบุจำนวนการเบิกไม่เกินที่มีในสต็อก)</font></label>
  <input type="number" id="inputName" class="form-control" name="draw_num" value="1">
</div>
</font>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <input type="submit" value="ส่งเบิก" class="btn btn-success float-right" name="btsave">
        </div>
      </div>
    </section>

</form>

    <br>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->