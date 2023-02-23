<?php
$peternak = $this->db->get_where('peternak', ['status'=>1])->result();
$cekPeternak = $this->db->get_where('peternak_kandang', ['uniq'=>$id1])->row_array();
$id_peternak = $cekPeternak['uniq_peternak'];
$status = $cekPeternak['status'];
?>
<div class="col">
	<h3 class="text-center mb-3"><i class="fas fa-edit"></i><?= $id1 ?></h3>
	<form hx-post="<?= base_url('form/get/pengelolaan/peternak_kandang/'.$id) ?>" hx-target=".modal-body">
		<input type="hidden" name="page" value="edit_peternak_kandang">
		<input type="hidden" name="id" value="<?= $id1 ?>">
		<div class="form-floating mb-3">
			<select class="form-select" name="peternak" required>
				<option value="">...</option>
				<?php foreach ($peternak as $key => $value): ?>
					<?php
					if($value->uniq==$id_peternak){
						?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
					}else{
						?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
					}
					?>
				<?php endforeach ?>
			</select>
			<label>Nama Peternak</label>
		</div>

		<div class="form-floating mb-3">
			<select name="status" class="form-select">
				<?php
				for ($i=0; $i < 2; $i++) { 
					if($i==$status){
						?> <option selected><?= $i ?></option> <?php
					}else{
						?> <option><?= $i ?></option> <?php
					}
				}
				?>
			</select>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
</div>