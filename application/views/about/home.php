<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() . 'public/images/hero_bg_2.jpg' ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light">Sobre nós</h1>
        <div>
          <?php foreach ($menuOptions as $menuOption): ?>
            <a href="<?= base_url() . $menuOption->getLink(); ?>"><?= $menuOption->getName(); ?><span class="mx-2 text-white">&bullet;</span></a>
          <?php endforeach ?>
          <a href="<?= base_url() . 'passeios' ?>">Passeios<span class="mx-2 text-white">&bullet;</span></a> 
          <a href="<?= base_url() . 'blog' ?>">Blog</a> 
        </div>
      </div>
    </div>
  </div>
</div>  
<div class="site-section" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-5 mb-md-0">
        <img src="<?= base_url() . 'public/' ?>images/hero_bg_2.jpg" alt="Image" class="img-fluid rounded">
      </div>
      <div class="col-md-6 pl-md-5">
        <h2 class="font-weight-light text-black mb-4">Sobre nós</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque eius modi expedita accusamus alias error totam ab magnam a mollitia magni, distinctio temporibus optio illo sapiente, odio unde natus.</p>
        <ul class="list-unstyled">
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Vitae cumque eius modi expedita</span></li>
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Totam at maxime Accusantium</span></li>
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span>Distinctio temporibus</span></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="site-section">
  <div class="container">
   <div class="row justify-content-center mb-5" data-aos="fade-up">
    <div class="col-md-7">
      <h2 class="font-weight-light text-black text-center">Nossa equipe</h2>
    </div>
  </div>
  <div class="row">
    <?php foreach ($persons as $person): ?>
      <div class="col-md-6 col-lg-4 text-center mb-5" data-aos="fade-up">
        <img src="<?= base_url() . 'public/images/persons/' . $person->getImagePath() ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
        <h2 class="text-black font-weight-light mb-4"><?= $person->getName() ?></h2>
        <p class="mb-4"><?= $person->getDescription() ?></p>
        <p>
          <a href="<?= $person->getInstagramLink() ?>" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
          <a href="<?= $person->getFacebookLink() ?>" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
        </p>
      </div>
    <?php endforeach ?>
  </div>
</div>
</div>