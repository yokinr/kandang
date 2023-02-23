<?php
if($id){
	?>
	<div class="form-floating mb-3">
		<div class="alert-danger p-3">
			Tekan Hapus untuk melanutkan !
		</div>
	</div>
	<div class="d-block">
		<button class="btn btn-danger" hx-post="<?= base_url('pengelolaan/data_kandang/hapusisikandang/'.$id1) ?>" hx-target="#data"><i class="fas fa-trash"></i> Hapus</button>
		<button class="btn btn-dark" hx-post="<?= base_url('form/get/pengelolaan/isi_kandang/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-arrow-left"></i> Kembali</button>
	</div>
	<?php
}
?>
