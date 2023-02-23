<form hx-post="<?= base_url('data_utama/data_lokasi/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" placeholder="Nama">
		<label>Nama</label>
	</div>
	<div class="form-floating mb-3">
		<textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
		<label>Alamat Lengkap</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-plus"></i> Simpan</button>
	</div>
</form>