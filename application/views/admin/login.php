<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<!-- TÍTULO -->
	<title>Pedra Chata - Acesso restrito</title>

	<!-- ÍCONE -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/others/favicon">

	<!-- METAS -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Painel administrativo da Pedra Chata. Caniôns, cavernas, cachoeiras e muitas outras maravilhas da natureza. Confira!"/>
	<meta name="keywords" content="cânion, pedra chata, itapeva, cachoeiras, cavernas, ecoturismo, aventura, maravilhas, natureza, petar,"/>
	<meta name="robots" content="index, follow">
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Descubra os lugares mais bonitos do mundo em um só lugar!" />
	<meta property="og:description" content="Trilhas, cachoeiras, cavernas, cânions e muito mais. Confira!" />
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta property="og:site_name" content="Pedra Chata - Ecoturismo e Aventura" />
	<meta property="article:publisher" content="https://www.facebook.com/pedrachataturismo" />
	<meta property="og:image" content="<?= base_url() . 'public/others/image-share.jpg' ?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="Descubra os lugares mais bonitos do mundo em um só lugar!" />
	<meta name="twitter:title" content="Trilhas, cachoeiras, cavernas, cânions e muito mais. Confira!" />
	<meta name="twitter:image" content="<?= base_url() . 'public/others/image-share.jpg' ?>" />

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="<?= base_url() ?>public/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>public/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
	<link href="<?= base_url() ?>public/css/my.css" rel="stylesheet" />

	<!-- SCRIPT BASE URL -->
	<script type="text/javascript">
		const baseUrl = '<?= base_url(); ?>';
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