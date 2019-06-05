<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() . 'public/images/publications/' . $publication->getImagePath() ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light"><?= $publication->getTitle() ?></h1>
        <div><a href="<?= base_url() ?>">Inicial</a>
          <?php foreach($categories as $category): ?>
            <span class="mx-2 text-white">&bullet;</span><a href="<?= base_url() . 'blog/categorias/' .$category->getLink() ?>"><?= $category->getName() ?></a>  
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>  
<div class="site-section" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12 pl-md-5">
        <h2 class="font-weight-light text-black mb-4"><?= $publication->getTitle() ?></h2>
        <?= $publication->getContent() ?>
      </div>
    </div>
  </div>
</div>
</div>

