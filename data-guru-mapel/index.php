<?php 
session_start();

require "../config/site-name.php";
require "../config/koneksi.php";
require "../config/functions.php";

$isSuccess = FALSE;

$pageName = "data-guru-mapel";

$conn = open_connection();

$query = ("SELECT tb_mapel.kode_mapel, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_mapel INNER JOIN tb_jurusan ON tb_mapel.kategori_mapel = tb_jurusan.kode_jurusan");
$dataMapel = mysqli_query($conn, $query);
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Mata Pelajaran | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="../assets/img/tutwurihandayani-logo.png">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

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
							<h1 class="m-0">Data Mata Pelajaran</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Data Mata Pelajaran</li>
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
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">List Data Mata Pelajaran</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="card-title">
										<!-- <a href="data-guru-mapel-add.php" title="Data Mata Pelajaran Add" class="btn btn-primary">Tambah Data Mata Pelajaran</a> -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
											Tambah Data Mata Pelajaran
										</button>
									</div>
									<br><br>
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<!-- <th>Kode Mata Pelajaran</th> -->
												<th>Nama Mata Pelajaran</th>
												<th>Kategori Mata Pelajaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dataMapel as $mapel) : ?>
												<tr>
													<!-- <td><?= $mapel["kode_mapel"]; ?></td> -->
													<td><?= $mapel["nama_mapel"]; ?></td>
													<td><?= $mapel["nama_jurusan"]; ?></td>
													
													<td>
														<a href="<?= BASE_URL . 'data-guru-mapel/data-guru-mapel-edit.php?kode_mapel=' . $mapel["kode_mapel"] ?>" title="Edit" class="btn btn-warning">EDIT</a>
														<a href="<?= BASE_URL . 'data-guru-mapel/data-guru-mapel-delete.php?kode_mapel=' . $mapel["kode_mapel"] ?>" title="Delete" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">DELETE</a>
													</td>
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

	<div class="modal fade" id="modal-lg">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Pilih Jurusan Mata Pelaran Guru</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Note :<br><i class="text-danger">*Pilih jurusan yang ingin ditambahkan ke dalam mata pelajaran guru.</i></p>
					<!-- form start -->
					<form class="form-horizontal" method="POST" action="<?= BASE_URL . 'data-guru-mapel/data-guru-mapel-add.php' ?>">
						<div class="form-group row">
							<label for="inputKategoriJurusanMapel" class="col-sm-4 col-form-label">Kategori Mata Pelajaran</label>
							<div class="col-sm-8">
								<select class="form-control" name="kategori_jurusan_mapel" required>
									<option value="">-- Pilih Kategori Mata Pelajaran --</option>
									<?php
									$list_jurusan = get_data_jurusan();
									if (count($list_jurusan) > 0) {
										foreach ($list_jurusan as $kode => $nama) {
											$terpilih = '';
											// if ($kategori_mapel == $kode) {
											// 	$terpilih = " selected";
											// }
											echo "<option value='$kode' $terpilih>$nama</option>";
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="text-center card-footer">
							<button type="submit" class="btn btn-info" name="next">Next</button>
							<!-- <button type="reset" class="btn btn-default">Reset</button> -->
						</div>
					</form>
				</div>
				<!-- <div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> -->
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- jQuery -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="../assets/plugins/toastr/toastr.min.js"></script>
	<!-- daterangepicker -->
	<script src="../assets/plugins/moment/moment.min.js"></script>
	<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- overlayScrollbars -->
	<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../assets/js/adminlte.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="../assets/plugins/jszip/jszip.min.js"></script>
	<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
	</script>
	<!-- SweetAlert2 -->
	<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="../assets/plugins/toastr/toastr.min.js"></script>
	<!-- Fade Out Element -->
	<script type="text/javascript">
		$('#fadeOut').delay(1500).fadeOut(1000).fadeOut("slow");
	</script>


</body>
</html>