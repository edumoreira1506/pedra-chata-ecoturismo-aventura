<div class="slide-one-item home-slider owl-carousel">
  <?php foreach ($banners as $banner): ?>
    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url().'public/images/featured-banners/'.$banner->getImagePath() ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light"><?= $banner->getTitle() ?></h1>
            <p class="mb-5"><?= $banner->getDescription() ?></p>
            <p><a href="<?= $banner->getButtonLink() ?>" target="_blank" class="btn btn-primary py-3 px-5 text-white"><?= $banner->getButtonContent() ?></a></p>

          </div>
        </div>
      </div>
    </div>  
  <?php endforeach ?>
</div>

<div class="site-section">
  <div class="container overlap-section">
    <div class="row">
      <?php foreach ($highlights as $highlight): ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <a href="#" class="unit-1 text-center" onclick="openModalHighlight(<?= $highlight->getHighlightId() ?>)">
            <img src="<?= base_url().'public/images/highlights/'.$highlight->getImagePath() ?>" alt="Destaque <?= $highlight->getImagePath() ?>" class="img-fluid">
            <div class="unit-1-text">
              <h3 class="unit-1-heading"><?= $highlight->getTitle() ?></h3>
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
        <h2 class="font-weight-light text-black text-center"><?= $infos['INITIAL'][0]->getContent(); ?></h2>
      </div>
    </div>

    <div class="item">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <img src="<?= base_url() ?>public/images/<?= $staticImages['INITIAL'][0]->getContent() ?>" alt="Image" class="img-md-fluid">
          </div>
          <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
            <p class="text-black lead"><?= $infos['INITIAL'][1]->getAllContent(); ?></p>
            <p class=""><?= $infos['INITIAL'][2]->getContent(); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="site-section">

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2 class="font-weight-light text-black"><?= $infos['INITIAL'][3]->getAllContent(); ?></h2>
        <p class="color-black-opacity-5"><?= $infos['INITIAL'][4]->getAllContent(); ?></p>
      </div>
    </div>
    <div class="row">
      <?php foreach($travels as $travel): ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <a href="<?= base_url().'passeio/' . $travel->getLinkTravel() ?>" class="limit-image unit-1 text-center">
            <img src="<?= base_url() . 'public/images/featured-images-travels/' . $travel->getFeaturedImage() ?>" alt="<?= $travel->getTitle() ?>" class="img-fluid">
            <div class="unit-1-text">
              <strong class="text-primary mb-2 d-block">R$<?= $travel->getPrice() ?></strong>
              <h3 class="unit-1-heading"><?= $travel->getTitle() ?></h3>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>

</div>

<div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(<?= base_url() ?>public/images/<?= $staticImages['INITIAL'][1]->getContent() ?>); background-attachment: fixed;">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
        <a href="<?= $infos['INITIAL'][6]->getAllContent(); ?>" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
        <h2 class="text-white font-weight-light mb-5 h1"><?= $infos['INITIAL'][5]->getAllContent(); ?></h2>
      </div>
    </div>
  </div>
</div>  

<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2 class="font-weight-light text-black"><?= $infos['INITIAL'][7]->getAllContent(); ?></h2>
        <p class="color-black-opacity-5"><?= $infos['INITIAL'][8]->getAllContent(); ?></p>
      </div>
    </div>
    <div class="row align-items-stretch">
      <?php foreach ($services as $service): ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <div class="unit-4 d-flex">
            <div class="unit-4-icon mr-4 services-icon">
              <?= $service->getIcon() ?></div>
              <div>
                <h3><?= $service->getTitle() ?></h3>
                <p><?= $service->getDescription() ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>


  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
          <h2 class="font-weight-light text-black"><?= $infos['INITIAL'][9]->getAllContent(); ?></h2>
          <p class="color-black-opacity-5"><?= $infos['INITIAL'][10]->getAllContent(); ?></p>
        </div>
      </div>
      <div class="row mb-3 align-items-stretch">
        <?php foreach ($publications as $publication): ?>
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="<?= base_url() . 'public/images/publications/' . $publication->getImagePath() ?>" alt="Categoria <?= $publication->getCategory()->getName() ?>" class="img-fluid">
              <h2 class="font-size-regular"><a href="<?= base_url() . 'blog/post/' . $publication->getLink() ?>"><?= $publication->getTitle() ?></a></h2>
              <div class="meta mb-4"><?= $publication->getPublicationDate() ?><span class="mx-2">&bullet;</span><a href="<?= base_url() . 'blog/categorias/' . $publication->getCategory()->getLink() ?>"><?= $publication->getCategory()->getName() ?></a></div>
              <p><?= $publication->getResumedContent() ?></p>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="<?= base_url() . 'blog' ?>" class="btn btn-outline-primary border-2 py-3 px-5">Ver mais</a>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section border-top">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="mb-5 text-black">Quer fazer um orçamento?</h2>
          <p class="mb-0"><a href="<?= base_url() . 'contato' ?>" class="btn btn-primary py-3 px-5 text-white">Chega mais!</a></p>
        </div>
      </div>
    </div>
  </div>

  <div id="modal-highlight" class="out-display-none">
    <div class="site-section block-13 bg-light">
      <i class="fas fa-times-circle"></i>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="font-weight-light text-black text-center" id="title-modal-highlight"></h2>
          </div>
        </div>

        <div class="item">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 mb-5">
                <img src="" class="image-display" alt="Imagem highlight" id="image-highlight" class="img-md-fluid">
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="font-weight-light text-black text-center" id="description-modal-highlight"></h2>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="background-modal out-display-none" id="background-modal"></div>