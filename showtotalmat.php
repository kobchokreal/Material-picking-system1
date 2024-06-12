<link rel="stylesheet" href="print.css" media="print">
<div class="content-wrapper">
<br>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <b>รายงานข้อมูลวัสดุคงเหลือ</b>
                </h3>
                <a target="_blank" href="detail_totalmat.php"> <button class="btn  btn-primary float-right ">พิมพ์</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead Bgcolor = "#339933"  style="color:#FFFFFF">
                  <tr align="center">
                    <th width="5%">ลำดับ</th>
                    <th width="10%">รูปภาพ</th>
                    <th width="30%">ชื่อวัสดุ</th>
                    <th width="35%">รายละเอียด</th>
                    <th width="20%">จำนวนคงเหลือ</th>                  
                  </tr>
                  </thead>
                  <tbody>
<?php
$sql="SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)";
$res=mysqli_query($con,$sql);
$runing=1;
while ($row=mysqli_fetch_assoc($res)) {
  $met_id=$row['met_id'];
  $met_name=$row['met_name'];
  $met_detail=$row['met_detail'];
  $met_img=$row['met_img'];
  $met_total=$row['met_total'];
  $met_mtype=$row['met_mtype'];
 
  $mtype_name=$row['mtype_name'];

?>

                  <tr align="center">
                    <td><?=$runing++;?></td>
                    <td><img src="<?=$met_img;?>" width="90"></td>
                    <td Bgcolor = "#FFEBCD"><?=$met_name;?></td>
                    <td><?=$met_detail;?></td>
                    

                    <td>
    <?php if($met_total<='2'){ ?>
      <b><font color="red" size="5"><?=($met_total);?></font></b>
      <br> <b><font color="red">สินค้าเหลือน้อย!</font></b>
    <?php } else { ?>
      <b><font color="blue" size="5"><?=number_format($met_total);?></font></b>
    <?php } ?>
                    </td>

                  </tr>
<?php } ?>

                  </tbody>
                </table>
                    </button>
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