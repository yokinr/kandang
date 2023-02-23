<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$peternak = $CI->m_data_utama->peternak();
	if($peternak){
		?>
		<form hx-post="<?= base_url('pengelolaan/data_kandang/tambahpeternakkandang/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select class="form-select" name="peternak" required>
					<option value="">...</option>
					<?php foreach ($peternak as $key => $value): ?>
						<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
					<?php endforeach ?>
				</select>
				<label>Peternak</label>
			</div>
			<div class="form-floating mb-3">
				<input type="date" name="tanggal_masuk" class="form-control" value="<?= date('Y-m-d') ?>" required>
				<label>Tanggal Masuk</label>
			</div>
			<div class="form-floating mb-3">
				<select name="status" class="form-select" required>
					<option value="">....</option>
					<option value="0">Tidak Aktif</option>
					<option value="1" selected>Aktif</option>
				</select>
				<label>Status</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<button class="btn btn-dark" hx-post="<?= base_url('form/get/pengelolaan/peternak_kandang/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-arrow-left"></i> Kembali</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger"> Belum ada data peternak tersimpan </div> <?php
	}
}