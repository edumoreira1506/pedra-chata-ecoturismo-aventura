<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Travelers</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navegação</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <?php foreach ($menuOptions as $menuOption): ?>
                    <li>
                      <a href="<?= base_url() . $menuOption->getLink(); ?>"><?= $menuOption->getName(); ?></a>
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>

            

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
           

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Notícias!</h3>
              <p>Inscreva-se e fique sabendo de todas notícias!</p>

              <form id="newsletter-form">
                <div class="input-group mb-3">
                  <input type="email" id="newsletter-email" class="form-control border-secondary text-white bg-transparent" placeholder="Email" aria-label="Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="submit" id="button-addon2">Inscrever-se</button>
                  </div>
                </div>
              </form>

            </div>

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-5">
              <?php foreach($socialMedias as $socialMedia): ?>
                <li>
                  <a href="<?= $socialMedia->getLink() ?>" class="pl-0 pr-3 icon" target="_blank"><?= $socialMedia->getIcon() ?></a>
                </li>
              <?php endforeach ?>
            </div>

            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>