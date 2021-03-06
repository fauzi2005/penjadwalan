<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<?php
			$subMenuActive = "";
			if ($pageName == "dashboard") {
				$subMenuActive = "active";
			}
			?>
			<a href="<?= BASE_URL ?>" class="nav-link <?= $subMenuActive ?>">Home</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<?php
			$subMenuActive = "";
			if ($pageName == "team") {
				$subMenuActive = "active";
			}
			?>
			<a href="<?= BASE_URL ?>team/" class="nav-link <?= $subMenuActive ?>">Team / Contact</a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">

		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-user"></i>
				<!-- <span class="badge badge-warning navbar-badge">15</span> -->
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">Hello, <?= $_SESSION['nama_user'] ?></span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-user-circle mr-2"></i> Profile
					<!-- <span class="float-right text-muted text-sm">3 mins</span> -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?= BASE_URL . 'logout/' ?>" class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt mr-2"></i> Log Out</a>
			</div>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fas fa-expand-arrows-alt"></i>
			</a>
		</li>

		<!-- <li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
				<i class="fas fa-th-large"></i>
			</a>
		</li> -->
	</ul>
</nav>
<!-- /.navbar -->
<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
	<!-- Control sidebar content goes here -->
	<!-- </aside> -->
<!-- /.control-sidebar -->