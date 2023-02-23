<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Core</div>
				<a class="nav-link" href="<?= base_url() ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">Interface</div>
				<!-- <a class="nav-link" href="<?= base_url('webservice') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
					Singkronisasi Data
				</a> -->
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Data Utama
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="<?= base_url('data_utama/lokasi') ?>">Data Lokasi</a>
						<a class="nav-link" href="<?= base_url('data_utama/kandang') ?>">Data Kandang</a>
						<a class="nav-link" href="<?= base_url('data_utama/peternak') ?>">Data Peternak</a>
						<a class="nav-link" href="<?= base_url('data_utama/pelanggan') ?>">Data Pelanggan</a>
						<a class="nav-link" href="<?= base_url('data_utama/kategori_barang') ?>">Kategori Barang</a>
						<a class="nav-link" href="<?= base_url('data_utama/barang') ?>">Data Barang</a>
						<a class="nav-link" href="<?= base_url('data_utama/pengguna') ?>">Data Pengguna</a>
					</nav>
				</div>
				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pengelolaan" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Pengelolaan
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="pengelolaan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="<?= base_url('pengelolaan/kandang') ?>">Kandang</a>
						<a class="nav-link" href="<?= base_url('pengelolaan/barang_masuk') ?>">Barang Masuk</a>
						<a class="nav-link" href="<?= base_url('pengelolaan/barang_keluar') ?>">Barang Keluar</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as:</div>
			<?=  $this->session->userdata('nama'); ?>
		</div>
	</nav>
</div>