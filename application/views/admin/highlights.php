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
        <a class="navbar-brand" href="#pablo">Destaque</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" id="search-highlights" placeholder="Buscar...">
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
    <div class="row" id="highlights-list">
      <?php foreach($highlights as $highlight): ?>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="<?= base_url().'public/images/highlights/'.$highlight->getImagePath() ?>" alt="Destaque <?= $highlight->getTitle() ?>">
          </div>
          <div class="card-body">
            <div class="author">
              <img class="avatar border-gray" src="<?= base_url().'public/images/highlights/'.$highlight->getImagePath() ?>" alt="Destaque <?= $highlight->getTitle() ?>">
              <h5 class="title"><?= $highlight->getTitle(); ?></h5>
              <p class="description">
                <?= $highlight->getActive(); ?>
              </p>
            </div>
            <p class="description text-center">
              <?= $highlight->getDescription(); ?>
            </p>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteHighlight(<?= $highlight->getHighlightId(); ?>)">
              <i class="fas fa-trash-alt"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editHighlight(<?= $highlight->getHighlightId(); ?>)">
              <i class="fas fa-edit"></i>
            </button>
            <?php if($highlight->getNumberActive()){ ?>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="inactivateHighlight(<?= $highlight->getHighlightId(); ?>)">
                <i class="fas fa-times-circle"></i>
              </button>
            <?php }else{ ?>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="activeHighlight(<?= $highlight->getHighlightId(); ?>)">
                <i class="fas fa-check-circle"></i>
              </button>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <button class="btn btn-round btn-primary" type="click" id="register-new-highlight">Cadastrar novo destaque</button>
  </div>
  <div class="card out-display-none" id="modal-register-highlight">
    <div class="card-header">
      <h5 class="title">Cadastrar novo destaque</h5>
    </div>
    <div class="card-body">
      <form id="register-highlight">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Título" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="description">Descrição</label>
              <input type="text" id="description" class="form-control" name="description" placeholder="Descrição" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div>
              <label for="image">Banner</label>
              <input type="file" id="image" class="form-control" name="image" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-highlight">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-highlight">
    <div class="card-header">
      <h5 class="title">Editar destaque</h5>
    </div>
    <div class="card-body">
      <form id="edit-highlight">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-title">Título</label>
              <input type="text" class="form-control" id="edit-title" name="title" placeholder="Título" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="edit-description">Descrição</label>
              <input type="text" id="edit-description" class="form-control" name="description" placeholder="Descrição" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div>
              <label for="edit-image">Banner</label>
              <input type="file" id="edit-image" class="form-control" name="image">
              <input type="hidden" id="edit-id-highlight" name="id-highlight" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-highlight">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>
