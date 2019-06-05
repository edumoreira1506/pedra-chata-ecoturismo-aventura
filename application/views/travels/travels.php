<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() ?>public/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light">Todos Passeios</h1>
      </div>
    </div>
  </div>
</div>  

<div class="site-section">
  <div class="container">
    <div class="row">
      <?php foreach ($travels as $travel): ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <a href="<?= base_url().'passeio/' . $travel->getLinkTravel() ?> " class="limit-image unit-1 text-center limit-image">
            <img src="<?= base_url().'public/images/featured-images-travels/'.$travel->getFeaturedImage() ?>" alt="Passeio <?= $travel->getTitle() ?>" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading"><?= $travel->getTitle() ?></h3>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<div class="site-section block-13 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7">
        <h2 class="font-weight-light text-black text-center">Quem já foi diz o que?</h2>
      </div>
    </div>
    <div class="nonloop-block-13 owl-carousel">
      <?php foreach($testimonies as $testimony): ?>
      <div class="item">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-5">
              <img src="<?= base_url() . 'public/images/testimonies/' . $testimony->getImagePath() ?>" alt="Depoimento <?= $testimony->getPersonName() ?>" class="img-md-fluid">
            </div>
            <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
              <p class="text-black lead"><?= $testimony->getTestimony() ?></p>
              <p class=""><?= $testimony->getPersonName() ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<div id="modal-images" class="out-display-none limit-image-modal">
  <div class="site-section block-13 bg-light limit-image-modal">
    <i class="fas fa-times-circle"></i>
    <div class="nonloop-block-13 owl-carousel limit-image-modal" id="modal-carousel">
      <?php foreach ($images as $image): ?>
      <div class="item limit-image-modal images-items-modal" id="image-carousel-<?= $image->getImageId() ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mb-5">
              <img src="<?= base_url().'public/images/images-travel/'.$image->getImagePath() ?>" alt="Imagem <?= $image->getImageId() ?>" class="img-md-fluid">
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>