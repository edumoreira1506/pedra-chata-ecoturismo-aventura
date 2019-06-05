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
        <a class="navbar-brand" href="#pablo">Publicações do blog</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" id="search-publications" placeholder="Buscar...">
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
    <div class="row" id="publications-list">
      <?php foreach($publications as $publication): ?>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="image">
              <img src="<?= base_url().'public/images/publications/'.$publication->getImagePath() ?>" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                  <img class="avatar border-gray" src="<?= base_url().'public/images/publications/'.$publication->getImagePath() ?>" alt="...">
                  <h5 class="title"><?= $publication->getTitle(); ?></h5>
                </a>
              </div>
              <p class="description text-center">
                <?= $publication->getResumedContent(); ?>
              </p>
            </div>
            <hr>
            <div class="button-container">
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deletePublication(<?= $publication->getPublicationId(); ?>)">
                <i class="fas fa-trash-alt"></i>
              </button>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editPublication(<?= $publication->getPublicationId(); ?>)">
                <i class="fas fa-edit"></i>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <button class="btn btn-round btn-primary" type="click" id="register-new-publication">Cadastrar nova publicação</button>
  </div>
  <div class="card out-display-none" id="modal-register-publication">
    <div class="card-header">
      <h5 class="title">Cadastrar nova publicação</h5>
    </div>
    <div class="card-body">
      <form id="register-publication">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="title">Título</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Título da publicação" required>
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div>
              <label for="image">Imagem destacada</label>
              <input type="file" id="image" class="form-control" name="image" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="id-category">Categoria</label>
              <select name="id-category" id="id-category" class="form-control" required>
                <option value="">Escolher</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category->getCategoryId() ?>"><?= $category->getName() ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <textarea id="summernote">
            </textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-publication">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-publication">
    <div class="card-header">
      <h5 class="title">Editar publicação</h5>
    </div>
    <div class="card-body">
      <form id="edit-publication">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-title">Título</label>
              <input type="text" class="form-control" id="edit-title" name="title" placeholder="Título da publicação" required>
              <input type="hidden" id="edit-publication-id" name="id-publication" required>
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div>
              <label for="edit-image">Imagem destacada</label>
              <input type="file" id="edit-image" class="form-control" name="image">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-id-category">Categoria</label>
              <select name="id-category" id="edit-id-category" class="form-control" required>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category->getCategoryId() ?>"><?= $category->getName() ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pr-1">
            <textarea id="edit-summernote">
            </textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-publication">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>
