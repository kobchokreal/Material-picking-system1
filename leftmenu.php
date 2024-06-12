<?php
include_once("lib/condb.php");
include_once("lib/inc.php");

if(isOnline()){

$memid=$_SESSION['memid'];

$sql="SELECT * FROM member WHERE mem_id='$memid' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$mem_id=$row['mem_id'];
$mem_name=$row['mem_name'];
$mem_img=$row['mem_img'];
$mem_level=$row['mem_level'];

}

?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LOGO Company</span>
    </a>

<?php 
if(isOnline()){
?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$mem_img;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$mem_name;?></a>
        </div>
      </div>

<?php } ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<?php 
if(!isOnline()){
?>

          <li class="nav-header">เมนูการใช้งาน</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-home text-danger"></i>
              <p class="text">หน้าแรก</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=login" class="nav-link">
              <i class="nav-icon fas fa-user-alt text-warning"></i>
              <p>ล็อกอินเข้าระบบ</p>
            </a>
          </li>
          <li class="nav-item">
            <a target="_blank" href="คู่มือการใช้งานระบบจัดการวัสดุสำนักงานออนไลน์.pdf" class="nav-link">
              <i class="nav-icon fa fa-file-pdf text-info"></i>
              <p>แนะนำการใช้งาน</p>
            </a>
          </li>
<?php
}
?>
<?php 
if(isOnline()){
?>
<?php
if(isAdmin($_SESSION['usr'],$_SESSION['pwd'],$con)){
?>

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon  fas fa-chalkboard text-primary"></i>
              <p>แดชบอร์ด</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=showmem" class="nav-link">
              <i class="nav-icon  fas fa-user-edit text-warning"></i>
              <p>จัดการข้อมูลผู้ใช้งาน</p>
            </a>
          </li>


          <li class="nav-item">
<a href="index.php?Node=smat" class="nav-link">
              <i class="nav-icon fa fa-plus-circle text-warning"></i>
              <p>จัดการข้อมูลวัสดุ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=dmat_manage" class="nav-link">
              <i class="nav-icon fas fa-box-open text-warning"></i>
              <p>จัดการข้อมูลการเบิกวัสดุ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=stmat" class="nav-link">
              <i class="nav-icon fa fa-newspaper text-warning"></i>
              <p>รายงานวัสดุคงเหลือ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=lout" class="nav-link">
              <i class="nav-icon f  fa fa-power-off text-danger"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>

<?php } else if(isUser($_SESSION['usr'],$_SESSION['pwd'],$con)) { ?>

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-chalkboard text-primary"></i>
              <p>แดชบอร์ด</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=sdraw" class="nav-link">
              <i class="nav-icon fas fa-edit text-warning"></i>
              <p>เบิกวัสดุ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?Node=dmat_his" class="nav-link">
              <i class="nav-icon fas fa-receipt text-warning"></i>
              <p>ประวัติการเบิกวัสดุ</p>
            </a>
          </li>          

          <li class="nav-item">
            <a href="index.php?Node=lout" class="nav-link">
              <i class="nav-icon fas fa-power-off text-danger"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>  

<?php } ?>

<?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>