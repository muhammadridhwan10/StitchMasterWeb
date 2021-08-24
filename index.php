<?php 
session_start();
if(!$_SESSION['is_login']){
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LBS PENJAHIT</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="asset/plugins/font-awesome-4.6.3/css/font-awesome.min.css"/>
    <!-- Ionicons -->
	<link rel="stylesheet" href="asset/plugins/ionicons/css/ionicons.min.css"/>
    <link rel="stylesheet" href="asset/plugins/daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" href="asset/plugins/iCheck/all.css"/>
	<link rel="stylesheet" href="asset/plugins/colorpicker/bootstrap-colorpicker.min.css"/>
	<link rel="stylesheet" href="asset/plugins/timepicker/bootstrap-timepicker.min.css"/>
	<link rel="stylesheet" href="asset/plugins/datepicker/bootstrap-datepicker.css"/>
	<link rel="stylesheet" href="asset/plugins/select2/select2.min.css"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
	<link rel="stylesheet" href="asset/core/css/AdminLTE.min.css"/>
	<link rel="stylesheet" href="asset/core/css/skins/_all-skins.min.css"/>
	<link  rel="stylesheet" type="text/css" href="asset/plugins/datatables/dataTables.bootstrap.css"/>
	<link rel="shortcut icon" href="asset/favicon.png" />
	
	<script src="asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>

	<script src="asset/plugins/select2/select2.full.min.js"></script>
    <script src="asset/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- moment style -->
	<script src="asset/plugins/moment/min/moment.min.js"></script>
    <script src="asset/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="asset/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="asset/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <script src="asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="asset/plugins/iCheck/icheck.min.js"></script>
	<script src="asset/plugins/fastclick/fastclick.min.js"></script>
	<!--datatable-->
	
	<script src="asset/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="asset/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="asset/plugins/fastclick/fastclick.min.js"></script>
	<script src="asset/core/js/app.min.js"></script>
	
	<!--general-->
	<script src="asset/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="asset/plugins/chartjs/Chart.min.js"></script>
	<script src="asset/plugins/ckeditor/ckeditor.js"></script>
	<script src="asset/core/js/demo.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <a href="index.php" class="logo">			
			<span class="logo-mini"><b>SMART</b></span>
			<span class="logo-lg"><b>STITCH</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="asset/upload/admin/<?php echo $_SESSION['foto'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nama'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="asset/upload/admin/<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
                    <p><?php echo $_SESSION['nama'];?></p>
					<i>login as <?php echo $_SESSION['username'];?></i>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?page=profile" class="btn btn-primary btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-warning btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
               <li>
                <a href="#" data-toggle="control"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="asset/upload/admin/<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			 <p><?php echo $_SESSION['nama'];?></p>
			<small><i class="fa fa-circle text-success"></i> Online</small>
            </div>
          </div>
		<ul class="sidebar-menu">
			<li class="header">NAVIGATION MENU</li>
			<li class="treeview">
              <a href="index.php">
                 <i class="fa fa-dashboard"></i><span>Dashboard</span>
              </a>
            </li>
			<li class="none"><a href="?page=penjahit"><i class="fa fa-folder"></i> <span>Penjahit</span></a></li>
			<li class="none"><a href="?page=model"><i class="fa fa-folder"></i> <span>Model</span></a></li>
			<li class="none"><a href="?page=transaksi"><i class="fa fa-folder"></i> <span>Transaksi</span></a></li>
			<li class="none"><a href="?page=kriteria"><i class="fa fa-book"></i> <span>Kriteria</span></a></li>
			<li class="none"><a href="?page=smart"><i class="fa fa-star"></i> <span>Smart</span></a></li>
			<li class="none"><a href="?page=admin"><i class="fa fa-user"></i><span>Admin</span></a></li>
			<li class="none"><a href="?page=user"><i class="fa fa-user"></i><span>User</span></a></li>
			<li class="none"><a href="?page=profile"><i class="fa fa-cog"></i><span>Profile</span></a></li>
			<li class="none"><a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
          </ul>
        </section>
      </aside>
	<div class="modal" style="display: none;  padding-top: 250px;" align="center">
		<div class="center">
			<img src="asset/core/img/loader.gif" />
		</div>
	</div>
	<!--content start -->
	<div class="content-wrapper">
	<?php
		include 'koneksi.php';
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$page=$_GET["page"];
		$action=$_GET["action"];
		if($page=="penjahit"){
			if($action=="tambah"){
				include "pages/penjahit_add.php";
			}else if($action=="edit"){
				include "pages/penjahit_edit.php";
			}else if($action=="hapus"){
				include "pages/penjahit_delete.php";
			}else if($action=="rating"){
				include "pages/penjahit_rating.php";
			}else{
				include "pages/penjahit_list.php";
			}
		}else if($page=="model"){
			if($action=="tambah"){
				include "pages/model_add.php";
			}else if($action=="edit"){
				include "pages/model_edit.php";
			}else if($action=="hapus"){
				include "pages/model_delete.php";
			}else{
				include "pages/model_list.php";
			}
		}else if($page=="transaksi"){
			if($action=="proses"){
				include "pages/transaksi_proses.php";
			}else if($action=="batal"){
				include "pages/transaksi_batal.php";
			}else if($action=="selesai"){
				include "pages/transaksi_selesai.php";
			}else{
				include "pages/transaksi_list.php";
			}
		}else if($page=="user"){
			if($action=="tambah"){
				include "pages/users_add.php";
			}else if($action=="edit"){
				include "pages/users_edit.php";
			}else if($action=="hapus"){
				include "pages/users_delete.php";
			}else{
				include "pages/users_list.php";
			}
		}else if($page=="kriteria"){
			if($action=="tambah"){
				include "pages/kriteria_add.php";
			}else if($action=="edit"){
				include "pages/kriteria_edit.php";
			}else if($action=="hapus"){
				include "pages/kriteria_delete.php";
			}else{
				include "pages/kriteria_list.php";
			}
		}else if($page=="smart"){
			include "pages/smart.php";
		}else if($page=="admin"){
			if($action=="tambah"){
				include "pages/admin_add.php";
			}else if($action=="edit"){
				include "pages/admin_edit.php";
			}else if($action=="hapus"){
				include "pages/admin_delete.php";
			}else{
				include "pages/admin_list.php";
			}
		}else if($page=="profile"){
			include "pages/profile.php";
		}else{
			include"pages/dashboard.php";
		}
	?>	  
	</div>
	<!--content end -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <strong>Version 1.0</strong>
        </div>
        <strong>Copyright &copy; 2021</a></strong> All rights reserved.
      </footer>
    </div>
  </body>
</html>
