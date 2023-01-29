<form>
	<div class="form-floating">
		<select name="hak_akses" class="form-select" hx-post="<?= base_url('data_utama/peran') ?>" hx-target="#user">
			<option value="">...</option>
			<option value="2">Peternak</option>
			<option value="3">Pelanggan</option>
		</select>
		<label>Hak Akses</label>
	</div>
	<div class="form-floating">
		<select name="user" id="user" class="form-select">
			<option value="">...</option>
		</select>
	</div>
</form>