<?php
$CI =& get_instance();
$CI->load->model('m_data_utama');
$barang = $CI->m_data_utama->barang();
if($barang){
	?>
	<form hx-post="<?= base_url("pengelolaan/data_barang_masuk/tambah") ?>" hx-target="#data">
		<div class="form-floating mb-3">
			<select name="barang" class="form-select">
				<option value="">...</option>
				<?php foreach ($barang as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label>Barang</label>
		</div>
		<div class="form-floating mb-3">
			<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
			<label>Tanggal</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" name="jumlah" class="form-control" required>
			<label>Jumlah</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger">Belum ada data barang tersimpan</div> <?php
}