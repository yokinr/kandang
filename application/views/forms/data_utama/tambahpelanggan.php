<form hx-post="<?= base_url('data_utama/data_pelanggan/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" placeholder="Nama" required>
		<label>Nama</label>
	</div>
	<div class="form-floating mb-3">
		<input type="email" name="email" class="form-control" placeholder="E-mail" required>
		<label>E-mail</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
		<label>Alamat</label>
	</div>
	<div class="form-floating mb-3">
		<input type="number" name="kontak" class="form-control" placeholder="Kontak" required>
		<label>Nomor Kontak</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>