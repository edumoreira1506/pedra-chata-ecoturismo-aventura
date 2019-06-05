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
        <a class="navbar-brand" href="#pablo">Dashboard</a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Contatos/Orçamentos</h5>
            <h4 class="card-title"> Mensagens:</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Nome
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Mensagem
                  </th>
                  <th>
                    Data
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($contacts as $contact): ?>
                    <tr>
                      <td>
                        <?= $contact->getName() ?>
                      </td>
                      <td>
                        <?= $contact->getEmail() ?>
                      </td>
                      <td>
                        <?= $contact->getMessage() ?>
                      </td>
                      <td>
                        <?= $contact->getDateContact() ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Todas pessoas inscritas</h5>
            <h4 class="card-title"> Newsletter</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Email
                  </th>
                  <th>
                    Data de inscrição
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($leads as $lead): ?>
                    <tr>
                      <td>
                        <a href="mailto:<?= $lead->getEmail() ?>"><?= $lead->getEmail() ?></a>
                      </td>
                      <td>
                        <?= $lead->getSubscriptionDate() ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Acessos</h5>
            <h4 class="card-title"> Identificado por dispositivo</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Quantidade
                  </th>
                  <th>
                    Dispositivo
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($deviceAccesses as $deviceAccess): ?>
                    <tr>
                      <td>
                        <?= $deviceAccess->accesses ?> acessos
                      </td>
                      <td>
                        <?php if($deviceAccess->dispositive == 'CELLPHONE'){ ?>
                          Celular
                        <?php }elseif($deviceAccess->dispositive == 'COMPUTER'){ ?>
                          Computador
                        <?php }elseif($deviceAccess->dispositive == 'COMPUTER'){ ?>
                          TV
                        <?php }elseif($deviceAccess->dispositive == 'TABLET'){ ?>
                          Tablet
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Acessos</h5>
            <h4 class="card-title"> Identificado por cidade</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Quantidade
                  </th>
                  <th>
                    Cidade
                  </th>
                </thead>
                <tbody>
                  <?php foreach ($locationAcessess as $locationAcess): ?>
                    <tr>
                      <td>
                        <?= $locationAcess->accesses ?> acessos
                      </td>
                      <td>
                        <?php if($locationAcess->city == null || $locationAcess->city == ""){ ?>
                          Não identificado
                        <?php }else{ ?>
                          <?= $locationAcess->city ?>
                        <?php } ?>
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
  </div>