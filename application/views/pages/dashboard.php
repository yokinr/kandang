<div class="row">
	<div class="col-xl-3 col-md-6">
		<div class="card bg-primary text-white mb-4">
			<div class="card-body">
				<?= count($lokasi) ?>
				<h4>Lokasi</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_utama/lokasi') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-warning text-white mb-4">
			<div class="card-body">
				<?= count($kandang) ?>
				<h4>Kandang</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_utama/kandang') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-success text-white mb-4">
			<div class="card-body">
				<?= count($peternak) ?>
				<h4>Peternak</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_utama/peternak') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card bg-danger text-white mb-4">
			<div class="card-body">
				<?= count($pelanggan) ?>
				<h4>Pelanggan</h4>
			</div>
			<div class="card-footer d-flex align-items-center justify-content-between">
				<a class="small text-white stretched-link" href="<?= base_url('data_utama/pelanggan') ?>">View Details</a>
				<div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"></path></svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
			</div>
		</div>
	</div>
</div>

<?php
echo "<pre>";
print_r ($this->session->all_userdata());
echo "</pre>";