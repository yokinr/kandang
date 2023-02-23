<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$barang = $CI->m_data_utama->barang_id($id);
	$kategori_barang = $CI->m_data_utama->kategori_barang();
	if($barang){
		?>
		<form hx-post="<?= base_url("data_utama/data_barang/edit/".$id) ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="kategori" class="form-select" required>
					<option value="">...</option>
					<?php foreach ($kategori_barang as $key => $value): ?>
						<?php
						if($barang['uniq_kategori']==$value->uniq){
							?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
						}else{
							?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Kategori</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="nama" class="form-control" value="<?= $barang['nama'] ?>" required="">
				<label>Nama Barang</label>
			</div>
			<div class="form-floating mb-3">
				<textarea class="form-control" name="keterangan"><?= $barang['keterangan'] ?></textarea>
				<label>Keterangan</label>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger"> TErjadi kesalahan sistem, data tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger p-3">Terjadi kesalahan sistem</div> <?php
}