<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() ?>public/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light"><?= $category->getName() ?></h1>
        <div><a href="<?= base_url() ?>">Inicial</a>
          <?php foreach($categories as $category): ?>
            <span class="mx-2 text-white">&bullet;</span><a href="<?= base_url() . 'blog/categorias/' .$category->getLink() ?>"><?= $category->getName() ?></a>  
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>  
<div class="site-section">
  <div class="container">
    <div class="row mb-3 align-items-stretch" id="publications-list">
      <?php foreach ($publications as $publication): ?>
      <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
        <div class="h-entry">
          <img src="<?= base_url() . 'public/images/publications/' . $publication->getImagePath() ?>" alt="Publicação <?= $publication->getTitle() ?>" class="img-fluid">
          <h2 class="font-size-regular"><a href="<?= base_url() . 'blog/post/' . $publication->getLink() ?>"><?= $publication->getTitle() ?></a></h2>
          <div class="meta mb-4"><?= $publication->getPublicationDate() ?><span class="mx-2">&bullet;</span><a href="<?= base_url() . 'blog/categorias/' . $publication->getCategory()->getLink() ?>"><?= $publication->getCategory()->getName() ?></a></div>
          <p><?= $publication->getResumedContent() ?></p>
        </div> 
      </div>
      <?php endforeach ?>
    </div>
    <?php if(count($publications) == 10): ?>
      <div class="row">
        <div class="col-12 text-center">
          <button class="btn btn-outline-primary border-2 py-3 px-5" id="load-more-posts">Carregar mais posts</button>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>