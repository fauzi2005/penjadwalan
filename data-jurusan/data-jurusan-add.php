<?php
require "../config/site-name.php";
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$pageName = 'data-jurusan-add';

$readonly = "";

$list_jurusan = get_data_jurusan();

$kode_jurusan = $_POST['kode_jurusan'] ?? '';
$nama_jurusan = $_POST['nama_jurusan'] ?? '';

$isError = FALSE;
$error = '';

// Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit']))
{
	// if ($kode_jurusan == '') {
	// 	$isError = TRUE;
	// 	$error .= '<div>Kode Jurusan Harap Diisi !!</div>';
	// }
	if ($nama_jurusan == '') {
		$isError = TRUE;
		$error .= '<div>Nama Jurusan Harap Diisi !!</div>';
	}

	// Jika tidak ada salah input, maka simpan data ke dalam database
	if (!$isError) {
		$conn = open_connection();
		$query = "INSERT INTO 
					tb_jurusan (kode_jurusan, nama_jurusan)
					VALUES ('$kode_jurusan', '$nama_jurusan')";

		$hasil = mysqli_query($conn, $query);

		if ($hasil)
		{
			$url = BASE_URL . 'data-jurusan/';
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
	<title>Tambah Data Jurusan | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php";
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
							<h1 class="m-0">Tambah Data Jurusan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?= BASE_URL ?>data-jurusan/">Data Jurusan</a></li>
								<li class="breadcrumb-item active">Tambah Data Jurusan</li>
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
									<h3 class="card-title">Tambah Data Jurusan</h3>
								</div>
								<!-- /.card-header -->
								<?php
								include "form-data-jurusan.php";
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
	
</body>
</html>