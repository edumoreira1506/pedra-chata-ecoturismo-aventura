<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() . 'public/images/' . $staticImages['ABOUT US'][0]->getContent() ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light"><?= $infos['ABOUT US'][0]->getContent() ?></h1>
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
        <img src="<?= base_url() . 'public/' ?>images/<?= $staticImages['ABOUT US'][1]->getContent() ?>" alt="Image" class="img-fluid rounded">
      </div>
      <div class="col-md-6 pl-md-5">
        <h2 class="font-weight-light text-black mb-4"><?= $infos['ABOUT US'][1]->getContent() ?></h2>
        <p><?= $infos['ABOUT US'][5]->getContent() ?></p>
        <ul class="list-unstyled">
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span><?= $infos['ABOUT US'][2]->getContent() ?></span></li>
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span><?= $infos['ABOUT US'][3]->getContent() ?></span></li>
          <li class="d-flex align-items-center"><span class="icon-check2 text-primary h3 mr-2"></span><span><?= $infos['ABOUT US'][4]->getContent() ?></span></li>
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