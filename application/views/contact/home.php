<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?= base_url() . 'public/images/hero_bg_2.jpg' ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white font-weight-light">Entre em contato</h1>
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
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mb-5">
        <form id="contact-form" class="p-5 bg-white">
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="name">Nome completo</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="email">Email</label> 
              <input type="email" id="email" name="email" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="message">Mensagem</label> 
              <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Dê para nós mais detalhes..."></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Enviar" class="btn btn-primary py-2 px-4 text-white">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5">
        <div class="p-4 mb-3 bg-white">
          <p class="mb-0 font-weight-bold">Telefone/WhatsApp</p>
          <p class="mb-4"><a href="tel:+5515997986248">(15) 99798-6248</a></p>
          <p class="mb-0 font-weight-bold">Email:</p>
          <p class="mb-0"><a href="mailto:contato@pedrachata.com.br">contato@pedrachata.com.br</a></p>
        </div>
        <div class="p-4 mb-3 bg-white">
          <img src="<?= base_url() . 'public/images/hero_bg_1.jpg' ?>" alt="Image" class="img-fluid mb-4 rounded">
          <h3 class="h5 text-black mb-3">More Info</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
          <p><a href="<?= base_url() . 'sobre' ?>" class="btn btn-primary px-4 py-2 text-white">Conheça-nos!</a></p>
        </div>
      </div>
    </div>
  </div>
</div>