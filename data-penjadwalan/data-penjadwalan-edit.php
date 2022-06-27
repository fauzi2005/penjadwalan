<?php
require "../config/site-name.php";
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$pageName = "data-penjadwalan-edit";

$readonly = "found";

$param_kode_gmp = $_GET['kode_gmp'];

$conn = open_connection();

$query = "SELECT * FROM tb_guru_mapel WHERE kode_gmp = '$param_kode_gmp'";
$result = mysqli_query($conn, $query);

$old_data = array();
$data_found = FALSE;

if ($row = mysqli_fetch_assoc($result)) {
	$old_data = $row;
	$data_found = TRUE;
}

if ($data_found) {
	// $list_jurusan = get_data_jurusan();
	$list_guru = get_data_guru();

	$kode_gmp 					= $_POST['kode_gmp'] ?? $old_data['kode_gmp'];
	$kode_guru 					= $_POST['kode_guru'] ?? $old_data['kode_guru'];
	$kode_mapel 				= $_POST['kode_mapel'] ?? $old_data['kode_mapel'];
	$kategori_jurusan_mapel 	= $_POST['kode_jurusan_mapel'] ?? $old_data['kode_jurusan_mapel'];


	$query_two = "SELECT tb_mapel.kode_mapel, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_mapel INNER JOIN tb_jurusan ON tb_mapel.kategori_mapel = tb_jurusan.kode_jurusan WHERE tb_mapel.kategori_mapel = '$kategori_jurusan_mapel' ORDER BY tb_mapel.nama_mapel ASC";
	$resultJurusanMapel = mysqli_query($conn, $query_two);
	
	$isError = FALSE;
	$error = '';
}


// Jika data disubmit, maka lakukan validasi dan simpan data
if($data_found && isset($_POST['submit']))
{
	if ($kode_gmp == '') {
		$isError = TRUE;
		$error .= '<div>Kode Guru Mata Pelajaran Harap Diisi !!</div>';
	}
	if ($kode_guru == '') {
		$isError = TRUE;
		$error .= '<div>Guru Harap Diisi !!</div>';
	}
	if ($kode_mapel == '') {
		$isError = TRUE;
		$error .= '<div>Mata Pelajaran Harap Diisi !!</div>';
	}

	// Jika tidak ada salah input, maka simpan data ke dalam database
	if (!$isError) {
		$conn = open_connection();
		$query = "UPDATE tb_guru_mapel SET 
		kode_guru = '$kode_guru', kode_mapel = '$kode_mapel', kode_jurusan_mapel = '$kategori_jurusan_mapel'
		WHERE 
		kode_gmp = '$old_data[kode_gmp]'";

		$hasil = mysqli_query($conn, $query);

		if ($hasil)
		{
			$url = BASE_URL . 'data-guru-mapel/';
			$_SESSION['sessionAlert'] = "Data berhasil diupdate !!";
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
	<title>Edit Data Guru Mata Pelajaran | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="../assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php"
	?>
	
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="../assets/img/tutwurihandayani-logo.png" alt="Tutwuri Handayani Logo" height="260" width="260">
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
							<h1 class="m-0">Edit Data Guru</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Data Guru</a></li>
								<li class="breadcrumb-item active">Edit Data Guru</li>
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
									<h3 class="card-title">Edit Data Guru</h3>
								</div>
								<!-- /.card-header -->
								<?php
								include "form-data-guru-mapel.php";
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