<?php
if($id1){
	$CI =& get_instance();
	$CI->load->model('m_pengelolaan');
	$isi_kandang = $CI->m_pengelolaan->isi_kandang_id($id1);
	if($isi_kandang){
		?>
		<form hx-post="<?= base_url('pengelolaan/data_kandang/editisikandang/'.$id1.'/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk" value="<?= $isi_kandang['tanggal_masuk'] ?>" required>
				<label>Tanggal Masuk</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="jumlah_masuk" class="form-control" placeholder="Tanggal Masuk" value="<?= $isi_kandang['jumlah_masuk'] ?>" required>
				<label>Jumlah Masuk</label>
			</div>
			<div class="form-floating mb-3">
				<select name="status" class="form-select" required>
					<?php
					for ($i=0; $i < 2; $i++) { 
						if($i==1){$status="Aktif";}else if($status==0){$status="Tidak Aktif";}
						if($isi_kandang['status']==$i){
							?> <option value="<?= $i ?>" selected><?= $status ?></option> <?php
						}else{
							?> <option value="<?= $i ?>"><?= $status ?></option> <?php
						}
					}
					?>
				</select>
				<label>Status</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<button class="btn btn-dark" hx-post="<?= base_url('form/get/pengelolaan/isi_kandang/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-arrow-left"></i> Kembali</button>
			</div>
		</form>
		<?php
	}
}