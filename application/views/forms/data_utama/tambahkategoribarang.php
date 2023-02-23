<form hx-post="<?= base_url('data_utama/data_kategori_barang/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" required="">
		<label>Nama Kategori</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>