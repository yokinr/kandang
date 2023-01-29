<?php
$lokasi = $this->db->get('lokasi')->result();
if($lokasi){
	?>
	<form hx-post="<?= base_url('data_utama/kandang/tambah') ?>" hx-target="#data">
		<div class="form-floating mb-3">
			<select name="lokasi" class="form-select">
				<option value="">...</option>
				<?php foreach ($lokasi as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label>Lokasi</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="nama" class="form-control" required>
			<label>Nama</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" name="kapasitas" class="form-control" required>
			<label>Kapasitas</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger">Terdeteksi belum ada data lokasi tersimpan </div> <?php
}