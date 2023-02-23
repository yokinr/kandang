<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" hx-post="<?= base_url('form/get/pengelolaan/tambahpeternakkandang/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($id){
			$CI =& get_instance();
			$CI->load->model('m_pengelolaan');
			$this->db->order_by('status', 'desc');
			$cekPeternak = $CI->m_pengelolaan->peternak_kandang($id);
			if($cekPeternak){
				?>
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Peternak</th>
							<th>Tanggal Masuk</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cekPeternak as $key => $value): $key++ ?>
							<?php
							$detailPeternak = $this->db->get_where('peternak', ['uniq'=>$value->uniq_peternak])->row_array();
							?>
							<tr>
								<td><?= $key ?></td>
								<td>
									<?php
									if($detailPeternak){
										echo $detailPeternak['nama'];
									}else{
										echo $value->uniq_peternak;
									}
									?>
								</td>
								<td><?= $value->tanggal_masuk ?></td>
								<td><?= $value->status ?></td>
								<td>
									<button class="btn btn-success btn-sm" hx-post="<?= base_url('form/get/pengelolaan/editpeternakkandang/'.$value->uniq.'/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-post="<?= base_url('form/get/pengelolaan/hapuspeternakkandang/'.$value->uniq.'/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3">0 Results</div> <?php
		}
	}else{
		?> <div class="alert-danger">Terjadi kesalahan sistem</div> <?php
	}
	?>
</div>

