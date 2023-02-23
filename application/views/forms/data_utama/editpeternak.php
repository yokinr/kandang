<?php
if($id){
	$cekPeternak = $this->db->get_where('peternak', ['uniq'=>$id])->row_array();
	if($cekPeternak){
		?>
		<form hx-post="<?= base_url('data_utama/data_peternak/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $cekPeternak['nama'] ?>" required>
				<label>Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $cekPeternak['email'] ?>" required>
				<label>E-mail</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $cekPeternak['alamat'] ?>" required>
				<label>Alamat</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="kontak" class="form-control" placeholder="Kontak" value="<?= $cekPeternak['kontak'] ?>" required>
				<label>Nomor Kontak</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-5">Terjadi kesalahan sistem, data peternak tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger p-5">Terjadi kesalahan sistem</div> <?php
}