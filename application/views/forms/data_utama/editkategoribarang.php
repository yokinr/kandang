<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama', 'data_utama');
	$kategori_barang = $CI->data_utama->kategori_barang_id($id);
	if($kategori_barang){
		?>
		<form hx-post="<?= base_url('data_utama/data_kategori_barang/edit/'.$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" required="" value="<?= $kategori_barang['nama'] ?>">
				<label>Nama Kategori</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger"> Terjadi kesalahan sistem, data tidak ditemukan !</div> <?php
	}
}else{
	?> <div class="alert-danger p-3">Terjadi kesalahan sistem</div> <?php
}