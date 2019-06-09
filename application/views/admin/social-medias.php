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
    <a class="navbar-brand" href="#">Redes sociais</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navigation">
    <form>
      <div class="input-group no-border">
        <input type="text" id="search-social-medias" class="form-control" placeholder="Buscar...">
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
            <h5 class="card-title"> Redes sociais</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="social-medias-table">
                <thead class=" text-primary">
                    <th>
                        Nome
                    </th>
                    <th>
                        Link
                    </th>
                    <th>
                        Ícone
                    </th>
                    <th>
                        Ações
                    </th>
            </thead>
            <tbody>
            <?php foreach ($socialMedias as $socialMedia): ?>
            <tr>
                <td><?= $socialMedia->getName(); ?></td>
                <td>
                    <a href="<?= $socialMedia->getLink() ?>" target="_blank">
                        Conferir
                    </a>
                </td>
                <td>
                    <?= $socialMedia->getIcon(); ?>
                </td>
                <td>
                    <button class="btn" title="Editar" onclick="editSocialMedia(<?= $socialMedia->getSocialMediaId(); ?>)" style="font-size:14px;">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn" title="Excluir" onclick="deleteSocialMedia(<?= $socialMedia->getSocialMediaId(); ?>)" style="font-size:14px;">
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
<button class="btn btn-round btn-primary" type="click" id="register-new-social-media">Cadastrar nova rede social</button>
</div>
<div class="card out-display-none" id="modal-register-social-media">
  <div class="card-header">
    <h5 class="title">Cadastrar nova rede social</h5>
  </div>
  <div class="card-body">
    <form id="register-social-media">
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
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label for="icon">Link do ícone. Ícones <a href="https://fontawesome.com/icons" target="_blank">aqui</a></label>
            <input type="text" id="icon" class="form-control" placeholder="Link do ícone" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 pl-1">
          <button class="btn btn-round btn-primary" type="submit">Criar</button>
          <button class="btn btn-round btn-primary" type="submit" id="close-modal-register-social-media">Fechar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="card out-display-none" id="modal-edit-social-media">
  <div class="card-header">
    <h5 class="title">Editar rede social</h5>
  </div>
  <div class="card-body">
    <form id="edit-social-media">
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
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label for="edit_icon">Link do ícone. Ícones <a href="https://fontawesome.com/icons" target="_blank">aqui</a></label>
            <input type="text" class="form-control" id="edit_icon" placeholder="Link ícone" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-round btn-primary" type="submit">Editar</button>
          <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-social-media">Fechar</button>
          <input type="hidden" id="menu-edit-id">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="background-modal out-display-none" id="background-modal"></div>