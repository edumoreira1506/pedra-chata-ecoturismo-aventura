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
        <a class="navbar-brand" href="#">Textos do site</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
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
            <h4 class="card-title"> Página inicial</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="info-initial-table">
                <thead class=" text-primary">
                  <th>
                    Área
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Última atualização
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($infos['INITIAL'] as $info): ?>
                    <tr>
                      <td><?= $info->getArea(); ?></td>
                      <td>
                        <?= $info->getContent(); ?>
                      </td>
                      <td>
                        <?= $info->getLastUpdate(); ?>
                      </td>
                      <td>
                        <button class="btn" title="Editar" onclick="editInfo(<?= $info->getStaticId() ?>)" style="font-size:14px;">
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
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página inicial do Blog</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="info-initial-table">
                <thead class=" text-primary">
                  <th>
                    Área
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Última atualização
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($infos['BLOG'] as $info): ?>
                    <tr>
                      <td><?= $info->getArea(); ?></td>
                      <td>
                        <?= $info->getContent(); ?>
                      </td>
                      <td>
                        <?= $info->getLastUpdate(); ?>
                      </td>
                      <td>
                        <button class="btn" title="Editar" onclick="editInfo(<?= $info->getStaticId() ?>)" style="font-size:14px;">
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
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página de Contato</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="info-initial-table">
                <thead class=" text-primary">
                  <th>
                    Área
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Última atualização
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($infos['CONTACT'] as $info): ?>
                    <tr>
                      <td><?= $info->getArea(); ?></td>
                      <td>
                        <?= $info->getContent(); ?>
                      </td>
                      <td>
                        <?= $info->getLastUpdate(); ?>
                      </td>
                      <td>
                        <button class="btn" title="Editar" onclick="editInfo(<?= $info->getStaticId() ?>)" style="font-size:14px;">
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
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Página Sobre nós</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="info-initial-table">
                <thead class=" text-primary">
                  <th>
                    Área
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Última atualização
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($infos['ABOUT US'] as $info): ?>
                    <tr>
                      <td><?= $info->getArea(); ?></td>
                      <td>
                        <?= $info->getContent(); ?>
                      </td>
                      <td>
                        <?= $info->getLastUpdate(); ?>
                      </td>
                      <td>
                        <button class="btn" title="Editar" onclick="editInfo(<?= $info->getStaticId() ?>)" style="font-size:14px;">
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
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Rodapé</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="info-initial-table">
                <thead class=" text-primary">
                  <th>
                    Área
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Última atualização
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($infos['FOOTER'] as $info): ?>
                    <tr>
                      <td><?= $info->getArea(); ?></td>
                      <td>
                        <?= $info->getContent(); ?>
                      </td>
                      <td>
                        <?= $info->getLastUpdate(); ?>
                      </td>
                      <td>
                        <button class="btn" title="Editar" onclick="editInfo(<?= $info->getStaticId() ?>)" style="font-size:14px;">
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
    <div class="card out-display-none" id="modal-edit-info">
      <div class="card-header">
        <h5 class="title">Editar texto</h5>
      </div>
      <div class="card-body">
        <form id="edit-info">
          <div class="row">
            <div class="col-md-12 pr-1">
              <div>
                <label for="content">Conteúdo</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
                <input name="info-id" id="info-id" type="hidden" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-round btn-primary" type="submit">Editar</button>
              <button class="btn btn-round btn-primary" type="submit" id="close-modal-edit-info">Fechar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="background-modal out-display-none" style="height: 338vh;" id="background-modal"></div>
