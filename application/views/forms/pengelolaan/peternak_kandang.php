<?php
if($id){
	$cekKandang = $this->db->get_where('kandang', ['uniq'=>$id])->row_array();
	$peternak = $this->db->get_where('peternak', ['status'=>1])->result();
	if($cekKandang){
		if($peternak){
			$cekPeternak = $this->db->get_where('peternak_kandang', ['uniq_kandang'=>$id])->result();
			if($cekPeternak){
				echo "<pre>";
				print_r ($cekPeternak);
				echo "</pre>";
			}else{
				$icon = "<i class='fas fa-plus-square'></i>";
				$aksi = "tambah_peternak_kandang";
				form($id, $cekKandang,$peternak, $aksi, $icon);
			}
		}else{
			?> <div class="alert-danger">Belum ada data Peternak tersimpan</div> <?php
		}
	}else{
		?> <div class="alert-danger">Terjadi kesalahan sistem, data kandang tidak ditemukan</div> <?php
	}
}else{
	?> <div class="alert-danger">Terjadi kesalahan sistem</div> <?php
}

function form($id, $cekKandang, $peternak, $aksi, $icon)
{
	?>
	<h3 class="text-center mb-3"><?= $icon.' '.ucwords(str_replace('_', ' ', $aksi)) ?></h3>
	<form hx-post="<?= base_url('pengelolaan/kandang/'.$aksi) ?>" hx-target="#data">
		<input type="hidden" name="id" value="<?= $id ?>">
		<div class="form-floating mb-3">
			<input type="text" class="form-control" value="<?= $cekKandang['nama'] ?>" disabled>
		</div>
		<div class="form-floating mb-3">
			<select class="form-select" name="peternak" required>
				<option value="">...</option>
				<?php foreach ($peternak as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label>Nama Peternak</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}
?>