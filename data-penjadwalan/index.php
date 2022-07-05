<?php 
require "../config/site-name.php";
require "../config/koneksi.php";
require "../config/functions.php";

check_login();

$isSuccess = FALSE;

$pageName = "data-penjadwalan";

$conn = open_connection();

// $query = ("SELECT tb_guru_mapel.kode_gmp, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_guru_mapel
// 	INNER JOIN tb_guru
// 	ON tb_guru_mapel.kode_guru = tb_guru.kode_guru
// 	INNER JOIN tb_mapel
// 	ON tb_guru_mapel.kode_mapel = tb_mapel.kode_mapel
// 	INNER JOIN tb_jurusan
// 	ON tb_guru_mapel.kode_jurusan_mapel = tb_jurusan.nama_jurusan");

// $query = ("SELECT kode_jadwal.tb_jadwal, nama_hari.tb_hari, kelas.tb_jadwal, kode_gmp.tb_jadwal, kode_sesi.tb_jadwal FROM tb_jadwal INNER JOIN tb_hari	ON tb_jadwal.kode_hari = tb_hari.kode_hari");

$query = ("SELECT tb_jadwal.kode_jadwal, tb_hari.nama_hari, tb_jadwal.kelas, tb_jadwal.kode_gmp, tb_jadwal.kode_sesi, tb_sesi.jam_mulai, tb_sesi.jam_selesai, tb_jurusan.nama_jurusan FROM tb_jadwal INNER JOIN tb_hari ON tb_jadwal.kode_hari = tb_hari.kode_hari, tb_sesi, tb_jurusan, tb_kelas WHERE tb_sesi.kode_sesi = tb_jadwal.kode_sesi AND tb_jadwal.kelas = tb_kelas.kode_kelas AND tb_kelas.jurusan = tb_jurusan.kode_jurusan ORDER BY tb_jadwal.kode_hari, tb_jadwal.kelas, tb_sesi.id ASC");


$dataPenjadwalan = mysqli_query($conn, $query);
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Guru Penjadwalan | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="../assets/img/tutwurihandayani-logo.png">

	<?php 
	include "../layouts/head-script.php"
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
							<h1 class="m-0">Data Penjadwalan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Data Penjadwalan</li>
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
									<h3 class="card-title">List Data Penjadwalan</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="card-title">
										<!-- <a href="data-penjadwalan-add.php" title="Data Penjadwalan Add" class="btn btn-primary">Tambah Data Penjadwalan</a> -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
											<i class="fas fa-plus-circle"></i> Buat Penjadwalan
										</button>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg2	">
											<i class="fas fa-eye"></i> Lihat Detail Kode GMP
										</button>
									</div>
									<br><br>
									<table id="dataTable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Hari</th>
												<th>Kelas</th>
												<th>Jurusan</th>
												<th>Kode GMP</th>
												<th>Sesi</th>
												<th>Jam Mulai</th>
												<th>Jam Selesai</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dataPenjadwalan as $penjadwalan) : ?>
												<?php
												if ($penjadwalan['kode_sesi'] == "rest1" || $penjadwalan['kode_sesi'] == "rest2") {
													$penjadwalan['kode_sesi'] = "Istirahat";
												}
												?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $penjadwalan['nama_hari']; ?></td>
													<td><?= $penjadwalan['kelas']; ?></td>
													<td><?= $penjadwalan['nama_jurusan']; ?></td>
													<td><?= $penjadwalan['kode_gmp']; ?></td>
													<td><?= $penjadwalan['kode_sesi']; ?></td>
													<td><?= $penjadwalan['jam_mulai']; ?></td>
													<td><?= $penjadwalan['jam_selesai']; ?></td>

													<td>
														<a href="<?= BASE_URL . 'data-penjadwalan/data-penjadwalan-edit.php?kode_jadwal=' . $penjadwalan["kode_jadwal"] ?>" title="Edit" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
														<a href="javascript:void(0)" class="btn btn-danger" id="data-row" data-id="<?= $penjadwalan['kode_jadwal'] ?>"  title="Delete"><i class="fas fa-trash"></i></a>
													</td>
												</tr>
												<?php 
												$i++;
												?>
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
					<h4 class="modal-title">Pilih Hari Yang Ingin Dijadwalkan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Note :<br><i class="text-danger">*Pilih hari yang ingin dijadikan parameter untuk pembuatan Penjadwalan.</i></p>
					<!-- form start -->
					<form class="form-horizontal" method="GET" action="<?= BASE_URL . 'data-penjadwalan/data-penjadwalan-add.php'?>">
						<div class="form-group row">
							<label for="inputKategoriJurusanMapel" class="col-sm-4 col-form-label">Hari</label>
							<div class="col-sm-8">
								<select class="form-control" name="kode_hari" required>
									<option value="">-- Pilih Hari Penjadwalan 	 --</option>
									<?php
									$list_hari = get_data_hari();
									if (count($list_hari) > 0) {
										foreach ($list_hari as $kode => $nama) {
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
							<button type="submit" class="btn btn-info" name="next" value="TRUE">Next</button>
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

	<div class="modal fade" id="modal-lg2">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Detail Kode GMP</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<?php 
				$queryGMP = ("SELECT tb_guru_mapel.kode_gmp, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_guru_mapel
					INNER JOIN tb_guru
					ON tb_guru_mapel.kode_guru = tb_guru.kode_guru
					INNER JOIN tb_mapel
					ON tb_guru_mapel.kode_mapel = tb_mapel.kode_mapel
					INNER JOIN tb_jurusan
					ON tb_guru_mapel.kode_jurusan_mapel = tb_jurusan.kode_jurusan");

				$dataGuruMapel = mysqli_query($conn, $queryGMP);
				?>

				<div class="modal-body">					
					<table id="tableGMP" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Kode GMP</th>
								<th>Nama Guru</th>
								<th>Mata Pelajaran</th>
								<th>Jurusan</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($dataGuruMapel as $guruMapel) : ?>
								<tr>
									<td><?= $guruMapel["kode_gmp"]; ?></td>
									<td><?= $guruMapel["nama_guru"]; ?></td>
									<td><?= $guruMapel["nama_mapel"]; ?></td>
									<td><?= $guruMapel["nama_jurusan"]; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

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
				"pageLength": 25,
				"lengthMenu": [ [25, 50, 100, -1], [25, 50, 100, "All"] ],
				"autoWidth": false,
				"ordering": false,
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

		$(function () {
			$("#tableGMP").DataTable({
				"responsive": false,
				"lengthChange": true,
				"pageLength": 10,
				"lengthMenu": [ [10, 25, 50, 100], [10, 25, 50, 100] ],
				"autoWidth": false,
				"ordering": false,
				// "info": true,
				"dom" : 
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
							url: 'data-penjadwalan-delete.php',
							type: 'POST',
							data: 'kode_jadwal='+dataRow
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