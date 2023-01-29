<div class="card">
	<div class="card-header">
		<?php
		if($lokasi){
			?>
			<div class="row">
				<div class="col">
					<form id="form_lokasi" method="GET">
						<div class="form-floating">
							<select name="lokasi" class="form-select" id="lokasi" hx-get="<?= base_url('data_utama/kandang') ?>" hx-target="#data">
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
					<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/data_utama/tambahkandang') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
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
				<table class="table table-striped">
					<tbody>
						<?php foreach ($kandang as $key => $value): $key++ ?>
							<?php
							$cekLokasi = $this->db->get_where('lokasi', ['uniq'=>$value->uniq_lokasi])->row_array();
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $cekLokasi['nama'] ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->kapasitas ?></td>
								<td class="text-center">
									<button class="btn btn-link text-success" hx-post="<?= base_url('form/get/data_utama/editkandang/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
									<button class="btn btn-link text-danger" hx-post="<?= base_url('data_utama/kandang/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
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
