<?php
include_once("lib/condb.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        #filters {
            margin-left: 15%;
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>
</head>

<body>
    <div id="filters">
        <span>กรุณาเลือกแผนก:</span>
        <select name="fetchval" id="fetchval">
            <option value="" disabled="" selected="">เลือกแผนก</option>
            <option value="">Design</option>
            <option value="">Consult</option>
            <option value="">Secretary&Bidding</option>
            <option value="">Accounting</option>
            <option value="">Marketing</option>
            <option value="">Consult private</option>
            <option value="">Urban Design</option>
            <option value="">HR</option>
            <option value="">IT Support</option>
        </select>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้เบิก</th>
                    <th>ชื่อวัสดุ</th>
                    <th>จำนวนที่เบิก</th>
                    <th>ราคา</th>
                    <th>ราคารวม</th>
                    <th>แผนก</th>
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
                $i = 1;
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
                        <td><?= $i++; ?></td>
                        <td><?= $name1draw ?></td>
                        <td><?= $met_name ?></td>
                        <td><?= $draw_num ?></td>
                        </td>
                        <td><?= $met_price ?></td>
                        <td><?= $totalprice_curent ?></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>