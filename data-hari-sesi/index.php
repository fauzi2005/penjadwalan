<?php 
require "../config/koneksi.php";
require "../config/functions.php";
require "../config/site-name.php";

check_login();

$isSuccess = FALSE;

$pageName = "data-hari-sesi";

$conn = open_connection();

// DATA HARI
$queryHari = ("SELECT * FROM tb_hari ORDER BY kode_hari ASC");
$dataHari = mysqli_query($conn, $queryHari);

// DATA SESI
$querySesi = ("SELECT * FROM tb_sesi ORDER BY id ASC");
$dataSesi = mysqli_query($conn, $querySesi);

$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Hari Sesi | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="../assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php";
	?>

	<style>
		.button-datatables-file {
			background-color: seagreen;
			margin-bottom: 10px;
			margin-right: 2px;
			border: none;
			border-radius: 10px;
			transition: all .2s ease-in-out;
		}

		.button-datatables-file:hover {
			background-color: #21633e;
			transform: scale(1.3);
		}

		.button-datatables {
			background-color: rgba(0, 0, 0, 0);
			color: #000;
			border: none;
			margin-bottom: 10px;
			margin-right: 2px;
		}

		.button-datatables:hover {
			background-color: rgba(0, 0, 0, 0);
			color: #000;
			border: none
		}

		.hover-grow {
			transition: all .2s ease-in-out;
		}

		.hover-grow:hover {
			transform: scale(1.2);
		}
	</style>

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
					<?php if(isset($_SESSION['sessionAlert'])) : ?>

						<br>
						<div class="alert alert-success" id="fadeOut">
							<div class="text-center">
								<b>
									<?php 
									echo $_SESSION['sessionAlert'];
									unset ($_SESSION["sessionAlert"]);
									?>
								</b>
							</div>
						</div>
					<?php endif; ?>
					<div class="row mb-2">
						<div class="col-sm-6">
							<!-- Judul Pages -->
							<h1 class="m-0">Data Kelas</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Data Kelas</li>
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
						<div class="col-4">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">List Data Hari</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="card-title">
										<!-- <a href="data-kelas-add.php" title="Data Kelas Add" class="btn btn-primary">Tambah Data Kelas</a> -->
										<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
											Add Data Kelas
										</button> -->
									</div>
									<br><br>
									<table id="tableHari" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Kode Kode</th>
												<th>Nama Hari</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dataHari as $hari) : ?>
												<tr>
													<td><?= $hari["kode_hari"]; ?></td>
													<td><?= $hari["nama_hari"]; ?></td>
													<!-- <td><?= $hari["nama_jurusan"]; ?></td>
													<td>
														<a href="<?= BASE_URL . 'data-kelas/data-kelas-edit.php?kode_kelas=' . $kelas["kode_kelas"] ?>" title="Edit" class="btn btn-warning">EDIT</a>
														<a href="<?= BASE_URL . 'data-kelas/data-kelas-delete.php?kode_kelas=' . $kelas["kode_kelas"] ?>" title="Delete" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">DELETE</a>
													</td> -->
												</tr>

											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- ./col -->
						</div>
						<div class="col-8">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">List Data Sesi</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="card-title">
										<!-- <a href="data-kelas-add.php" title="Data Kelas Add" class="btn btn-primary">Tambah Data Kelas</a> -->
										<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
											Add Data Kelas
										</button> -->
									</div>
									<br><br>
									<table id="tableHari" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Sesi</th>
												<th>Jam Mulai</th>
												<th>Jam Selesai</th>
												<th>Durasi Sesi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dataSesi as $sesi) : ?>
												<tr>
													<td><?= $sesi["sesi"]; ?></td>
													<td><?= $sesi["jam_mulai"]; ?> WIB</td>
													<td><?= $sesi["jam_selesai"]; ?> WIB</td>
													<td><?= $sesi["durasi_sesi"]; ?></td>
													<!-- <td><?= $hari["nama_jurusan"]; ?></td>
													<td>
														<a href="<?= BASE_URL . 'data-kelas/data-kelas-edit.php?kode_kelas=' . $kelas["kode_kelas"] ?>" title="Edit" class="btn btn-warning">EDIT</a>
														<a href="<?= BASE_URL . 'data-kelas/data-kelas-delete.php?kode_kelas=' . $kelas["kode_kelas"] ?>" title="Delete" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">DELETE</a>
													</td> -->
												</tr>

											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- ./col -->
						</div>
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

	<!-- Page specific script -->
	<script>
		$(function () {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				// "ordering": true,
				// "info": true,
				"dom" : "<'row'<'col-sm-12'B>>" +
				"<'row'<'col-sm-6'l><'col-sm-6'f>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-5'i><'col-sm-7'p>>",

				"buttons":
				[
				{ "text": 'Download Button :', "className": 'button-datatables' },
				{ "extend": 'copy', "text": '<i class="fas fa-copy"></i> Copy', "className": 'button-datatables-file' },
				{ "extend": 'csv', "text": '<i class="fas fa-file-csv"></i> Csv', "className": 'button-datatables-file' },
				{ "extend": 'excel', "text": '<i class="fas fa-file-excel"></i> Excel', "className": 'button-datatables-file' },
				{ "extend": 'pdf', "text": '<i class="fas fa-file-pdf"></i> Pdf', "className": 'button-datatables-file' },
				{ "extend": 'print', "text": '<i class="fas fa-print"></i> Print', "className": 'button-datatables-file' }
				]

				// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});

		$('#fadeOut').delay(1500).fadeOut(1000).fadeOut("slow");
	</script>


</body>
</html>