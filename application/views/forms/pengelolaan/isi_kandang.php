
<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" hx-post="<?= base_url('form/get/pengelolaan/tambahisikandang/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($id){
			$CI =& get_instance();
			$CI->load->model('m_pengelolaan');
			$isi_kandang = $CI->m_pengelolaan->isi_kandang($id);
			if($isi_kandang){
				?>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Masuk</th>
							<th>Jumlah Masuk</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($isi_kandang as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->tanggal_masuk ?></td>
								<td><?= $value->jumlah_masuk ?></td>
								<td>
									<?php
									if($value->status==1){
										echo "Aktif";
									}else{
										echo "Tidak Aktif";
									}
									?>
								</td>
								<td>
									<button class="btn btn-sm btn-success" hx-post="<?= base_url('form/get/pengelolaan/editisikandang/'.$id.'/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-post="<?= base_url('form/get/pengelolaan/hapusisikandang/'.$id.'/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<?php
			}else{
				?> <div class="alert-danger p-3">0 Results</div> <?php
			}
		} 
		?>
	</div>
</div>
