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
        <a class="navbar-brand" href="#pablo">Integrantes da equipe</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" id="search-persons" placeholder="Buscar...">
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
    <div class="row" id="persons-list">
      <?php foreach($persons as $person): ?>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="image">
              <img src="<?= base_url().'public/images/persons/'.$person->getImagePath() ?>" alt="Pessoa <?= $person->getName() ?>">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                  <img class="avatar border-gray" src="<?= base_url().'public/images/persons/'.$person->getImagePath() ?>" alt="Pessoa <?= $person->getName() ?>">
                  <h5 class="title"><?= $person->getName(); ?></h5>
                </a>
              </div>
              <p class="description text-center">
                <?= $person->getDescription(); ?>
              </p>
            </div>
            <hr>
            <div class="button-container">
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deletePerson(<?= $person->getPersonId(); ?>)">
                <i class="fas fa-trash-alt"></i>
              </button>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editPerson(<?= $person->getPersonId(); ?>)">
                <i class="fas fa-edit"></i>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <button class="btn btn-round btn-primary" type="click" id="register-new-person">Cadastrar nova pessoa</button>
  </div>
  <div class="card out-display-none" id="modal-new-person">
    <div class="card-header">
      <h5 class="title">Cadastrar pessoa da equipe</h5>
    </div>
    <div class="card-body">
      <form id="new-person">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Nome" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="instagram">Link do instagram</label>
              <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Descrição" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="facebook">Link do facebook</label>
              <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Nome" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div>
              <label for="image">Foto da pessoa</label>
              <input type="file" id="image" class="form-control" name="image" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div>
              <label for="description">Descrição</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-new-person">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-person">
    <div class="card-header">
      <h5 class="title">Cadastrar pessoa da equipe</h5>
    </div>
    <div class="card-body">
      <form id="edit-person">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-name">Nome</label>
              <input type="text" name="name" class="form-control" id="edit-name" placeholder="Nome" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="edit-instagram">Link do instagram</label>
              <input type="text" id="edit-instagram" name="instagram" class="form-control" placeholder="Descrição" required>
              <input type="hidden" id="id-person" name="id-person" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-facebook">Link do facebook</label>
              <input type="text" name="facebook" class="form-control" id="edit-facebook" placeholder="Nome" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div>
              <label for="edit-image">Foto da pessoa</label>
              <input type="file" id="edit-image" class="form-control" name="image">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <div>
              <label for="edit-description">Descrição</label>
              <textarea name="description" id="edit-description" cols="30" rows="10" class="form-control" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-person">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>
