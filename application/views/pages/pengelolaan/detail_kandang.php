<?php
if($kandang){
	?>
	
	<?php
	echo "<pre>";
	print_r ($kandang);
	echo "</pre>";

	echo "<pre>";
	print_r ($isi_kandang);
	echo "</pre>";

	echo "<pre>";
	print_r ($peternak_kandang);
	echo "</pre>";
}else{
	?> <div class="alert-danger p-5">Data Kandang tidak ditemukan</div> <?php
}