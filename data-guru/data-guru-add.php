<?php
require "../config/site-name.php";
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$pageName = 'data-guru-add';

$readonly = "";

// $list_nip_guru = get_data_nip_guru();

$kode_guru 		= $_POST['kode_guru'] ?? '';
$nip_guru 		= $_POST['nip_guru'] ?? '';
$nama_guru 		= $_POST['nama_guru'] ?? '';
$gelar_guru 	= $_POST['gelar_guru'] ?? '';
$gender_guru 	= $_POST['gender_guru'] ?? '';
$alamat_guru 	= $_POST['alamat_guru'] ?? '';
$no_hp_guru 	= $_POST['no_hp_guru'] ?? '';
$email_guru 	= $_POST['email_guru'] ?? '';

$isError = FALSE;
$error = '';

// Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit']))
{
	if ($kode_guru == '') {
		$isError = TRUE;
		$error .= '<div>Kode Guru Harap Diisi !!</div>';
	}
	if ($nip_guru == '') {
		$isError = TRUE;
		$error .= '<div>NIP Guru Harap Diisi !!</div>';
	}
	if ($nama_guru == '') {
		$isError = TRUE;
		$error .= '<div>Nama Guru Harap Diisi !!</div>';
	}
	if ($gelar_guru == '') {
		$isError = TRUE;
		$error .= '<div>Gelar Guru Harap Diisi !!</div>';
	}
	if ($gender_guru == '') {
		$isError = TRUE;
		$error .= '<div>Jenis Kelamin Guru Harap Diisi !!</div>';
	}
	if ($alamat_guru == '') {
		$isError = TRUE;
		$error .= '<div>Alamat Guru Harap Diisi !!</div>';
	}
	if ($no_hp_guru == '') {
		$isError = TRUE;
		$error .= '<div>No HP Guru Harap Diisi !!</div>';
	}
	if ($email_guru == '') {
		$isError = TRUE;
		$error .= '<div>E-mail Guru Harap Diisi !!</div>';
	}

	// Jika tidak ada salah input, maka simpan data ke dalam database
	if (!$isError) {
		$conn = open_connection();
		$query = "INSERT INTO 
					tb_guru (kode_guru, nip_guru, nama_guru, gelar_guru, gender_guru, alamat_guru, no_hp_guru, email_guru)
					VALUES ('$kode_guru', '$nip_guru', '$nama_guru', '$gelar_guru', '$gender_guru', '$alamat_guru', '$no_hp_guru', '$email_guru')";

		$hasil = mysqli_query($conn, $query);

		if ($hasil)
		{
			$url = BASE_URL . 'data-guru/';
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
	<title>Tambah Data Guru | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php"
	?>
	
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
							<h1 class="m-0">Tambah Data Guru</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Data Guru</a></li>
								<li class="breadcrumb-item active">Tambah Data Guru</li>
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
									<h3 class="card-title">Tambah Data guru</h3>
								</div>
								<!-- /.card-header -->
								<?php
								include "form-data-guru.php";
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