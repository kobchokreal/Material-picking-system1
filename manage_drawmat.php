<link rel="stylesheet" href="print.css" media="print">

<?php
date_default_timezone_set("Asia/Bangkok");

if (isset($_GET['DID'])) {
    $DID = $_GET['DID'];
    $draw_date_app = date("d-m-Y");

    $sql = "UPDATE meterdraw SET draw_userid_app='$memid',draw_date_app='$draw_date_app',draw_status='1' WHERE draw_id='$DID' ";
    $res = mysqli_query($con, $sql);

    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=dmat_manage">';
    exit;
}
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
                                <b>จัดการข้อมูลการเบิกวัสดุ</b>
                            </h3>
                            <a target="_blank" href="detail_draw.php"> <button class="btn  btn-primary float-right ">พิมพ์</button></a>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รูปภาพ</th>
                                            <th>ชื่อวัสดุ</th>
                                            <th>จำนวนที่เบิก</th>
                                            <th>ราคาทุน</th>
                                            <th>ราคารวม</th>
                                            <th>ผู้เบิก/วันเบิก</th>
                                            <th>ผู้อนุมัติ/วันอนุมัติ</th>
                                            <th>สถานะ</th>
                                            <th>ยกเลิกรายการ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT md1.*,md2.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw md1
LEFT OUTER JOIN meter md2 ON (md1.draw_metid=md2.met_id)
LEFT OUTER JOIN member m1 ON (md1.draw_userid_draw=m1.mem_id)
LEFT OUTER JOIN member m2 ON (md1.draw_userid_app=m2.mem_id)
order by md1.draw_status ASC ";
                                    $res = mysqli_query($con, $sql);
                                    $runing = 1;
                                    $sum_total = 0;
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
                                        $met_price = $row['met_price'];

                                        $name1draw = $row['name1'];
                                        $name2app = $row['name2'];


                                        $totalprice_curent = $draw_num * $met_price; //จำนวนสินค้า*ราคาทุนของสินค้า = ราคาวัสดุ
                                        $sum_total = $sum_total + ($met_price * $draw_num); //สมการหายอดราคารวมทั้งหมดของราคาวัสดุ
                                    ?>
                                        <tr>
                                            <td><?= $runing++; ?></td>
                                            <td><img src="<?= $met_img; ?>" width="90"></td>
                                            <td bgcolor="#FFEBCD"><?= $met_name; ?></td>
                                            <td bgcolor="#CCFFFF"><?= $draw_num; ?></td>
                                            <td bgcolor="#FFFFCC"><?= number_format($met_price, 2); ?></td>
                                            <td bgcolor="#FFCCFF"><?= number_format($totalprice_curent, 2); ?></td>
                                            <td>
                                                <?= $name1draw; ?><br>
                                                <font color="green">(<?= $draw_date; ?>)</font>
                                            </td>
                                            <td>
                                                <?php if ($draw_status == '0') {
                                                    echo "รออนุมัติ";
                                                } else { ?>
                                                    <?= $name2app; ?><br>
                                                    (<?= $draw_date_app; ?>)
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($draw_status == '0') { ?>
                                                    <div class="none">
                                                        <a href="index.php?Node=dmat_manage&DID=<?= $draw_id; ?>" onclick="if(confirm('ได้เวลาหยิบวัสดุให้แล้ว!!!')) return true; else return false;"><input type="button" value="อนุมัติ"></a>
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
                                    <table class="table table-bordered">
                                    </table>
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