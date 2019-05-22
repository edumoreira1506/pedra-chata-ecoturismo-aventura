<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travalers &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="<?= base_url() ?>public/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="<?= base_url() ?>public/css/aos.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
    <script>
        const activeLink = '<?= $activeLink ?>';
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
        <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Travelers</a></h1>
    </div>
    <div class="col-10 col-md-8 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

          <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
            <?php foreach ($menuOptions as $menuOption): ?>
            <li>
                <a href="<?= base_url() . $menuOption->getLink(); ?>"><?= $menuOption->getName(); ?></a>
            </li>
            <?php endforeach ?>
                <!-- <li class="has-children">
                  <a href="destination.html">Destinations</a>
                  <ul class="dropdown">
                    <li><a href="#">Japan</a></li>
                    <li><a href="#">Europe</a></li>
                    <li><a href="#">China</a></li>
                    <li><a href="#">France</a></li>
                  </ul>
              </li> -->
          </ul>
      </nav>
  </div>

  <div class="col-6 col-xl-2 text-right">
    <div class="d-none d-xl-inline-block">
      <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
        <li>
          <a href="#" class="pl-0 pr-3 text-black"><span class="icon-tripadvisor"></span></a>
      </li>
      <li>
          <a href="#" class="pl-3 pr-3 text-black"><span class="icon-twitter"></span></a>
      </li>
      <li>
          <a href="#" class="pl-3 pr-3 text-black"><span class="icon-facebook"></span></a>
      </li>
      <li>
          <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
      </li>

  </ul>
</div>

<div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

</div>

</div>
</div>

</header>