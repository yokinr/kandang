<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$cekLokasi = $CI->m_data_utama->lokasi_id($id);
	if($cekLokasi){
		$nama = $cekLokasi['nama'];
		$alamat = $cekLokasi['alamat'];
		?>
		<form hx-post="<?= base_url('data_utama/data_lokasi/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $nama ?>">
				<label>Nama</label>
			</div>
			<div class="form-floating mb-3">
				<textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?= $alamat ?></textarea>
				<label>Alamat Lengkap</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-plus"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem</div> <?php
}
?>
