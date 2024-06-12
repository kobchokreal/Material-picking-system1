<?php
require('lib/condb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_editmember.css">
    <title>แก้ไขผู้ใช้งาน</title>
</head>

<body>
    <?php
    $MEMID = $_GET['MEMID'];
    $sql = "SELECT * FROM member WHERE mem_id='$MEMID'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>

    <?php
    if (isset($_POST['btsave'])) {
        $mem_id = $_POST['mem_id'];
        $mem_name = $_POST['mem_name'];
        $mem_mobile = $_POST['mem_mobile'];
        $mem_user = $_POST['mem_user'];
        $mem_pass = $_POST['mem_pass'];
        $mem_level = $_POST['mem_level'];

        $chk_pic = $_FILES['mem_img']['name'];

        if ($chk_pic <> "") {
            move_uploaded_file($_FILES["mem_img"]["tmp_name"], "img/" . $_FILES["mem_img"]["name"]);
            $mem_img = "img/" . $_FILES["mem_img"]["name"];
        } else {
            $mem_img = '$mem_img';
        }
        $sql = "UPDATE  member SET mem_name='$mem_name',mem_mobile='$mem_mobile',
mem_user='$mem_user',mem_pass='$mem_pass',mem_level='$mem_level',mem_img='$mem_img' WHERE mem_id=$mem_id; ";



        $res = mysqli_query($con, $sql);
        echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
        exit;
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <h1>
            EDIT MEMBER
        </h1>

        <form action="edit_member.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $row["mem_id"]; ?>" name="mem_id">
            <div class="formbold-main-wrapper table-responsive">

                <!-- Author: FormBold Team -->
                <!-- Learn More: https://formbold.com -->
                <div class="formbold-form-wrapper">
                    <form action="test.php" method="POST">
                        <div class="formbold-mb-3">
                            <label for="firstname" class="formbold-form-label">
                                ชื่อ - นามสกุล
                            </label>
                            <div>
                                <input type="text" id="inputName" class="formbold-form-input" name="mem_name" required value="<?php echo $row['mem_name']; ?>">
                            </div>
                        </div>

                        <div class="formbold-mb-3">
                            <label for="dob" class="formbold-form-label">
                                เบอร์โทรศัพท์
                            </label>
                            <input type="text" id="inputName" class="formbold-form-input" name="mem_mobile" required value="<?php echo $row['mem_mobile']; ?>">
                        </div>

                        <div class="formbold-mb-3">
                            <label for="dob" class="formbold-form-label">
                                ชื่อผู้ใช้งาน
                            </label>
                            <input type="text" id="inputName" class="formbold-form-input" name="mem_user" required value="<?php echo $row['mem_user']; ?>">
                        </div>

                        <div class="formbold-mb-3">
                            <label for="email" class="formbold-form-label">
                                รหัสผ่าน
                            </label>
                            <input type="text" id="inputName" class="formbold-form-input" name="mem_pass" required value="<?php echo $row['mem_pass']; ?>">
                        </div>

                        <div class="formbold-mb-3">
                            <label class="formbold-form-label">สถานะการใช้งาน</label>

                            <select id="inputStatus" name="mem_level" class="formbold-form-input">
                                <option selected="selected" disabled="disabled" required>กรุณาเลือก</option>
                                <option value="1">ผู้ดูแลระบบ</option>
                                <option value="2">ผู้ใช้งานทั่วไป</option>
                            </select>
                        </div>

                        <div class="formbold-mb-3">
                            <img src="<?php echo $row['mem_img']; ?>" width="80">
                            <input type="hidden" name="mem_img" required value="<?php echo $row['mem_img']; ?>">
                        </div>

                        <div class="formbold-mb-3">
                            <label for="dob" class="formbold-form-label">
                                รูปภาพ
                            </label>
                            <input type="file" id="inputName" class="formbold-form-input formbold-form-file" name="mem_img">
                        </div>



                        <input type="submit" value="บันทึก" class="formbold-btn responsive" name="btsave">

                    </form>
                </div>
            </div>
        </form>

        <br>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>

</html>