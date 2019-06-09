<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <!-- TÍTULO -->
  <title>
    Admin - Pedra Chata
  </title>

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

  <!-- OUTROS -->
  <link rel="canonical" href="<?= base_url() ?>" />

  <!-- CSS -->  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="<?= base_url() ?>public/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>public/css/my.css" rel="stylesheet" />
  <link href="<?= base_url() ?>public/css/demo.css" rel="stylesheet" />
  <link href="<?= base_url() ?>public/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <link href="<?= base_url() ?>public/js/summernote/summernote-bs4.css" rel="stylesheet" />

  <!-- SCRIPT BASE URL -->
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
            <a href="<?= base_url()  ?>admin/painel">
              <i class="now-ui-icons design_app"></i>
              <p>Painel</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/usuarios">
              <i class="fas fa-users"></i>
              <p>Usuários</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/menus">
              <i class="fas fa-bars"></i>
              <p>Menus</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/redesSociais">
              <i class="fas fa-hashtag"></i>
              <p>Redes sociais</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/bannersDestaque">
              <i class="fas fa-image"></i>
              <p>Banners Destaque</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/destaques">
              <i class="fas fa-star"></i>
              <p>Destauqes</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/passeios">
              <i class="fas fa-route"></i>
              <p>Passeios</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/servicos">
              <i class="fas fa-network-wired"></i>
              <p>Serviços</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/galeria">
              <i class="fas fa-image"></i>
              <p>Galeria de passeios</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/depoimentos">
              <i class="fas fa-user"></i>
              <p>Depoimentos</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/categorias">
              <i class="fab fa-blogger"></i>
              <p>Categorias do Blog</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/postagens">
              <i class="fab fa-blogger"></i>
              <p>Postagens do Blog</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/equipe">
              <i class="fas fa-user-friends"></i>
              <p>Integrantes da Equipe</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/textos">
              <i class="fas fa-align-left"></i>
              <p>Textos</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/imagens">
              <i class="fas fa-image"></i>
              <p>Imagens</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?= base_url()  ?>admin/exitOut">
              <i class="fas fa-sign-out-alt"></i>
              <p>Sair</p>
            </a>
          </li>
        </ul>
      </div>
    </div>