<div class="card">
	<div class="card-header">
		<?php
		if($lokasi){
			?>
			<div class="row">
				<div class="col">
					<form id="form_lokasi" method="GET">
						<div class="form-floating">
							<select name="lokasi" class="form-select" id="lokasi" hx-get="<?= base_url('pengelolaan/data_kandang') ?>" hx-target="#data">
								<option value="">...</option>
								<?php foreach ($lokasi as $key => $value): ?>
									<?php
									if($this->session->userdata('lokasi')){
										if($this->session->userdata('lokasi')==$value->uniq){
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
					<thead>
						<tr>
							<th>No</th>
							<th>Lokasi</th>
							<th>Nama Kandang</th>
							<th>Kapasitas</th>
							<th>Tanggal Masuk</th>
							<th>Jumlah Masuk</th>
							<th>Peternak</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kandang as $key => $value): $key++ ?>
							<?php
							$detailLokasi = $this->db->get_where('lokasi', ['uniq'=>$value->uniq_lokasi])->row_array();
							$cekIsiKandang = $this->db->get_where('isi_kandang', ['uniq_kandang'=>$value->uniq, 'status'=>1])->row_array();
							$cekPeternakKandang = $this->db->get_where('peternak_kandang', ['uniq_kandang'=>$value->uniq,'status'=>1])->row_array();
							?>
							<tr>
								<td><?= $key ?></td>
								<td>
									<?php
									if($detailLokasi){
										echo $detailLokasi['nama'];
									}else{
										echo "-";
									}
									?>
								</td>
								<td><?= $value->nama ?></td>
								<td><?= $value->kapasitas ?></td>
								<?php
								if($cekIsiKandang){
									echo "<td>".date('d-m-Y', strtotime($cekIsiKandang['tanggal_masuk']))."</td>";
									echo "<td>".$cekIsiKandang['jumlah_masuk']."</td>";
								}else{
									echo "<td></td>";
									echo "<td></td>";
								}
								?>
								<td>
									<?php
									if($cekPeternakKandang){
										$detailPeternak = $this->db->get_where('peternak', ['uniq'=>$cekPeternakKandang['uniq_peternak']])->row_array();
										if($detailPeternak){
											echo $detailPeternak['nama'];
										}else{
											echo $cekPeternakKandang['uniq_peternak'];
										}
									}else{
										echo "-";
									}
									?>
								</td>
								<td>
									<!-- <a href="<?= base_url('pengelolaan/page/detail_kandang/'.$value->uniq) ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a> -->
									<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/pengelolaan/isi_kandang/'.$value->uniq.'/'.$value->uniq_lokasi) ?>" hx-target=".modal-body"><i class="fas fa-list"></i></button>
									<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/pengelolaan/peternak_kandang/'.$value->uniq.'/'.$value->uniq_lokasi) ?>" hx-target=".modal-body" title="Peternak Kandang"><i class="fas fa-user"></i></button>
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
