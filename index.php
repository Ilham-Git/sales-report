<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Sales</title>
	<link rel="icon" href="dist/img/sales.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-green navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>WEBSITE LAPORAN SALES KKT</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/sales.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> LAPORAN SALES</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.ico">
					</div>

					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<?php
						if ($data_level == "Administrator") {
						?>
							<span class="badge badge-success">
								<?php echo $data_level; ?>
							</span>
						<?php
						} elseif ($data_level == "Karyawan") {
						?>
							<span class="badge badge-danger">
								<?php echo $data_level; ?>
							</span>
						<?php
						} elseif ($data_level == "Sales") {
						?>
							<span class="badge badge-info">
								<?php echo $data_level; ?>
							</span>
						<?php
						}
						?>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Kelola Data Wilayah
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 1</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 2</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 3</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Parepare</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Pinrang</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Sidrap</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Soppeng</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Wajo</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=import-data" class="nav-link">
									<i class="nav-icon fas fa-download"></i>
									<p>
										Import Data
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=export-data" class="nav-link">
									<i class="nav-icon fas fa-upload"></i>
									<p>
										Export Data
									</p>
								</a>
							</li>
						<?php
						} elseif ($data_level == "Karyawan") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Kelola Data Wilayah
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 1</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 2</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Bone 3</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Parepare</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Pinrang</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Sidrap</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Soppeng</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pesanan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Data Wajo</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=import-data" class="nav-link">
									<i class="nav-icon fas fa-download"></i>
									<p>
										Import Data
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=export-data" class="nav-link">
									<i class="nav-icon fas fa-upload"></i>
									<p>
										Export Data
									</p>
								</a>
							</li>
						<?php
						} elseif ($data_level == "Sales") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="?page=data-pesanan-sales" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Kelola Data Wilayah
									</p>
								</a>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=import-data" class="nav-link">
									<i class="nav-icon fas fa-download"></i>
									<p>
										Import Data
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=export-data" class="nav-link">
									<i class="nav-icon fas fa-upload"></i>
									<p>
										Export Data
									</p>
								</a>
							</li>

						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//pesanan
							case 'data-pesanan':
								include "admin/pesanan/data_pesanan.php";
								break;
							case 'add-pesanan':
								include "admin/pesanan/add_pesanan.php";
								break;
							case 'edit-pesanan':
								include "admin/pesanan/edit_pesanan.php";
								break;
							case 'del-pesanan':
								include "admin/pesanan/del_pesanan.php";
								break;
							case 'view-pesanan':
								include "admin/pesanan/view_pesanan.php";
								break;

								//sales
							case 'data-pesanan-sales':
								include "admin/sales/data_pesanan_sales.php";
								break;
							case 'add-pesanan-sales':
								include "admin/sales/add_pesanan_sales.php";
								break;
							case 'edit-pesanan-sales':
								include "admin/sales/edit_pesanan_sales.php";
								break;
							case 'del-pesanan-sales':
								include "admin/sales/del_pesanan_sales.php";
								break;
							case 'view-pesanan-sales':
								include "admin/sales/view_pesanan_sales.php";
								break;

								//upload
							case 'import-data':
								include "import.php";
								break;
							case 'export-data':
								include "export.php";
								break;

								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Karyawan") {
							include "home/karyawan.php";
						} else {
							include "home/sales.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://www.instagram.com/kokohkuat">
					<strong> PT. KOKOH KUAT TERPERCAYA</strong>
				</a>
				All rights reserved.
			</div>
			<b>SALES KKT VERSI 2022</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>