<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/data_utama/tambahpeternak') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($peternak){
			?>
			<table class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Nomor Kontak</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($peternak as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->alamat ?></td>
							<td><?= $value->kontak ?></td>
							<td>
								<button class="btn btn-link text-success" hx-post="<?= base_url('form/get/data_utama/editpeternak/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
								<button class="btn btn-link text-danger" hx-post="<?= base_url('data_utama/peternak/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert-danger p-5"> 0 Results </div> <?php
		}
		?>
	</div>
</div>