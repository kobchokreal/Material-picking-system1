<link rel="stylesheet" href="print.css" media="print">

<?php
$NUMMEM = 0;
$sql_count_mem = "SELECT COUNT(*) AS NUMMEM FROM member";
$res_count_mem = mysqli_query($con, $sql_count_mem);
$row_count_mem = mysqli_fetch_assoc($res_count_mem);
$NUMMEM += $row_count_mem['NUMMEM'];

$NUMMAT = 0;
$sql_count_mat = "SELECT COUNT(*) AS NUMMAT FROM meter";
$res_count_mat = mysqli_query($con, $sql_count_mat);
$row_count_mat = mysqli_fetch_assoc($res_count_mat);
$NUMMAT += $row_count_mat['NUMMAT'];

$NUMDRAW1 = 0;
$sql_count_draw1 = "SELECT COUNT(*) AS NUMDRAW1 FROM meterdraw WHERE draw_status='0' ";
$res_count_draw1 = mysqli_query($con, $sql_count_draw1);
$row_count_draw1 = mysqli_fetch_assoc($res_count_draw1);
$NUMDRAW1 += $row_count_draw1['NUMDRAW1'];


$NUMDRAW2 = 0;
$sql_count_draw2 = "SELECT COUNT(*) AS NUMDRAW2 FROM meterdraw WHERE draw_status='1' ";
$res_count_draw2 = mysqli_query($con, $sql_count_draw2);
$row_count_draw2 = mysqli_fetch_assoc($res_count_draw2);
$NUMDRAW2 += $row_count_draw2['NUMDRAW2'];
?>
<style>
    .background {
        background-color: rgba(0, 0, 0, 0.2);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $NUMMEM; ?></h3>
                            <b>
                                <p>สมาชิก</p>
                            </b>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= $NUMMAT; ?></h3>
                            <b>
                                <p>รายการวัสดุ</p>
                            </b>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $NUMDRAW1; ?></h3>
                            <b>
                                <p>รออนุมัติ</p>
                            </b>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $NUMDRAW2; ?></h3>
                            <b>
                                <p>อนุมัติแล้ว</p>
                            </b>
                        </div>
                        <div class="icon">

                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
            </div>
            <!-- /.row -->
            <?php
            if (isOnline()) {
                if ($mem_level <> '1') { ?>
                    <!-- ข้อมูลกราฟแสดงผลข้อมูล-->
                    <html>

                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google
                                .charts
                                .load("current", {
                                    packages: ["corechart"]
                                });
                            google
                                .charts
                                .setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google
                                    .visualization
                                    .arrayToDataTable([
                                        [
                                            'Language', 'Speakers (in millions)'
                                        ],
                                        [
                                            'รออนุมัติ', <?= $NUMDRAW1; ?>
                                        ],
                                        ['อนุมัติแล้ว',
                                            <?= $NUMDRAW2; ?>
                                        ],
                                        ['รายการวัสดุ',
                                            <?= $NUMMAT; ?>
                                        ]
                                    ]);
                                var options = {
                                    title: 'สถานะการเบิกวัสดุ ณ ปัจจุบัน '
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </head>
                    <center>
                        <!-- การจัดรูปแบบของกราฟ-->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="table-responsive">
                                                    <div id="piechart" style=" width: 330px; height: 300px;"></div>
                    </center>

        </div>
</div>
<!-- /.card-header -->

<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>

</html>
<center>
    <font size="4.5">

        ----------------------------------------------------<br>
        ระบบจัดการวัสดุสำนักงานออนไลน์
    </font>
</center>
<?php } ?>
<?php } else { ?>

<?php } ?>

<!-- Write your comments here ส่วนโชว์หน้าแดชบอร์ดจำนวนคงเหลือวัสดุ-->
<?php if (isOnline()) { ?>
    <?php
    if (isAdmin($_SESSION['usr'], $_SESSION['pwd'], $con)) {
    ?>
        <?php
        if (isset($_GET['DcancelID'])) {

            $DcancelID = $_GET['DcancelID'];

            $sql = "DELETE FROM meterdraw WHERE draw_id='$DcancelID' ";
            $res = mysqli_query($con, $sql);

            echo '<meta http-equiv="refresh" content="0; url=index.php?Node=dmat_manage">';
            exit;
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    จัดการข้อมูลการเบิกวัสดุ
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- style table  -->
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th>ชื่อวัสดุ</th>
                                                <th>จำนวนที่เบิก</th>
                                                <th>ผู้เบิก/วันเบิก</th>
                                                <th>ผู้อนุมัติ/วันอนุมัติ</th>
                                                <th>สถานะ</th>
                                                <th>ยกเลิก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT md1.*,md2.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw md1
LEFT OUTER JOIN meter md2 ON (md1.draw_metid=md2.met_id)
LEFT OUTER JOIN member m1 ON (md1.draw_userid_draw=m1.mem_id)
LEFT OUTER JOIN member m2 ON (md1.draw_userid_app=m2.mem_id)
order by md1.draw_status ASC ";
                                            $res = mysqli_query($con, $sql);
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
                                            ?>
                                                <tr>
                                                    <td><img src="<?= $met_img; ?>" width="60"></td>
                                                    <td bgcolor="#FFEBCD"><?= $met_name; ?></td>
                                                    <td bgcolor="#CCFFFF"><?= $draw_num; ?></td>
                                                    <td>
                                                        <?= $name1draw; ?><br>
                                                        <font color="blue">(<?= $draw_date; ?>)
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <?php if ($draw_status == '0') {
                                                            echo "<font color = red>รออนุมัติ</font>";
                                                        } else { ?>
                                                            <?= $name2app; ?><br>
                                                            <font color="green">(<?= $draw_date_app; ?>)
                                                            </font>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($draw_status == '0') { ?>
                                                            <div class="none">
                                                                <a href="index.php?Node=dmat_manage&DID=<?= $draw_id; ?>" onclick="if(confirm('ได้เวลาหยิบวัสดุแล้ว!!!')) return true; else return false;"><input type="button" value="อนุมัติ"></a>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($draw_status == '0') { ?>
                                                            <div class="none">
                                                                <div class="margin-bottom-cancel">
                                                                    <a href="index.php?Node=dmat_manage&DcancelID=<?= $draw_id; ?>" onclick="if(confirm('จะยกเลิกรายการแล้วนะ?')) return true; else return false;">
                                                                        <input type="button" class="btn-cancel" value="ยกเลิก"></a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>รูปภาพ</th>
                                                <th>ชื่อวัสดุ</th>
                                                <th>จำนวนที่เบิก</th>
                                                <th>ผู้เบิก/วันเบิก</th>
                                                <th>ผู้อนุมัติ/วันอนุมัติ</th>
                                                <th>สถานะ</th>
                                                <th>ยกเลิก</th>
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
        <!-- /.row -->

        </div>
    <?php } ?>
<?php } ?>

<!-- /.card -->
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->