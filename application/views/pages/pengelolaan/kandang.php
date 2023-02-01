<div class="card">
	<div class="card-header">
		<?php
		if($lokasi){
			?>
			<div class="row">
				<div class="col">
					<form id="form_lokasi" method="GET">
						<div class="form-floating">
							<select name="lokasi" class="form-select" id="lokasi" hx-get="<?= base_url('pengelolaan/kandang') ?>" hx-target="#data">
								<option value="">...</option>
								<?php foreach ($lokasi as $key => $value): ?>
									<?php
									if($getLokasi){
										if($getLokasi==$value->uniq){
											?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
										}else{
											?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
										}
									}else{
										?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
									}
									?>
								<?php endforeach ?>
							</select>
							<label>Pilih Lokasi</label>
						</div>
					</form>
				</div>
				<div class="col">
					<!-- <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/pengelolaan/tambahkandang') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button> -->
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<div class="card-body">
		<?php
		if($lokasi){
			if($kandang){
				?>
				<table class="table table-sm table-striped table-bordered">
					<tbody>
						<?php foreach ($kandang as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->kapasitas ?></td>
								<td>
									<?php
									$cekIsiKandang = $this->db->get_where('isi_kandang', ['uniq_kandang'=>$value->uniq])->row_array();
									if($cekIsiKandang){
										echo $cekIsiKandang['jml_masuk'];
									}else{
										echo 0;
									}
									?>
								</td>
								<td>
									<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/pengelolaan/isi_kandang/'.$value->uniq.'/'.$value->uniq_lokasi) ?>" hx-target=".modal-body"><i class="fas fa-list"></i></button>
									<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/pengelolaan/peternak_kandang/'.$value->uniq.'/'.$value->uniq_lokasi) ?>" hx-target=".modal-body"><i class="fas fa-user"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<?php
			}else{
				?> <div class="alert-danger p-5">0 Results </div> <?php
			}
		}else{
			?> <div class="alert-danger p-5"> Terdeteksi belum ada data lokasi tersimpan </div> <?php
		}
		?>
	</div>
</div>
