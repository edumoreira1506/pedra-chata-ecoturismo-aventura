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
    <a class="navbar-brand" href="#">Opções do Menu</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navigation">
    <form>
      <div class="input-group no-border">
        <input type="text" id="search-menu-options" class="form-control" placeholder="Buscar...">
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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Opções do Menu</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="menu-options-table">
                <thead class=" text-primary">
                    <th>
                        Nome
                    </th>
                    <th>
                        Link
                    </th>
                    <th>
                        Ações
                    </th>
            </thead>
            <tbody>
            <?php foreach ($menuOptions as $menuOption): ?>
            <tr>
                <td id="option-menu-<?= $menuOption->getMenuOptionId() ?>"><?= $menuOption->getName(); ?></td>
                <td>
                    <a href="<?= base_url() . $menuOption->getLink() ?>">
                        Conferir
                    </a>
                </td>
                <td>
                    <button class="btn" title="Editar" onclick="editMenuOption(<?= $menuOption->getMenuOptionId() ?>)" style="font-size:14px;">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn" title="Excluir" onclick="deleteMenuOption(<?= $menuOption->getMenuOptionId() ?>)" style="font-size:14px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach ?>
      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<button class="btn btn-round btn-primary" type="click" id="create-new-option-menu">Criar Opção do Menu</button>
</div>
<div class="card out-display-none" id="modal-new-menu-option">
  <div class="card-header">
    <h5 class="title">Criar nova opção do menu</h5>
  </div>
  <div class="card-body">
    <form id="new-option-menu">
      <div class="row">
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Nome" required>
          </div>
        </div>
        <div class="col-md-6 pl-1">
          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" id="link" class="form-control" placeholder="Link" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-round btn-primary" type="submit">Criar</button>
          <button class="btn btn-round btn-primary" type="submit" id="close-modal-new-menu-option">Fechar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="card out-display-none" id="modal-edit-menu-option">
  <div class="card-header">
    <h5 class="title">Criar nova opção do menu</h5>
  </div>
  <div class="card-body">
    <form id="edit-option-menu">
      <div class="row">
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label for="edit_name">Nome</label>
            <input type="text" class="form-control" id="edit_name" placeholder="Nome" required>
          </div>
        </div>
        <div class="col-md-6 pl-1">
          <div class="form-group">
            <label for="edit_link">Link</label>
            <input type="text" id="edit_link" class="form-control" placeholder="Link" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-round btn-primary" type="submit">Editar</button>
          <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-menu-option">Fechar</button>
          <input type="hidden" id="menu-edit-id">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>