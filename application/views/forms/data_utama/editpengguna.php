<?php
if($id){
	$cekPengguna = $this->db->get_where('users', ['uniq'=>$id])->row_array();
	if($cekPengguna){
		?>
		<form hx-post="<?= base_url('data_utama/data_pengguna/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" class="form-control" value="<?= $cekPengguna['nama'] ?>" disabled>
				<label>Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" value="<?= $cekPengguna['username'] ?>" disabled>
				<label>Email</label>
			</div>
			<div class="form-floating mb-3">
				<select name="status" class="form-select">
					<option value="">...</option>
					<?php
					for ($i=0; $i < 2; $i++) { 
						if($cekPengguna['status']==$i){
							?> <option selected><?= $i ?></option> <?php
						}else{
							?> <option><?= $i ?></option> <?php
						}
					}
					?>
				</select>
				<label>Status</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control" minlength="8">
				<label>Password</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}
}
