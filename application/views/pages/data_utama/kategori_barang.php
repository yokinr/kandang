<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/data_utama/tambahkategoribarang') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($kategori_barang){
			?>
			<table class="table table-striped">
				<tbody>
					<?php foreach ($kategori_barang as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->nama ?></td>
							<td>
								<button class="btn btn-success btn-sm" hx-post="<?= base_url('form/get/data_utama/editkategoribarang/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-edit"></i></button>
								<button class="btn btn-danger btn-sm" hx-post="<?= base_url('data_utama/data_kategori_barang/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert-danger p-3"> 0 Results</div> <?php
		}
		?>
	</div>
</div>