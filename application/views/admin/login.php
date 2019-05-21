<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>public/images/apple-icon.png">
	<link rel="icon" type="image/png" href="<?= base_url() ?>public/images/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Now UI Dashboard by Creative Tim
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- CSS Files -->
	<link href="<?= base_url() ?>public/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>public/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
	<link href="<?= base_url() ?>public/css/my.css" rel="stylesheet" />
	<script type="text/javascript">
		var baseUrl = '<?= base_url(); ?>';
	</script>
</head>

<body class="">
	<div class="wrapper ">
		<div class="panel-header panel-header-sm height-login">
		</div>
		<div class="content login-large">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="title">Login</h5>
						</div>
						<div class="card-body">
							<form id="login">
								<div class="row">
									<div class="col-md-12 pr-1">
										<div class="form-group">
											<label for="email">E-mail</label>
											<input type="email" class="form-control" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 pr-1">
										<div class="form-group">
											<label for="password">Senha</label>
											<input type="password" class="form-control" id="password" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<button class="btn btn-round btn-primary" type="submit">Entrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url() ?>public/js/core/jquery.min.js"></script>
	<script src="<?= base_url() ?>public/js/core/popper.min.js"></script>
	<script src="<?= base_url() ?>public/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
	<script src="<?= base_url() ?>public/js/plugins/chartjs.min.js"></script>
	<script src="<?= base_url() ?>public/js/plugins/bootstrap-notify.js"></script>
	<script src="<?= base_url() ?>public/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<?php foreach($scripts as $script): ?>
		<script src="<?= base_url() ?>public/js/<?= $script ?>.js"></script>
	<?php endforeach ?>
</body>
</html>