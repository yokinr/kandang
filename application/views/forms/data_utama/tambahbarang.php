<?php
$CI =& get_instance();
$CI->load->model('m_data_utama');
$kategori_barang = $CI->m_data_utama->kategori_barang();
if($kategori_barang){
	?>
	<form hx-post="<?= base_url("data_utama/data_barang/tambah") ?>" hx-target="#data">
		<div class="form-floating mb-3">
			<select name="kategori" class="form-select" required>
				<option value="">...</option>
				<?php foreach ($kategori_barang as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label>Kategori</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="nama" class="form-control" required="">
			<label>Nama Barang</label>
		</div>
		<div class="form-floating mb-3">
			<textarea class="form-control" name="keterangan"></textarea>
			<label>Keterangan</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger p-3"> Belum ada data kategori barang tersimpan</div> <?php
}
?>
