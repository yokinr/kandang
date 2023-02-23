<form hx-post="<?= base_url('data_utama/data_pengguna/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<select name="hak_akses" class="form-select" hx-post="<?= base_url('data_utama/peran_pengguna') ?>" hx-target="#user">
			<option value="">...</option>
			<option value="2">Peternak</option>
			<option value="3">Pelanggan</option>
		</select>
		<label>Hak Akses</label>
	</div>
	<div class="form-floating mb-3">
		<select name="user" id="user" class="form-select">
			<option value="">...</option>
		</select>
		<label>User</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>