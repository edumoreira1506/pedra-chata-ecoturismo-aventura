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
        <a class="navbar-brand" href="#pablo">Passeios</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form>
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" id="search-travels" placeholder="Buscar...">
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
    <div class="row" id="travels-list">
      <?php foreach($travels as $travel): ?>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="<?= base_url().'public/images/featured-images-travels/'.$travel->getFeaturedImage() ?>" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="<?= base_url().'public/images/featured-images-travels/'.$travel->getFeaturedImage() ?>" alt="...">
                <h5 class="title"><?= $travel->getTitle(); ?></h5>
              </a>
              <p class="description">
                R$<?= $travel->getPrice(); ?>
              </p>
            </div>
            <p class="description text-center">
              <?= $travel->getDescription(); ?>
            </p>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteTravel(<?= $travel->getTravelId(); ?>)">
              <i class="fas fa-trash-alt"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editTravel(<?= $travel->getTravelId(); ?>)">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <button class="btn btn-round btn-primary" type="click" id="register-new-travel">Cadastrar novo passeio</button>
  </div>
  <div class="card out-display-none" id="modal-register-travel">
    <div class="card-header">
      <h5 class="title">Cadastrar novo passeio</h5>
    </div>
    <div class="card-body">
      <form id="register-travel">
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
            <div class="form-group">
              <label for="price">Preço (apenas números)</label>
              <input type="number" id="price" class="form-control" name="price" placeholder="Conteúdo do botão" required>
            </div>
          </div>
          <div class="col-md-6 pr-1">
            <div>
              <label for="featured-image">Imagem destacada</label>
              <input type="file" id="featured-image" class="form-control" name="featured-image" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-travel">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card out-display-none" id="modal-edit-travel">
    <div class="card-header">
      <h5 class="title">Editar passeio</h5>
    </div>
    <div class="card-body">
      <form id="edit-travel">
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label for="edit-title">Título</label>
              <input type="text" class="form-control" id="edit-title" name="title" placeholder="Título" required>
              <input type="hidden"  id="edit-id-travel" name="edit-id-travel" required>
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
            <div class="form-group">
              <label for="edit-price">Preço (apenas números)</label>
              <input type="number" id="edit-price" class="form-control" name="price" placeholder="Preço" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-travel">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>
