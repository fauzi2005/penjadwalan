<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="<?= BASE_URL . 'assets/img/tutwurihandayani-logo.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">SMKN 19 Jakarta</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= BASE_URL . 'assets/upload/foto-user/' . $_SESSION['foto_user'] ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $_SESSION['nama_user'] ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<?php
					$subMenuActive = "";
					if ($pageName == "dashboard") {
						$subMenuActive = "active";
					}
					?>
					<a href="<?= BASE_URL ?>" class="nav-link <?= $subMenuActive ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<?php
				$menuOpen = "";
				$headMenuActive = "";
				if ($pageName == "data-kelas-add" || $pageName == "data-kelas-edit" || $pageName == "data-kelas" ||
					$pageName == "data-guru-add" || $pageName == "data-guru-edit" || $pageName == "data-guru" ||
					$pageName == "data-mapel-add" || $pageName == "data-mapel-edit" || $pageName == "data-mapel" ||
					$pageName == "data-hari-sesi-add" || $pageName == "data-hari-sesi-edit" || $pageName == "data-hari-sesi") {
					$menuOpen = "menu-open";
					$headMenuActive = "active";
				}
				?>
				<li class="nav-item <?= $menuOpen ?>">
					<a href="#" class="nav-link <?= $headMenuActive ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>Data Master<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<?php
							$subMenuActive = "";
							if ($pageName == "data-kelas-add" || $pageName == "data-kelas-edit" || $pageName == "data-kelas") {
								$subMenuActive = "active";
							}
							?>
							<a href="<?= BASE_URL . 'data-kelas/' ?>" class="nav-link <?= $subMenuActive ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Kelas</p>
							</a>
						</li>
						<li class="nav-item">
							<?php
							$subMenuActive = "";
							if ($pageName == "data-guru-add" || $pageName == "data-guru-edit" || $pageName == "data-guru") {
								$subMenuActive = "active";
							}
							?>
							<a href="<?= BASE_URL . 'data-guru/' ?>" class="nav-link <?= $subMenuActive ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Guru</p>
							</a>
						</li>
						<li class="nav-item">
							<?php
							$subMenuActive = "";
							if ($pageName == "data-mapel-add" || $pageName == "data-mapel-edit" || $pageName == "data-mapel") {
								$subMenuActive = "active";
							}
							?>
							<a href="<?= BASE_URL . 'data-mapel/' ?>" class="nav-link <?= $subMenuActive ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Mata Pelajaran</p>
							</a>
						</li>
						<li class="nav-item">
							<?php
							$subMenuActive = "";
							if ($pageName == "data-hari-sesi-add" || $pageName == "data-hari-sesi-edit" || $pageName == "data-hari-sesi") {
								$subMenuActive = "active";
							}
							?>
							<a href="<?= BASE_URL . 'data-hari-sesi/' ?>" class="nav-link <?= $subMenuActive ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Hari & Sesi</p>
							</a>
						</li>
					</ul>
				</li>

				<?php
				$menuOpen = "";
				$headMenuActive = "";
				if ($pageName == "data-guru-mapel-add" || $pageName == "data-guru-mapel-edit" || $pageName == "data-guru-mapel") {
					$menuOpen = "menu-open";
					$headMenuActive = "active";
				}
				?>
				<li class="nav-item <?= $menuOpen ?>">
					<a href="#" class="nav-link <?= $headMenuActive ?>">
						<i class="nav-icon fas fa-edit"></i>
						<p>Data Transaction<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<?php
							$subMenuActive = "";
							if ($pageName == "data-guru-mapel-add" || $pageName == "data-guru-mapel-edit" || $pageName == "data-guru-mapel") {
								$subMenuActive = "active";
							}
							?>
							<a href="<?= BASE_URL . 'data-guru-mapel/' ?>" class="nav-link <?= $subMenuActive ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Guru Mata Pelajaran</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Penjadwalan</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Report
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Jadwal Mata Pelajaran</p>
							</a>
						</li>
					</ul>
				</li>

				<br><br>

				<li class="nav-item">
					<a href="<?= BASE_URL . 'logout/' ?>" class="nav-link bg-danger">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Log Out</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>