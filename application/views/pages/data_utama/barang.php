<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" hx-post="<?= base_url('form/get/data_utama/tambahbarang') ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($barang){
			?>
			<table class="table table-striped table-bordered">
				<tbody>
					<?php foreach ($barang as $key => $value): $key++ ?>
						<?php
						$kategori = $this->db->get_where('kategori_barang', ['uniq'=>$value->uniq_kategori])->row_array();
						?>
						<tr>
							<td><?= $key ?></td>
							<td>
								<?php
								if($kategori){
									echo $kategori['nama'];
								}else{
									echo "-";
								}
								?>
							</td>
							<td><?= $value->nama ?></td>
							<td><?= $value->keterangan ?></td>
							<td>
								<button class="btn btn-sm btn-success" hx-post="<?= base_url('form/get/data_utama/editbarang/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
								<button class="btn btn-sm btn-danger" hx-post="<?= base_url('data_utama/data_barang/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert-danger p-3">0 Results</div> <?php
		}
		?>
	</div>
</div>