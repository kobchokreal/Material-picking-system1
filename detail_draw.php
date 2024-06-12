<?php 
require("lib/condb.php");
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
        <title>Report Draw</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                margin-left: 40%;
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
                <u>รายละเอียดการเบิก</u>
            </span>
        </div>
        <?php 
                   $sql="SELECT md1.*,md2.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw md1
                   LEFT OUTER JOIN meter md2 ON (md1.draw_metid=md2.met_id)
                   LEFT OUTER JOIN member m1 ON (md1.draw_userid_draw=m1.mem_id)
                   LEFT OUTER JOIN member m2 ON (md1.draw_userid_app=m2.mem_id)
                   order by md1.draw_status ASC ";
                   $res=mysqli_query($con,$sql);
                   $i=1;
                   $sum_total=0;
                   while ($row=mysqli_fetch_assoc($res)) {
                     $draw_id=$row['draw_id'];
                     $draw_date=$row['draw_date'];
                     $draw_num=$row['draw_num'];
                     $draw_metid=$row['draw_metid'];
                     $draw_userid_draw=$row['draw_userid_draw'];
                     $draw_userid_app=$row['draw_userid_app'];
                     $draw_date_app=$row['draw_date_app'];
                     $draw_status=$row['draw_status'];
                   
                     $met_img=$row['met_img'];
                     $met_name=$row['met_name'];
                     $met_price=$row['met_price'];
                   
                     $name1draw=$row['name1'];
                     $name2app=$row['name2'];
                   
                   
                     $totalprice_curent=$draw_num*$met_price;//จำนวนสินค้า*ราคาทุนของสินค้า = ราคาวัสดุ
                     $sum_total=$sum_total+($met_price*$draw_num);//สมการหายอดราคารวมทั้งหมดของราคาวัสดุ
                   
                ?>
        <?php 
        }
          ?>
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
            <div class="card">

                <div class="card-body">
                    <b>ราคาทั้งหมด :
                        <?=number_format($sum_total,2)  ;?>
                        บาท</b>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้เบิก</th>
                        <th>ชื่อวัสดุ</th>
                        <th>วันที่เบิก</th>
                        <th>จำนวนที่เบิก</th>
                        <th>ราคา</th>
                        <th>ราคารวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                   $sql="SELECT md1.*,md2.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw md1
                   LEFT OUTER JOIN meter md2 ON (md1.draw_metid=md2.met_id)
                   LEFT OUTER JOIN member m1 ON (md1.draw_userid_draw=m1.mem_id)
                   LEFT OUTER JOIN member m2 ON (md1.draw_userid_app=m2.mem_id)
                   order by md1.draw_status ASC ";
                   $res=mysqli_query($con,$sql);
                   $i=1;
                   $sum_total=0;
                   while ($row=mysqli_fetch_assoc($res)) {
                     $draw_id=$row['draw_id'];
                     $draw_date=$row['draw_date'];
                     $draw_num=$row['draw_num'];
                     $draw_metid=$row['draw_metid'];
                     $draw_userid_draw=$row['draw_userid_draw'];
                     $draw_userid_app=$row['draw_userid_app'];
                     $draw_date_app=$row['draw_date_app'];
                     $draw_status=$row['draw_status'];
                   
                     $met_img=$row['met_img'];
                     $met_name=$row['met_name'];
                     $met_price=$row['met_price'];
                   
                     $name1draw=$row['name1'];
                     $name2app=$row['name2'];
                   
                   
                     $totalprice_curent=$draw_num*$met_price;//จำนวนสินค้า*ราคาทุนของสินค้า = ราคาวัสดุ
                     $sum_total=$sum_total+($met_price*$draw_num);//สมการหายอดราคารวมทั้งหมดของราคาวัสดุ
                   
                ?>
                    <style>
                        tr {
                            text-align: center;
                        }
                    </style>
                    <tr>
                        <td width="1%"><?=$i++;?></td>
                        <td width="29%"><?=$name1draw?></td>
                        <td width="23%"><?=$met_name?></td>
                        <td width="24%"><?=$draw_date?></td>
                        <td width="15%"><?=number_format($draw_num)?></td>
                    </td>
                    <td><?=number_format($met_price,2)?></td>
                    <td><?=number_format($totalprice_curent,2)?></td>
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