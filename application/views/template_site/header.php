<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Pedra Chata</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
  <link rel="stylesheet" href="<?= base_url() ?>public/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/my.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/aos.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/others/favicon">
  <script>
    const activeLink = '<?= $activeLink ?>';
    const baseUrl = '<?= base_url(); ?>';
  </script>
</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
      </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-1" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-6 col-xl-2">
        <h1 class="mb-0"><a href="<?= base_url() ?>" class="text-black h2 mb-0" style="font-size: 24px;">PEDRA CHATA</a></h1>
    </div>
    <div class="col-10 col-md-8 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

          <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
            <?php foreach ($menuOptions as $menuOption): ?>
              <li>
                <a href="<?= base_url() . $menuOption->getLink(); ?>"><?= $menuOption->getName(); ?></a>
              </li>
            <?php endforeach ?>
            <li class="has-children">
            <a href="<?= base_url() . 'passeios' ?>">Passeios</a>
            <ul class="dropdown">
            <?php foreach ($travels as $travel): ?>
                    <li><a href="<?= base_url().'passeio/' . $travel->getLinkTravel() ?>"><?= $travel->getTitle(); ?></a></li>
            <?php endforeach ?>
            
          </ul>
          </li>
          <li class="has-children">
            <a href="<?= base_url() . 'blog' ?>">Blog</a>
            <ul class="dropdown">
            <?php foreach ($categories as $category): ?>
                    <li><a href="<?= base_url().'blog/categorias/' . $category->getLink() ?>"><?= $category->getName(); ?></a></li>
            <?php endforeach ?>
            
          </ul>
          </li>
          </ul>
      </nav>
  </div>

  <div class="col-6 col-xl-2 text-right">
    <div class="d-none d-xl-inline-block">
      <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
        <?php foreach($socialMedias as $socialMedia): ?>
            <li>
          <a href="<?= $socialMedia->getLink() ?>" class="pl-0 pr-3 text-black" target="_blank"><?= $socialMedia->getIcon() ?></a>
          </li>
          <?php endforeach ?>
  </ul>
</div>

</div>

</div>
</div>

</header>