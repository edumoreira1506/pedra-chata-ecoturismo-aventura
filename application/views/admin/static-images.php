<div class="main-panel" id="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#pablo">Imagens estáticas</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página inicial</h4>
          </div>
          <div class="card-body all-icons">
            <div class="row" id="images-travel">
              <?php foreach($staticImages['INITIAL'] as $staticImage): ?>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                  <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/'.$staticImage->getContent() ?>);  background-size: cover;">
                  </div>
                  <p class="center"><?= $staticImage->getArea() ?></p>
                  <p class="center"><?= $staticImage->getLastUpdate() ?></p>
                  <div class="botoes">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $staticImage->getStaticId() ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página de Contato</h4>
          </div>
          <div class="card-body all-icons">
            <div class="row" id="images-travel">
              <?php foreach($staticImages['CONTACT'] as $staticImage): ?>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                  <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/'.$staticImage->getContent() ?>);  background-size: cover;">
                  </div>
                  <p class="center"><?= $staticImage->getArea() ?></p>
                  <p class="center"><?= $staticImage->getLastUpdate() ?></p>
                  <div class="botoes">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $staticImage->getStaticId() ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página Sobre</h4>
          </div>
          <div class="card-body all-icons">
            <div class="row" id="images-travel">
              <?php foreach($staticImages['ABOUT US'] as $staticImage): ?>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                  <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/'.$staticImage->getContent() ?>);  background-size: cover;">
                  </div>
                  <p class="center"><?= $staticImage->getArea() ?></p>
                  <p class="center"><?= $staticImage->getLastUpdate() ?></p>
                  <div class="botoes">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $staticImage->getStaticId() ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página de Passeios</h4>
          </div>
          <div class="card-body all-icons">
            <div class="row" id="images-travel">
              <?php foreach($staticImages['TRAVELS'] as $staticImage): ?>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                  <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/'.$staticImage->getContent() ?>);  background-size: cover;">
                  </div>
                  <p class="center"><?= $staticImage->getArea() ?></p>
                  <p class="center"><?= $staticImage->getLastUpdate() ?></p>
                  <div class="botoes">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $staticImage->getStaticId() ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página de Blog</h4>
          </div>
          <div class="card-body all-icons">
            <div class="row" id="images-travel">
              <?php foreach($staticImages['BLOG'] as $staticImage): ?>
                <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                  <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/'.$staticImage->getContent() ?>);  background-size: cover;">
                  </div>
                  <p class="center"><?= $staticImage->getArea() ?></p>
                  <p class="center"><?= $staticImage->getLastUpdate() ?></p>
                  <div class="botoes">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $staticImage->getStaticId() ?>)">
                      <i class="fas fa-edit"></i>
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-image">
    <div class="card-header">
      <h5 class="title">Editar imagem</h5>
    </div>
    <div class="card-body">
      <form id="edit-image">
        <div class="row">
          <div class="col-md-12 pr-1">
            <div>
              <label for="edit-image">Arquivo</label>
              <input type="file" class="form-control" id="edit-image" name="image">
              <input type="hidden" id="id-edit-image" name="id-image">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-image">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="background-modal out-display-none" style="height: 308vh;" id="background-modal"></div>