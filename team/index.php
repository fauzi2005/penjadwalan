<?php
require "../config/functions.php";
require "../config/site-name.php";

$pageName = "team";

check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Team | <?= $siteName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/tutwurihandayani-logo.png">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="assets/img/tutwurihandayani-logo.png" alt="Tutwuri Handayani Logo" height="260" width="260">
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
							<h1 class="m-0">Team Kelompok 1</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
								<li class="breadcrumb-item active">Team</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- -------------------END Content Header (Page header)------------------- -->

			<!-- _______________________________________________________________________________________________________________________ -->

			<!-- Main content -->
			<section class="content">
				
				<!-- Default box -->
				<div class="card card-solid">
					<div class="card-body pb-0">
						<div class="row">

							<!-- Team 1 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Fauzi Maulana Habibi</b></h2>
												<h2 class="lead"><b>201943501203</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pembuat Web & Perancang Mockup Database </p>
											</div>	
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 2 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Andi Ami</b></h2>
												<h2 class="lead"><b>201943501259</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide dan Seksi Konsumsi serta penyedia tempat untuk kerja kelompok, pembuat Data Master Mata Pelajaran </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 3 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Adeng Nugraha</b></h2>
												<h2 class="lead"><b>201943501253</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide dan Seksi Konsumsi serta penyedia tempat untuk kerja kelompok, pembuat Data Master Hari & Sesi </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 4 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Isnaini Anwar Sanusi</b></h2>
												<h2 class="lead"><b>201943501275</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide dan pembuatan Data Master Guru </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 5 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Farras Akbar</b></h2>
												<h2 class="lead"><b>201943501220</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide dan pembuatan Data Master Jurusan </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 6 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Dhimas Ramadhan</b></h2>
												<h2 class="lead"><b>201943501304</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide dan pembuatan Data Master Kelas </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 7 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Muhammad Rifqi Muzhaffar</b></h2>
												<h2 class="lead"><b>201943501992</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Perancang Website dan pembuatan data transaksi </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Team 8 -->
							<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0"></div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b>Jordy Ritzq</b></h2>
												<h2 class="lead"><b>201943501285</b></h2>
												<p class="text-muted text-sm"><b>Kontribusi : </b> Pemberi Ide sekaligus pemberi semangat kepada rekan kelompok </p>
											</div>
											<div class="col-5 text-center">
												<img src="<?= BASE_URL ?>assets/uploads/foto-user/default-users.png" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>


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

	<script src="<?= BASE_URL ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= BASE_URL ?>assets/js/adminlte.min.js"></script>
</body>
</html>