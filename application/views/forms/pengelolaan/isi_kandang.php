<?php
if($id){
	$cekKandang = $this->db->get_where('kandang', ['uniq'=>$id])->row_array();
	if($cekKandang){
		$cekIsikandang = $this->db->get_where('isi_kandang', ['uniq_kandang'=>$id])->result();
		if($cekIsikandang){
			if(count($cekIsikandang)>=1){
				$nama = $cekKandang['nama'];
				$kapasitas = $cekKandang['kapasitas'];
				$jml_masuk = $cekIsikandang[0]->jml_masuk;
				$icon = "<i class='fas fa-edit'></i>";
				$aksi = 'edit_jumlah_masuk';
				form($id, $nama, $kapasitas, $jml_masuk, $aksi, $icon);
			}else{
				echo count($cekIsikandang);
			}
		}else{
			$nama = $cekKandang['nama'];
			$kapasitas = $cekKandang['kapasitas'];
			$jml_masuk = null;
			$icon = "<i class='fas fa-plus-square'></i>";
			$aksi = "tambah_jumlah_masuk";
			form($id, $nama, $kapasitas, $jml_masuk, $aksi, $icon);
		}
	}else{
		?> <div class="alert-danger p-5">Terjadi kesalahan sistem, data kandang tidak ditemukan</div> <?php
	}
	
}else{
	?> <div class="alert-danger p-5">Terjadi kesalahan sistem</div> <?php
}

function form($id, $nama, $kapasitas, $jml_masuk, $aksi, $icon)
{
	?>
	<h3 class="mb-3 text-center"><?= $icon.' '.ucwords(str_replace('_', ' ', $aksi)) ?></h3>
	<form hx-post="<?= base_url('pengelolaan/kandang/'.$aksi) ?>" hx-target="#data">
		<input type="hidden" name="id" value="<?= $id ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control disabled" value="<?= $nama ?>" disabled>
			<label>Nama</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" class="form-control" value="<?= $kapasitas ?>" disabled>
			<label>Kapasitas</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" class="form-control" name="jml_masuk" value="<?= $jml_masuk ?>">
			<label>Jumlah Masuk</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}

?>