<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" hx-post="<?= base_url('form/get/pengelolaan/tambahbarangmasuk') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($barang_masuk){
			?>
			<table class="table table-striped">
				<tbody>
					<?php foreach ($barang_masuk as $key => $value): $key++ ?>
						<?php
						$detailBarang = $this->db->get_where('barang', ['uniq'=>$value->uniq_barang])->row_array();
						?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->tanggal ?></td>
							<td>
								<?php
								if($detailBarang){
									echo $detailBarang['nama'];
								}else{
									echo $value->uniq_barang;
								}
								?>
							</td>
							<td><?= $value->jumlah ?></td>
							<td>
								<button class="btn btn-success btn-sm" hx-post="<?= base_url('form/get/pengelolaan/editbarangmasuk/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
								<button class="btn btn-danger btn-sm" hx-post="<?= base_url('pengelolaan/data_barang_masuk/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert-danger p-3">0 Results </div> <?php
		}
		?>
	</div>
</div>