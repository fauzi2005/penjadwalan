<?php
require "../config/site-name.php";
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$pageName = 'data-penjadwalan-add';

$readonly = "";

if (isset($_GET['next'])) {
	$conn = open_connection();

	$kode_hari = $_GET['kode_hari'];

	$queryKelas = "SELECT tb_kelas.kode_kelas, tb_kelas.kelas, tb_jurusan.nama_jurusan FROM tb_kelas
	INNER JOIN tb_jurusan
	ON tb_kelas.jurusan = tb_jurusan.kode_jurusan";
	$resultKelas = mysqli_query($conn, $queryKelas);

	$queryHari = "SELECT * FROM tb_hari WHERE kode_hari = '$kode_hari'";
	$resultHari = mysqli_query($conn, $queryHari);

	while($list_tb_hari = mysqli_fetch_assoc($resultHari)) {
		$kode_tb_hari = $list_tb_hari["kode_hari"];
		$nama_tb_hari = $list_tb_hari["nama_hari"];

		if ($kode_hari == $kode_tb_hari) {
			$nama_hari = $nama_tb_hari;
		}
	}

	$query = "SELECT tb_guru_mapel.kode_gmp, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_guru_mapel
	INNER JOIN tb_guru
	ON tb_guru_mapel.kode_guru = tb_guru.kode_guru
	INNER JOIN tb_mapel
	ON tb_guru_mapel.kode_mapel = tb_mapel.kode_mapel
	INNER JOIN tb_jurusan
	ON tb_guru_mapel.kode_jurusan_mapel = tb_jurusan.kode_jurusan";

	$resultGuruMapel = mysqli_query($conn, $query);

	$querySesi = "SELECT * FROM tb_sesi ORDER BY id ASC";
	$resultSesi = mysqli_query($conn, $querySesi);
}


$isError = FALSE;
$error = '';

// // Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])) {
	
	$kelas = $_POST['kelas'];
	$gmp = $_POST['gmp'];
	$kode_sesi = $_POST['kode_sesi'];

	$jumlahInput = count($kode_sesi);

	for ($i=0; $i < $jumlahInput; $i++) {

		if ($kelas[$i] > 0 && $gmp[$i] > 0) {
			$query = "INSERT INTO 
			tb_jadwal (kode_jadwal, kode_hari, kelas, kode_gmp, kode_sesi)
			VALUES ('', '$kode_hari', '$kelas[$i]', '$gmp[$i]', '$kode_sesi[$i]')";

			$hasil = mysqli_query($conn, $query);
		}

	}

	if ($hasil > 0) {
		$url = BASE_URL . 'data-guru-mapel/';
		$_SESSION['sessionAlert'] = "Data berhasil ditambah !!";
		header("Location: $url");
	} else {
		$isError = TRUE;
		$error = "gagal menyimpan ke database : " . mysqli_error($conn);
	}
		# code...
}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Oenjadwalan | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php"
	?>
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<style type="text/css" media="screen">
		.hr-divider {
			border: none;
			border-top: 1px dotted #000;
			color: #fff;
			background-color: #fff;
			height: 1px;
			width: 100%;
		}
	</style>
	
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
								<h1 class="m-0">Tambah Data Penjadwalan</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
									<li class="breadcrumb-item"><a href="<?= BASE_URL ?>data-penjadwalan/">Data Penjadwalan</a></li>
									<li class="breadcrumb-item active">Tambah Data Penjadwalan</li>
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
										<h3 class="card-title">Tambah Data Mata Pelajaran</h3>
									</div>
									<!-- /.card-header -->
									<?php
									include "form-data-penjadwalan.php";
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

		<?php 
		include "../layouts/footer-script.php";
		?>

		<!-- Select2 -->
		<script src="<?= BASE_URL ?>assets/plugins/select2/js/select2.full.min.js"></script>

		<script>
			$(function () {
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