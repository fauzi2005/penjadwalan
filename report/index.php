<?php
require "../config/functions.php";
require "../config/koneksi.php";
require "../config/site-name.php";

$pageName = "report";

check_login();

$conn = open_connection();

$totalJadwal = 1;

$queryJadwal = "SELECT * FROM tb_jadwal";
$resultJadwal = mysqli_query($conn, $queryJadwal);
while ($listJadwal = mysqli_fetch_assoc($resultJadwal)) {
	$totalJadwal++;
}

$totalGMP = 1;

$queryGMP = "SELECT * FROM tb_guru_mapel";
$resultGMP = mysqli_query($conn, $queryGMP);
while ($listGMP = mysqli_fetch_assoc($resultGMP)) {
	$totalGMP++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Export | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png" alt="Tutwuri Handayani Logo" height="260" width="260">
		</div>


		<!-- -------------------Navbar / Header------------------- -->
		<?php 
		include "../layouts/header.php";
		?>
		<!-- -------------------END Navbar / Header------------------- -->

		<!-- -------------------Sidebar------------------- -->
		<?php 
		include "../layouts/sidebar.php";
		?>
		<!-- -------------------END Sidebar------------------- -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			
			<!-- -------------------Content Header (Page header)------------------- -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<!-- Judul Pages -->
							<h1 class="m-0">Export</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
								<li class="breadcrumb-item active">Export</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- -------------------END Content Header (Page header)------------------- -->

			<!-- _______________________________________________________________________________________________________________________ -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-6">
							<!-- small box -->
							<div class="small-box bg-secondary">
								<div class="inner">
									<h3>Total Jadwal <?= $totalJadwal ?></h3>

									<p>Download Data Penjadwalan</p>
								</div>
								<div class="icon">
									<i class="fas fa-book"></i>
								</div>
								<a href="<?= BASE_URL ?>export/export-penjadwalan.php" class="small-box-footer"><i class="fas fa-download"></i> Download</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3>Total GMP <?= $totalGMP ?></h3>

									<p>Download Guru Mata Pelajaran (GMP)</p>
								</div>
								<div class="icon">
									<i class="fas fa-users"></i>
								</div>
								<a href="<?= BASE_URL ?>export/export-gmp.php" class="small-box-footer"><i class="fas fa-download"></i> Download</a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- footer -->
		<?php 
		include "../layouts/footer.php";
		?>


	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= BASE_URL ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= BASE_URL ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?= BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?= BASE_URL ?>assets/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?= BASE_URL ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= BASE_URL ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?= BASE_URL ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?= BASE_URL ?>assets/plugins/moment/moment.min.js"></script>
	<script src="<?= BASE_URL ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?= BASE_URL ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?= BASE_URL ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= BASE_URL ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= BASE_URL ?>assets/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?= BASE_URL ?>assets/js/demo.js"></script> -->
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?= BASE_URL ?>assets/js/pages/dashboard.js"></script>
</body>
</html>