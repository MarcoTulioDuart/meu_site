<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">
                <a href="<?= BASE_URL; ?>project/user_projects">Meus projetos</a>
            </li>
            <li class="breadcrumb-current-item">Projeto <?= $list_projects['id']; ?> </li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <h2 class="text-white text-center">
        <i class="text-white menu-icon fa fa-briefcase"></i> Projeto: <?= $list_projects['name']; ?>
    </h2>
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1100 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-body pn">
                            <?php if (isset($_COOKIE["invitation_sent_success"])) : ?>
                                <div class="text-center">
                                    <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                        <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="mtn fs20 text-white">Sucesso</h3>
                                        <p><?= $_COOKIE["invitation_sent_success"]; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($_COOKIE["invitation_sent_failed"])) : ?>
                                <div class="text-center">
                                    <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                        <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="mtn fs20 text-white">Falhou</h3>
                                        <p><?= $_COOKIE["invitation_sent_failed"]; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="section">
                                <div class="row text-center mb20">
                                    <span class="panel-title">Deletar dados de Módulos</span>
                                </div>
                                <div class="row text-center table-columns" style="display: flex; justify-content: center; flex-wrap: wrap;">
                                    <!-- Módulo 1 -->
                                    <?php if ($model1 == true) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="<?= BASE_URL; ?>functionintegration/delete_function_integration/<?= $list_projects['id']; ?>" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 1
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Módulo 2 -->
                                    <?php if (isset($software_integrations) && count($software_integrations) == 1) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="#" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 2
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Módulo 3 -->
                                    <?php if (!empty($integration_signals) && count($integration_signals) == 1) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="<?= BASE_URL; ?>signalintegration/delete_signal_integration/<?= $integration_signals[0]['id']; ?>" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 3
                                            </a>
                                        </div>
                                    <?php elseif (!empty($integration_signals) && count($integration_signals) > 1) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <div class="btn-group">
                                                <button type="button" class="fs14 btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <span class="fa fa-trash mr5"></span>
                                                    <b>Módulo 3</b>
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <?php foreach ($integration_signals as $key => $value) : ?>
                                                        <li>
                                                            <a href="<?= BASE_URL; ?>signalintegration/delete_signal_integration/<?= $value['id']; ?>" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                                <span class="fa fa-trash mr5"></span>
                                                                Processo <?= $value['id']; ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Módulo 4 -->
                                    <?php if (!empty($parameters_integration) && count($parameters_integration) == 1) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="<?= BASE_URL; ?>parametersintegration/delete_parameters_integration/<?= $parameters_integration[0]['id']; ?>" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 4
                                            </a>
                                        </div>
                                    <?php elseif (!empty($parameters_integration) && count($parameters_integration) > 1) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <div class="btn-group">
                                                <button type="button" class="fs14 btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <span class="fa fa-trash mr5"></span>
                                                    <b>Módulo 4</b>
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <?php foreach ($parameters_integration as $key => $value) : ?>
                                                        <li>
                                                            <a href="<?= BASE_URL; ?>parametersintegration/delete_parameters_integration/<?= $value['id']; ?>" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                                <span class="fa fa-trash mr5"></span>
                                                                Processo <?= $value['id']; ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>

                                        </div>
                                    <?php endif; ?>

                                    <!-- Módulo 5 -->
                                    <?php if (isset($model5)) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="#" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 5
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Módulo 6 -->
                                    <?php if (isset($model6)) : ?>
                                        <div class="col-sm-2 col-md-2 p5">
                                            <a href="#" class="fs14 btn btn-primary" onclick="return confirm('Deseja realmente excluir os dados deste Módulo?')">
                                                <span class="fa fa-trash mr5"></span>
                                                Módulo 6
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="section row">
                                <label class="m10">Nome do Projeto:</label>
                                <div class="gui-input"><?= $list_projects['name']; ?></div>
                            </div>
                            <!-- ECU -->
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title">ECUs selecionados</span>
                                        </div>
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                                            <div class="option-group field">
                                                <div class="panel-body pn">
                                                    <div class="table-responsive">
                                                        <table class="table footable" data-filter="#fooFilter">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>ECU</th>
                                                                    <th>Função</th>
                                                                    <th>Acrônimo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_ecu == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="10" class="text-center">Nenhum ECU foi escolhido</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_ecu as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['d_name']; ?></td>
                                                                            <td><?= $value['function_ecu']; ?></td>
                                                                            <td><?= $value['acronimo']; ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CAN -->
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title">CANs selecionados</span>
                                        </div>
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                                            <div class="option-group field">
                                                <div class="panel-body pn">
                                                    <div class="table-responsive">
                                                        <table class="table footable" data-filter="#fooFilter">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>ECU</th>
                                                                    <th>Rede</th>
                                                                    <th>Nome do Sinal</th>
                                                                    <th>Função do Sinal</th>
                                                                    <th>Tipo de Validação</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_can == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="8" class="text-center">Nenhum CAN foi escolhido</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_can as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['te_name']; ?></td>
                                                                            <td><?= $value['rede_can']; ?></td>
                                                                            <td><?= $value['signal_name']; ?></td>
                                                                            <td><?= $value['signal_function']; ?></td>
                                                                            <td>
                                                                                <?php if (empty($value['validation_type'])) {
                                                                                    echo "Não verificado";
                                                                                } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Parameters -->
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title">Parâmetros selecionados</span>
                                        </div>
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                                            <div class="option-group field">
                                                <div class="panel-body pn">
                                                    <div class="table-responsive">
                                                        <table class="table footable" data-filter="#fooFilter">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>ECU</th>
                                                                    <th>Tipo</th>
                                                                    <th>Pos</th>
                                                                    <th>Sachnummer</th>
                                                                    <th>Benennung</th>
                                                                    <th>Codebedingung</th>
                                                                    <th>Kem_ab</th>
                                                                    <th>Werke</th>
                                                                    <th>pg_kz</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_parameters == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="10" class="text-center">Nenhum Parâmetros foi escolhido</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_parameters as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['te_name']; ?></td>
                                                                            <td><?= $value['type']; ?></td>
                                                                            <td><?= $value['pos']; ?></td>
                                                                            <td><?= $value['sachnummer']; ?></td>
                                                                            <td><?= $value['benennung']; ?></td>
                                                                            <td><?= $value['codebedingung']; ?></td>
                                                                            <td><?= $value['kem_ab']; ?></td>
                                                                            <td><?= $value['werke']; ?></td>
                                                                            <td><?= $value['pg_kz']; ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Participants -->
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-heading">
                                            <span class="panel-title">Equipe selecionada</span>
                                        </div>
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                                            <div class="option-group field">
                                                <div class="panel-body pn">
                                                    <div class="table-responsive">
                                                        <table class="table footable" data-filter="#fooFilter">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nome</th>
                                                                    <th>E-mail</th>
                                                                    <th>Função</th>
                                                                    <th>ID da companhia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_participants == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="10" class="text-center">Nenhum Participante foi escolhido</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_participants as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['full_name']; ?></td>
                                                                            <td><?= $value['login']; ?></td>
                                                                            <td>
                                                                                <?php if ($list_projects['admin_project'] == $value['id']) {
                                                                                    echo "Administrador do Projeto";
                                                                                } else {
                                                                                    echo $value['responsibility'];
                                                                                } ?>
                                                                            </td>
                                                                            <td><?= $value['company_id']; ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($_SESSION['proTSA_online'] == $list_projects['admin_project']) : ?>
                                <hr>
                                <div class="section row">
                                    <div id="animation-switcher" class="ph20">
                                        <div class="col-xs-12 col-sm-4">
                                            <a class="holder-active" href="#modal-form">
                                                <button class="btn btn-primary" data-effect="mfp-zoomIn">
                                                    Compartilhar
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                <i class="fa fa-rocket"></i>Convide Alguém
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>project/project_view/<?= $list_projects['id']; ?>">
            <div class="panel-body ph15">
                <div class="section row mhn10">
                    <div class="col-md-12 ph15">
                        <label for="name" class="field prepend-icon">
                            <input type="text" name="name" id="name" class="gui-input" placeholder="Nome">
                            <span class="field-icon">
                                <i class="fa fa-user"></i>
                            </span>
                        </label>
                    </div>
                    <!-- /section -->
                </div>
                <!-- /Section -->
                <div class="section row mhn10">
                    <div class="col-md-12 ph15">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="Email">
                            <span class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- /Form -->
            <div class="panel-footer text-right">
                <button type="submit" class="btn btn-primary fs14 btn-sm">Enviar</button>
            </div>
            <!-- /Panel Footer -->
        </form>
    </div>
    <!-- /Panel -->
</div>