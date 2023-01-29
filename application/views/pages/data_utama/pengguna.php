<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" hx-post="<?= base_url('form/get/data_utama/tambahpengguna') ?>" hx-target=".modal-body" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($pengguna){
			?>
			<table class="table table-sm table-striped table-bordered">
				<tbody>
					<?php foreach ($pengguna as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->username ?></td>
							<td><?= $value->hak_akses ?></td>
							<td>
								<button class="btn btn-link text-success"><i class="fas fa-edit"></i></button>
								<button class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
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