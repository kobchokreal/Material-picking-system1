<link rel="stylesheet" href="print.css" media="print">

<?php
if (isset($_GET['MEMID'])) {

    $MEMID = $_GET['MEMID'];

    $sql = "DELETE FROM member WHERE mem_id='$MEMID' ";
    $res = mysqli_query($con, $sql);

    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
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

    img {
        width: 70px;
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
                                <b>จัดการข้อมูลผู้ใช้งาน</b>
                                <a href="index.php?Node=addmem">[เพิ่มผู้ใช้งาน]</a>
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>รูปภาพ</th>
                                        <th>รหัส</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>แผนก</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>สิทธิ์การใช้งาน</th>
                                        <th>
                                            แก้ไขรายการ
                                        </th>
                                        <th>
                                            ลบรายการ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT member.*,department.* FROM member
LEFT OUTER JOIN department ON (member.mem_dept=department.dept_id)";
                                    $res = mysqli_query($con, $sql);
                                    $runing = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $mem_id = $row['mem_id'];
                                        $mem_name = $row['mem_name'];
                                        $mem_mobile = $row['mem_mobile'];
                                        $mem_user = $row['mem_user'];
                                        $mem_pass = $row['mem_pass'];
                                        $mem_dept = $row['mem_dept'];
                                        $mem_level = $row['mem_level'];
                                        $mem_img = $row['mem_img'];

                                        $dept_name = $row['dept_name'];
                                        if ($mem_level == '1') {
                                            $levelname = "ผู้ดูแลระบบ";
                                        } else if ($mem_level == '2') {
                                            $levelname = "ผู้ใช้งานทั่วไป";
                                        }
                                    ?>
                                        <tr>
                                            <td><img src="<?= $mem_img; ?>"></td>
                                            <td><?= $runing++; ?></td>
                                            <td><?= $mem_name; ?></td>
                                            <td><?= $mem_mobile; ?></td>
                                            <td><?= $dept_name; ?></td>
                                            <td><?= $mem_user; ?></td>
                                            <td><?= $mem_pass; ?></td>
                                            <td><?= $levelname; ?></td>
                                            <td>
                                                <div class="none">
                                                    <h4>
                                                        <a href="edit_member.php?MEMID=<?= $mem_id; ?>" class="badge badge-warning">แก้ไขรายการ</a>
                                                    </h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="none">
                                                    <h4>
                                                        <a href="index.php?Node=showmem&MEMID=<?= $mem_id; ?>" class="badge badge-danger" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบรายการ</a>
                                                    </h4>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
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