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
<link href="<?= base_url() ?>public/css/my.css" rel="stylesheet" />
<link href="<?= base_url() ?>public/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
<script type="text/javascript">
    const baseUrl = '<?= base_url(); ?>';
    const active = '<?= $active ?>'; 
</script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="<?= base_url().'admin' ?>" class="simple-text logo-mini">
          PC
      </a>
      <a href="<?= base_url().'admin' ?>" class="simple-text logo-normal">
          Pedra Chata
      </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="active-pro">
        <a href="painel">
          <i class="now-ui-icons design_app"></i>
          <p>Painel</p>
      </a>
  </li>
  <li class="active-pro">
    <a href="usuarios">
      <i class="fas fa-users"></i>
      <p>Usuários</p>
  </a>
</li>
<li class="active-pro">
    <a href="menus">
      <i class="fas fa-bars"></i>
      <p>Menus</p>
  </a>
</li>
<li class="active-pro">
    <a href="redesSociais">
      <i class="fas fa-hashtag"></i>
      <p>Redes sociais</p>
  </a>
</li>
<li class="active-pro">
    <a href="bannersDestaque">
      <i class="fas fa-image"></i>
      <p>Banners Destaque</p>
  </a>
</li>
<li class="active-pro">
    <a href="exitOut">
      <i class="fas fa-sign-out-alt"></i>
      <p>Sair</p>
  </a>
</li>
</ul>
</div>
</div>