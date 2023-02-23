<?php
if($id){
	$cekKandang = $this->db->get_where('kandang', ['uniq'=>$id])->row_array();
	$lokasi = $this->db->get('lokasi')->result();
	if($cekKandang){
		?>
		<form hx-post="<?= base_url('data_utama/data_kandang/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="lokasi" class="form-select">
					<option value="">...</option>
					<?php foreach ($lokasi as $key => $value): ?>
						<?php
						if($value->uniq===$cekKandang['uniq_lokasi']){
							?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
						}else{
							?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Lokasi</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" value="<?= $cekKandang['nama'] ?>" required>
				<label>Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="kapasitas" class="form-control" value="<?= $cekKandang['kapasitas'] ?>" required>
				<label>Kapasitas</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger"> Terjadi kesalahan sistem, data kandang tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger">Terjadi kesalahan sistem </div><?php
}