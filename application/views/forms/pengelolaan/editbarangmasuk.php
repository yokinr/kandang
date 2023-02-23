<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$barang = $CI->m_data_utama->barang();
	$CI->load->model('m_pengelolaan');
	$cekBarang = $CI->m_pengelolaan->barang_masuk_id($id);
	if($cekBarang){
		?>
		<form hx-post="<?= base_url("pengelolaan/data_barang_masuk/edit/".$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="barang" class="form-select">
					<option value="">...</option>
					<?php foreach ($barang as $key => $value): ?>
						<?php
						if($cekBarang['uniq_barang']==$value->uniq){
							?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
						}else{
							?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Barang</label>
			</div>
			<div class="form-floating mb-3">
				<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d', strtotime($cekBarang['tanggal'])) ?>" required>
				<label>Tanggal</label>
			</div>
			<div class="form-floating mb-3">
				<input type="number" name="jumlah" class="form-control" value="<?= $cekBarang['jumlah'] ?>" required>
				<label>Jumlah</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3">Terjadi kesalahan sistem, data tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger">Terjadi kesalahan sistem</div> <?php
}