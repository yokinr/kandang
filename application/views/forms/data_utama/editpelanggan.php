<?php
if($id){
	$cekpelanggan = $this->db->get_where('pelanggan', ['uniq'=>$id])->row_array();
	if($cekpelanggan){
		?>
		<form hx-post="<?= base_url('data_utama/pelanggan/edit') ?>" hx-target="#data">
			<input type="hidden" name="id" value="<?= $id ?>">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $cekpelanggan['nama'] ?>" required>
				<label>Nama</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $cekpelanggan['alamat'] ?>" required>
				<label>Alamat</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="kontak" class="form-control" placeholder="Kontak" value="<?= $cekpelanggan['kontak'] ?>" required>
				<label>Nomor Kontak</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-5">Terjadi kesalahan sistem, data pelanggan tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger p-5">Terjadi kesalahan sistem</div> <?php
}