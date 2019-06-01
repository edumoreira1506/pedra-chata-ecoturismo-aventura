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
            <a class="navbar-brand" href="#pablo">Galeria de imagens</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <select class="form-control" id="filter-images">
                  <option value="">Escolher</option>
                  <?php foreach($travels as $travel): ?>
                    <option value="<?= $travel->getTravelId() ?>"><?= $travel->getTitle(); ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </form>
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
              <div class="card-body all-icons">
                <div class="row" id="images-travel">
                  <?php foreach($images as $image): ?>
                    <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                      <div class="font-icon-detail" style="background-image: url(<?= base_url().'public/images/images-travel/'.$image->getImagePath() ?>);  background-size: cover;">
                      </div>
                      <div class="botoes">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(<?= $image->getImageId() ?>)">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteImage(<?= $image->getImageId() ?>)">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <button class="btn btn-round btn-primary" type="click" id="register-new-image">Cadastrar nova imagem</button>
      </div>
      <div class="card out-display-none" id="modal-register-image">
    <div class="card-header">
      <h5 class="title">Cadastrar novo banner</h5>
    </div>
    <div class="card-body">
      <form id="register-image">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div>
              <label for="image">Arquivo</label>
              <input type="file" class="form-control" id="image" name="image" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="travel">Passeio correspondente</label>
              <select id="travel" class="form-control" name="travel" required>
                <option value="">Escolher</option>
                <?php foreach($travels as $travel): ?>
                  <option value="<?= $travel->getTravelId() ?>"><?= $travel->getTitle(); ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-image">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-image">
    <div class="card-header">
      <h5 class="title">Editar imagem</h5>
    </div>
    <div class="card-body">
      <form id="edit-image">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div>
              <label for="edit-image">Arquivo</label>
              <input type="file" class="form-control" id="edit-image" name="image">
              <input type="hidden" id="id-edit-image" name="id-image">
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="edit-travel">Passeio correspondente</label>
              <select id="edit-travel" class="form-control" name="travel" required>
                <option value="">Escolher</option>
                <?php foreach($travels as $travel): ?>
                  <option value="<?= $travel->getTravelId() ?>"><?= $travel->getTitle(); ?></option>
                <?php endforeach ?>
              </select>
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
  <div class="background-modal out-display-none" id="background-modal"></div>