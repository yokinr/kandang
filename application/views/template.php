
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Dashboard - SB Admin</title>
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/AdminLTELogo.png') ?>">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/summernote.css') ?>">
	<script src="<?= base_url('assets/js/htmx.js') ?>"></script>
	<style type="text/css">
		.alert{
			position: fixed;
			top: 1em;
			right: 1em;
			z-index: 2000;
			max-width: 300px;
		}
	</style>
</head>
<body class="sb-nav-fixed">
	<?php require('layout/top_nav.php'); ?>
	<div id="layoutSidenav">
		<?php require('layout/side_nav.php') ?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h3 class="mt-4"><?= $title ?></h3>
					<hr>
					<div hx-get="<?= $dataget ?>" hx-target="#data" hx-trigger='load'>
						<div id="data"><div class="text-center"><img class="htmx-indicator" class="" style="width: 100px;height: 100px;" src="<?= base_url('assets/img/') ?>spinner.gif"></div></div>
					</div>

				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2022</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
					<div class="text-center"><img class="htmx-indicator" class="" style="width: 100px;height: 100px;" src="<?= base_url('assets/img/') ?>spinner.gif"></div>
				</div>
				<div id="message"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
	<script src="<?= base_url('assets/js/style.js') ?>"></script>
	<script src="<?= base_url('assets/js/summernote.js') ?>"></script>
	<script type="text/javascript">
		setInterval(function(){$('.alert').addClass('d-none')}, 5000);
	</script>
</body>
</html>
