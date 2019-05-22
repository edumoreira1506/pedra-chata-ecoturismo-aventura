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
    <a class="navbar-brand" href="#">Usuários</a>
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
    <span class="navbar-toggler-bar navbar-kebab"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navigation">
    <form>
      <div class="input-group no-border">
        <input type="text" id="search-users" class="form-control" placeholder="Buscar...">
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
            <h4 class="card-title"> Usuários</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="users-table">
                <thead class=" text-primary">
                    <th>
                        Nome
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Ações
                    </th>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td id="user-name-<?= $user->getUserId() ?>"><?= $user->getName(); ?></td>
                <td>
                    <a href="mailto:<?= $user->getEmail() ?>">
                        <?= $user->getEmail(); ?>
                    </a>
                </td>
                <td>
                    <button class="btn" title="Excluir" onclick="deleteUser(<?= $user->getUserId() ?>)" style="font-size:14px;">
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
<button class="btn btn-round btn-primary" type="click" id="create-new-user">Criar Usuário</button>
</div>
<div class="card out-display-none" id="modal-new-user">
            <div class="card-header">
                <h5 class="title">Criar novo usuário</h5>
          </div>
          <div class="card-body">
              <form id="new-user-form">
                <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" id="name" placeholder="Nome completo" required="">
              </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label for="email">Endereço de email</label>
              <input type="email" id="email" class="form-control" placeholder="Email" required="">
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6 pr-1">
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" id="password" class="form-control" placeholder="Senha" required="">
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
        <button class="btn btn-round btn-primary" type="submit">Criar</button>
        <button class="btn btn-round btn-primary" id="close-modal-user">Fechar</button>
  </div>
</div>
</form></div>

</div>
<div class="background-modal out-display-none" id="background-modal"></div>