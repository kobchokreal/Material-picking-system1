<?php include_once("lib/condb.php");
?>
<?php
if(isset($_GET['act'])){
	if($_GET['act']== 'excel'){
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=export.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Report Total</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="print.css" media="print">
        <link rel="icon" type="image/x-icon" href="img/KSB.ico">
        <!-- Tempusdominus Bootstrap 4 -->

        <link rel="stylesheet" href="print.css" media="print">
        <link rel="icon" type="image/x-icon" href="img/KSB.ico">
        <!-- Tempusdominus Bootstrap 4 -->

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }
            #filters {
                font-size: 30px;
                margin-left: 35%;
                margin-top: 10%;
                margin-bottom: 6%;
            }
            .card-body {
                text-align: right;

            }
        </style>
    </head>
    <body>
        <div id="filters">
            <span>
                <u>สรุปผลจำนวนวัสดุทั้งหมด</u>
            </span>
        </div>
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
        <?php
            }
            ?>
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <section class="content">
                <div class="container">
                <div align="right">
                                    <button
                                        type="button"
                                        name="button"
                                        id="print"
                                        onclick="window.print();"
                                        class="btn btn-sm btn-primary">พิมพ์รายงาน
                                    </button>
                                </div>
                                <br>

                                <div align="right">
                                    <a href="?act=excel">
                                        <button type="button" name="button" id="print" class="btn btn-sm btn-success">Creat Excel
                                        </button>
                                    </a>
                                </div><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <?php
                                    $sql = " SELECT SUM(met_total) AS met_total  FROM meter ";
                                    $q = mysqli_query( $con, $sql );
                                    while ($f = mysqli_fetch_assoc( $q )){
                                    $sum_price=$f['met_total'];
                                    ?>
                                <?php
                                    }
                                    ?>
                                <div class="card-body">
                                    <b>จำนวนวัสดุทั้งหมด :
                                        <?=number_format($sum_price)?>
                                        ชิ้น</b>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ลำดับ</th>
                                                    <th width="30%">ชื่อวัสดุ</th>
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
                                                    
                                                    $met_name=$row['met_name'];
                                                    $met_detail=$row['met_detail'];
                                                    $met_total=$row['met_total'];
                                                    
                                                    $mtype_name=$row['mtype_name'];
                                                    ?>
                                                <style>
                                                    tr {
                                                        text-align: center;
                                                    }
                                                </style>
                                                <tr>
                                                    <td width="1%"><?=$runing++;?></td>
                                                    <td width="29%"><?=$met_name;?></td>
                                                    <td width="15%"><?=number_format($met_total)?></td>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                                ?>
                                        </tbody>
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
</body>
</html>