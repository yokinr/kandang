<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_pengelolaan');
	$CI->load->model('m_data_utama');
	$cekPeternakKandang = $CI->m_pengelolaan->peternak_kandang_id($id);
	$peternak = $CI->m_data_utama->peternak();
	?>
	<form hx-post="<?= base_url('pengelolaan/data_kandang/editpeternakkandang/'.$id.'/'.$id1) ?>" hx-target="#data">
		<div class="form-floating mb-3">
			<select name="peternak" class="form-select">
				<option value="">...</option>
				<?php foreach ($peternak as $key => $value): ?>
					<?php
					if($cekPeternakKandang['uniq_peternak']==$value->uniq){
						?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
					}else{
						?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
					}
					?>
				<?php endforeach ?>
			</select>
			<label>Peternak</label>
		</div>
		<div class="form-floating mb-3">
			<input type="date" name="tanggal_masuk" class="form-control" value="<?= $cekPeternakKandang['tanggal_masuk'] ?>">
		</div>
		<div class="form-floating mb-3">
			<select name="status" class="form-select">
				<?php
				for ($i=0; $i < 2; $i++) {
					if($cekPeternakKandang['status']==$i) {
						?> <option value="<?= $i ?>" selected><?= $i ?></option> <?php
					}else{
						?> <option value="<?= $i ?>"><?= $i ?></option> <?php
					}
				}
				?>
			</select>
			<label>Status</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			<button class="btn btn-dark" hx-post="<?= base_url('form/get/pengelolaan/peternak_kandang/'.$id1) ?>" hx-target=".modal-body"><i class="fas fa-arrow-left"></i> Kembali</button>
		</div>
	</form>
	<?php
}