<?php 
session_start();

require "../config/koneksi.php";
require "../config/functions.php";
$isSuccess = FALSE;
$pageName = "data-kelas";

$conn = open_connection();

$query = ("SELECT tb_kelas.kode_kelas, tb_kelas.kelas, tb_jurusan.nama_jurusan FROM tb_kelas INNER JOIN tb_jurusan ON tb_kelas.jurusan = tb_jurusan.kode_jurusan");
$dataKelas = mysqli_query($conn, $query);
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMKN 19 Jakarta | Data Kelas</title>
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
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">List Data Kelas</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="card-title">
										<a href="data-kelas-add.php" title="Data Kelas Add" class="btn btn-primary">Tambah Data Kelas</a>
										<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
											Add Data Kelas
										</button> -->
									</div>
									<br><br>
									<table id="dataTable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Kode Kelas</th>
												<th>Kelas</th>
												<th>Jurusan</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dataKelas as $kelas) : ?>
												<tr>
													<td><?= $kelas["kode_kelas"]; ?></td>
													<td><?= $kelas["kelas"]; ?></td>
													<td><?= $kelas["nama_jurusan"]; ?></td>
													<td>
														<a href="<?= BASE_URL . 'data-kelas/data-kelas-edit.php?kode_kelas=' . $kelas["kode_kelas"] ?>" title="Edit" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
														<a href="javascript:void(0)" class="btn btn-danger" id="data-row" data-id="<?= $kelas['kode_kelas'] ?>" title="Delete"><i class="fas fa-trash"></i></a>
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

	<?php 
	include "../layouts/footer-script.php";
	?>

	<!-- Page specific script -->
	<script>
		// Datatables
		$(function () {
			$("#dataTable").DataTable({
				"responsive": false,
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
			}).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
		});

		// Fun Fade Out
		$('#fadeOut').delay(1500).fadeOut(1000).fadeOut("slow");

		// Trigger Delete Button
		$(document).ready(function(){
			$(document).on('click', '#data-row', function(e){
				var dataRow = $(this).data('id');
				SwalDelete(dataRow);
				e.preventDefault();
			})
		})

		// Fun Delete Button
		function SwalDelete(dataRow){
			Swal.fire({
				title: 'Anda Yakin?',
				text: 'Anda tidak akan dapat memulihkan data ini!',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#d33',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Ya, hapus!',
				showLoaderOnConfirm: true,

				preConfirm: function(){
					return new Promise(function(resolve){
						$.ajax({
							url: 'data-kelas-delete.php',
							type: 'POST',
							data: 'kode_kelas='+dataRow
						})
						.done(function(response){
							Swal.fire({
								icon: 'success',
								title: 'Deleted!',
								text: 'Hapus data berhasil!',
								confirmButtonColor: '#3085d6'
							}).then(okay => {
								if (okay) {
									window.location.reload();
								}
							});

							
						})
						.fail(function(){
							Swal.fire('Oops....', 'Something went wrong with ajax!', 'error');
						});
					});
				},
				allowOutsideClick: false
			});
		}
	</script>

</body>
</html>