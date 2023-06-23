<!-- New Project -->
<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-active">
                <a href="<?= BASE_URL; ?>home/home_page">
                    <span class="fa fa-circle-o"></span>
                </a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Integração entre Funções</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        <?php if (!isset($_GET['form'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Escolha um projeto</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>

                            <form method="post" action="<?= BASE_URL; ?>functionintegration/choose_project" id="form-order">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="project_id" class="field select">

                                                <?php if ($list_projects == 0) : ?>
                                                    <p class="gui-input text-center">Você não está participando de nenhum projeto</p>
                                                <?php else : ?>
                                                    <select name="project_id" id="project_id" class="gui-input">

                                                        <?php foreach ($list_projects as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['pro_name']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <?php if ($list_projects != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- /Panel Body -->
                            </form>
                        <?php endif; ?>

                        <!-- FORM 2: Escolher ECUs -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 2) : ?>

                            <div class="panel-heading text-center pb25">

                                <span class="panel-title pn">Selecionar ECUs</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>

                            </div>
                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Quais são as ECUs envolvidas:</label>
                                </div>

                                <!-- TIPO DE ECU -->

                                <form action="<?= BASE_URL; ?>functionintegration?form=2" method="POST">

                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_ecu" class="field select">

                                                <?php if ($list_ecu_name == 0) : ?>

                                                <?php else : ?>
                                                    <select name="name_ecu" id="name_ecu" class="gui-input">
                                                        <?php foreach ($list_ecu_name as $value) : ?>

                                                            <option value="<?= $value['t_name']; ?>">
                                                                <?= $value['t_name']; ?>
                                                            </option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>

                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>functionintegration?form=3" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 3: Escolher funções -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 3) : ?>

                            <div class="panel-heading text-center pb25">

                                <span class="panel-title pn">Selecionar Funções da ECU <?= $name_ecu['name']; ?></span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>

                            </div>
                            <div class="panel-body pn">

                                <!-- FUNÇÃO ECU -->

                                <form action="<?= BASE_URL; ?>functionintegration/select_function_ecu" method="post">
                                    <div class="section row">
                                        <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">

                                                <div class="col-md-10 ph10 mb5">
                                                    <div class="option-group field">
                                                        <?php if (isset($list_ecu)) : ?>
                                                            <select name="list_ecu_id" id="list_ecu_id" class="gui-input">
                                                                <?php foreach ($list_ecu as $value) : ?>
                                                                    <option value="<?= $value['le_id']; ?>">
                                                                        <?= $value['d_name']; ?>: <?= $value['function_ecu']; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                                <div class="col-md-2 ph10 mb5">
                                                    <label class="file">
                                                        <button type="submit" class="button btn-primary">Escolher</button>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>functionintegration?form=2" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>functionintegration?form=4" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 4: Upload de especicações de funções-->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 4) : ?>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-lightbulb-o fs24"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary p15 w200">
                                        <li>
                                            <h5><b>Dica:</b></h5>
                                        </li>
                                        <li>
                                            <h6>
                                                Se o projeto precisar de mais de uma rede CAN, primeiro envie todas os signal names necessários de uma vez, e depois escolha outra rede.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Upload de arquivos das funções ECU</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <form action="<?= BASE_URL; ?>functionintegration/upload_file_ecu" id="pdf-upload" method="post" enctype="multipart/form-data">

                                    <!-- Campos de upload de acordo com as funções selecionadas no form anterior -->

                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <div class="panel mb50" id="p5">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Escolha os arquivos correspondentes a cada função:</span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <?php if (isset($_COOKIE["error"])) : ?>
                                                        <div class="text-center">
                                                            <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                                                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                                                <h3 class="mtn fs20 text-white">Sucesso</h3>
                                                                <p><?= $_COOKIE["error"]; ?></p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (isset($list_integration_ecu)) : ?>

                                                        <input type="hidden" name="list_ecu_id" value="<?= $list_integration_ecu['li_id']; ?>">

                                                        <span><?= $list_integration_ecu['e_name']; ?>: <?= $list_integration_ecu['e_function_ecu']; ?>:</span>

                                                        <label class="field prepend-icon file mb20 mt10">

                                                            <input type="file" name="files" class="gui-file" onchange="document.getElementById('uploader').value = this.value;" accept="application/pdf">

                                                            <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                            <i class="fa fa-upload"></i>
                                                        </label>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <a href="<?= BASE_URL; ?>functionintegration?form=3" class="btn fs14 btn-primary">Anterior</a>
                                        <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 5: Selecionar CANs e signal names -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 5) : ?>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-lightbulb-o fs24"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary p15 w200">
                                        <li>
                                            <h5><b>Dica:</b></h5>
                                        </li>
                                        <li>
                                            <h6>
                                                Se o projeto precisar de mais de uma rede CAN, primeiro envie todas os signal names necessários de uma vez, e depois escolha outra rede.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Selecionar os CANs</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Selecione um tipo de rede CAN:</label>
                                </div>
                                <form action="<?= BASE_URL; ?>functionintegration?form=5" method="GET">
                                    <input type="hidden" name="form" value="5">
                                    <!-- Redes CAN presentes no projeto -->

                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_can" class="field select">
                                                <select name="name_can" id="name_can" class="gui-input">
                                                    <?php if ($list_can_name == 0) : ?>
                                                        <option selected>Ainda não há tipos de Redes CANs cadastradas</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_can_name as $value) : ?>

                                                            <option value="<?= $value['dc_rede_can']; ?>" <?= (isset($_GET['name_can']) && $_GET['name_can'] == $value['dc_rede_can']) ? "selected" : ""; ?>><?= $value['dc_rede_can']; ?></option>

                                                        <?php endforeach; ?>

                                                    <?php endif; ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>

                                </form>

                                <!-- Campo de pesquisa de CANs -->

                                <div class="section row">
                                    <div class="col-md-10 ph10 mb5">
                                        <label for="search_signal" class="field prepend-icon">
                                            <input type="text" name="search_signal" id="search_signal" class="gui-input" placeholder="Filtrar opções...">
                                            <span class="field-icon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <?php if (isset($_COOKIE["success_all_signal_can"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Sucesso</h3>
                                            <p><?= $_COOKIE["success_all_signal_can"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= BASE_URL; ?>functionintegration/select_signal_can" id="checkbox" method="post">
                                    <!-- Checkbox dos signal cans filtrados -->
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Signal names desejados:</span>
                                                    <span class="ml10" id="loading"></span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field" id="show_signal">
                                                        <?php if (isset($list_can)) : ?>
                                                            <a class="text-primary fs16" href="<?= BASE_URL; ?>functionintegration/select_all_signal_can?name_can=<?= $_GET['name_can']; ?>">Selecionar todos</a>
                                                            <?php foreach ($list_can as $value) : ?>
                                                                <?php if (!empty($value['signal_name'])) : ?>
                                                                    <label class="block mt20 option option-info">
                                                                        <input type="checkbox" name="can_id[]" value="<?= $value['dc_id']; ?>">
                                                                        <span class="checkbox"></span>
                                                                        <span><?= $value['rede_can']; ?>: <?= $value['signal_name']; ?></span>
                                                                    </label>
                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>functionintegration?form=4" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>functionintegration?form=6" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 5: Confirmação de se existem mais cans para serem registradas -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 6) : ?>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-lightbulb-o fs24"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary p15 w200">
                                        <li>
                                            <h5><b>Dica:</b></h5>
                                        </li>
                                        <li>
                                            <h6>
                                                Caso já tenha selecionado todos os CANs necessários para o modulo, clique em 'sim', se não, clique em 'não' para voltar e escolher outro CAN.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todas as funções da ECU <?= $name_ecu['name']; ?> foram selecionadas?</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section row text-center">
                                    <a href="<?= BASE_URL; ?>functionintegration?form=7" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>functionintegration?form=3" class="btn fs14 btn-primary">Não</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 7: Tabela de funções registradas no modulo com questionário -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 7) : ?>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Responda o questionário sobre as funções</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">

                                <form action="<?= BASE_URL; ?>functionintegration/answer_questions" method="post">
                                    <div class="section row text-center">

                                        <!-- TABELA e foreach list_ecu -->
                                        <div class="panel" id="spy1">
                                            <div class="panel-body pn mt20">
                                                <div class="table-responsive">
                                                    <table class="table footable">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" colspan="2">Função</th>
                                                                <th class="text-center" colspan="5">A função será série nos veículos que será aplicada?</th>
                                                                <th class="text-center" colspan="5">A função gera indicação no painel de instrumentos?</th>
                                                                <th class="text-center" colspan="5">A função é homologatória?</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($list_ecu as $key => $value) : ?>
                                                                <tr>
                                                                    <input type="hidden" name="function_id[]" value="<?= $value['li_id']; ?>">
                                                                    <td colspan="2"><?= $value['e_function_ecu']; ?></td>
                                                                    <td colspan="5">
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_1_<?= $key; ?>" value="<?= $list_points['point_question_1']; ?>"> Sim
                                                                        </label>
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_1_<?= $key; ?>" value="0"> Não
                                                                        </label>
                                                                    </td>
                                                                    <td colspan="5">
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_2_<?= $key; ?>" value="<?= $list_points['point_question_2']; ?>"> Sim
                                                                        </label>
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_2_<?= $key; ?>" value="0"> Não
                                                                        </label>
                                                                    </td>
                                                                    <td colspan="5">
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_3_<?= $key; ?>" value="<?= $list_points['point_question_3']; ?>"> Sim
                                                                        </label>
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="question_3_<?= $key; ?>" value="0"> Não
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="section text-center">
                                        <a href="<?= BASE_URL; ?>functionintegration?form=6" class="btn fs14 btn-primary">Anterior</a>
                                        <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
                                    </div>

                                </form>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 8: Confirmação de se é necessário mais um ecu -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 8) : ?>
                            <div class="right">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-lightbulb-o fs24"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary p15 w200">
                                        <li>
                                            <h5><b>Dica:</b></h5>
                                        </li>
                                        <li>
                                            <h6>
                                                Caso já tenha selecionado todos os dados necessários para o modulo, clique em 'sim' para ir pra fase de teste de resultados, se não, clique em 'não' para voltar para a etapa de escolha de ECU.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todos os ECUs já foram selecionados?</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section row text-center">
                                    <a href="<?= BASE_URL; ?>functionintegration/results?project=<?= $id_project; ?>" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>functionintegration?form=2" class="btn fs14 btn-primary">Não</a>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>