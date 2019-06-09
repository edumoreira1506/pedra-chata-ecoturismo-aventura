<div class="main-panel" id="main-panel">
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
        <a class="navbar-brand" href="#pablo">Depoimentos</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" id="search-testimonies" placeholder="Buscar...">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="now-ui-icons ui-1_zoom-bold"></i>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row" id="testimonies-list">
      <?php foreach($testimonies as $testimony): ?>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="image">
              <img src="<?= base_url().'public/images/testimonies/'.$testimony->getImagePath() ?>" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                  <img class="avatar border-gray" src="<?= base_url().'public/images/testimonies/'.$testimony->getImagePath() ?>" alt="Pessoa <?= $testimony->getPersonName() ?>">
                  <h5 class="title"><?= $testimony->getPersonName(); ?></h5>
                </a>
              </div>
              <p class="description text-center">
                <?= $testimony->getTestimony(); ?>
              </p>
            </div>
            <hr>
            <div class="button-container">
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteTestimony(<?= $testimony->getTestimonyId(); ?>)">
                <i class="fas fa-trash-alt"></i>
              </button>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editTestimony(<?= $testimony->getTestimonyId(); ?>)">
                <i class="fas fa-edit"></i>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <button class="btn btn-round btn-primary" type="click" id="register-new-testimony">Cadastrar novo depoimento</button>
  </div>
  <div class="card out-display-none" id="modal-register-testimony">
    <div class="card-header">
      <h5 class="title">Cadastrar novo depoimento</h5>
    </div>
    <div class="card-body">
      <form id="register-testimony">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="person-name">Nome da Pessoa</label>
              <input type="text" class="form-control" id="person-name" name="person-name" placeholder="Nome da Pessoa" required>
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div>
              <label for="image">Foto</label>
              <input type="file" id="image" class="form-control" name="image" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div>
              <label for="testimony">Depoimento</label>
              <textarea name="testimony" id="testimony" cols="30" rows="10" class="form-control" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-testimony">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-testimony">
    <div class="card-header">
      <h5 class="title">Editar depoimento</h5>
    </div>
    <div class="card-body">
      <form id="edit-testimony">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-person-name">Nome da Pessoa</label>
              <input type="text" class="form-control" id="edit-person-name" name="person-name" placeholder="Nome da Pessoa" required>
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div>
              <label for="edit-image">Foto</label>
              <input type="file" id="edit-image" class="form-control" name="image">
              <input type="hidden" id="edit-testimony-id" name="id-testimony" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div>
              <label for="edit-testimony">Depoimento</label>
              <textarea name="testimony" id="edit-testimony-textarea" cols="30" rows="10" class="form-control" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-testimony">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>
