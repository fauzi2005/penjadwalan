<?php
session_start();

require "../config/site-name.php";
require "../config/functions.php";
require "../config/koneksi.php";

$pageName = 'data-kelas-add';

$readonly = "";

$list_jurusan = get_data_jurusan();

$kode_kelas = $_POST['kode_kelas'] ?? '';
$kelas = $_POST['kelas'] ?? '';
$jurusan = $_POST['jurusan'] ?? '';

$isError = FALSE;
$error = '';

// Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit']))
{
	if ($kode_kelas == '') {
		$isError = TRUE;
		$error .= '<div>Kode Kelas Harap Diisi !!</div>';
	}
	if ($kelas == '') {
		$isError = TRUE;
		$error .= '<div>Kelas Harap Diisi !!</div>';
	}
	if ($jurusan == '') {
		$isError = TRUE;
		$error .= '<div>Jurusan Harap Diisi !!</div>';
	}

	// Jika tidak ada salah input, maka simpan data ke dalam database
	if (!$isError) {
		$conn = open_connection();
		$query = "INSERT INTO 
					tb_kelas (kode_kelas, kelas, jurusan)
					VALUES ('$kode_kelas', '$kelas', '$jurusan')";

		$hasil = mysqli_query($conn, $query);

		if ($hasil)
		{
			$url = BASE_URL . 'data-kelas/';
			$_SESSION['sessionAlert'] = "Data berhasil ditambah !!";
			header("Location: $url");
		} else
		{
			$isError = TRUE;
			$error = "gagal menyimpan ke database : " . mysqli_error($conn);
		}
	}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Kelas | <?= $siteName ?></title>
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
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png" alt="Tutwuri Handayani Logo" height="260" width="260">	</div>


	
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
							<h1 class="m-0">Tambah Data Kelas</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Data Kelas</a></li>
								<li class="breadcrumb-item active">Tambah Data Kelas</li>
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
						<div class="col-12">
							<!-- Horizontal Form -->
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Tambah Data Kelas</h3>
								</div>
								<!-- /.card-header -->
								<?php
								include "form-data-kelas.php";
								?>
							</div>
							<!-- /.card -->
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
	<!-- SweetAlert2 -->
	<script src="<?= BASE_URL ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="<?= BASE_URL ?>assets/plugins/toastr/toastr.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?= BASE_URL ?>assets/plugins/moment/moment.min.js"></script>
	<script src="<?= BASE_URL ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= BASE_URL ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= BASE_URL ?>assets/js/adminlte.js"></script>
</body>
</html>