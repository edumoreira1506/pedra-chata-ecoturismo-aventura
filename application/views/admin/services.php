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
    <a class="navbar-brand" href="#">Serviços</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navigation">
    <form>
      <div class="input-group no-border">
        <input type="text" id="search-services" class="form-control" placeholder="Buscar...">
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
            <h4 class="card-title"> Serviços</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="services-table">
                <thead class=" text-primary">
                    <th>
                        Título
                    </th>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Ícone
                    </th>
                    <th>
                        Ações
                    </th>
            </thead>
            <tbody>
            <?php foreach ($services as $service): ?>
            <tr>
                <td id="service-name-<?= $service->getServiceId() ?>"><?= $service->getTitle(); ?></td>
                <td>
                  <?= $service->getDescription(); ?>
                </td>
                <td>
                  <?= $service->getIcon(); ?>
                </td>
                <td>
                    <button class="btn" title="Excluir" onclick="deleteService(<?= $service->getServiceId() ?>)" style="font-size:14px;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn" title="Editar" onclick="editService(<?= $service->getServiceId() ?>)" style="font-size:14px;">
                        <i class="fas fa-edit"></i>
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
<button class="btn btn-round btn-primary" type="click" id="create-new-service">Criar Serviço</button>
<div class="card out-display-none" id="modal-register-service">
    <div class="card-header">
      <h5 class="title">Cadastrar novo passeio</h5>
    </div>
    <div class="card-body">
      <form id="register-service">
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
              <label for="icon">Icone</label>
              <input type="text" id="icon" class="form-control" name="icon" placeholder="Ícone" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Criar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-service">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<div class="card out-display-none" id="modal-edit-service">
    <div class="card-header">
      <h5 class="title">Editar passeio</h5>
    </div>
    <div class="card-body">
      <form id="edit-service">
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
            <div class="form-group">
              <label for="edit-icon">Icone</label>
              <input type="text" id="edit-icon" class="form-control" name="icon" placeholder="Ícone" required>
              <input type="hidden" id="edit-id-service" name="id-service" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pl-1">
            <button class="btn btn-round btn-primary" type="submit">Editar</button>
            <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-service">Fechar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>