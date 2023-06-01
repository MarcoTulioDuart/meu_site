<!-- New Project -->

<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["Fail_new_project"])) : ?>
        <div class="text-center">
            <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Mensagem de Erro</h3>
                <p><?= $_COOKIE["Fail_new_project"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-active">
                <a href="index.html">
                    <span class="fa fa-circle-o"></span>
                </a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Projeto</li>
            <li class="breadcrumb-current-item">Novo Projeto</li>
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
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <?php if (!isset($_GET['form'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Novo projeto</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <form method="post" action="<?= BASE_URL; ?>project/new_project" id="form-order">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="name" class="field prepend-icon">
                                                <input type="text" name="name" id="name" class="gui-input" placeholder="Nome do projeto">
                                                <span class="field-icon">
                                                    <i class="fa fa-clipboard"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                    </div>
                                </div>
                                <!-- /Panel Body -->
                            </form>
                        <?php endif; ?>


                        <!-- FORM 2 -->


                        <?php if (isset($_GET['form']) && $_GET['form'] == 2) : ?>
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
                                            <h6>Se o projeto precisar de mais de uma biblioteca ECU, primeiro envie todas as funções necessárias de uma vez, escolha as CANs e Parâmetros necessários, e então o programa perguntará se são necessárias mais ECUs.</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">

                                <span class="panel-title pn">Selecionar ECUs</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Selecione uma ECU:</label>
                                </div>
                                <form action="<?= BASE_URL; ?>project?form=2" method="POST" id="form-order-2">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_ecu" class="field select">
                                                <select name="name_ecu" id="name_ecu" class="gui-input">
                                                    <?php if ($list_ecu_name == 0) : ?>
                                                        <option selected>Ainda não há tipos de ECUs cadastrados</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_ecu_name as $value) : ?>

                                                            <option value="<?= $value['name']; ?>" <?= (isset($selected) && $selected == $value['name']) ? "selected" : ""; ?>><?= $value['name']; ?></option>

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
                                <form action="<?= BASE_URL; ?>project/select_function_ecu" method="post" id="">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione as funções desejadas:</span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field">
                                                        <?php if (isset($list_ecu)) : ?>
                                                            <?php foreach ($list_ecu as $value) : ?>
                                                                <label class="block mt20 option option-info">
                                                                    <input type="checkbox" name="data_ecu_id[]" value="<?= $value['id']; ?>">
                                                                    <span class="checkbox"></span>
                                                                    <span><?= $value['name']; ?>: <?= $value['function_ecu']; ?></span>
                                                                </label>
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
                                    <a href="<?= BASE_URL; ?>project?form=3" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- FORM 3-->


                        <?php if (isset($_GET['form']) && $_GET['form'] == 3) : ?>
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
                                                Para pesquisar são necessários ao menos 3 caracteres na área de pesquisa.
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
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>

                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Selecione um tipo de rede CAN:</label>
                                </div>
                                <form action="<?= BASE_URL; ?>project?form=3" method="get" id="form-order-3">
                                    <input type="hidden" name="form" value="3">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_can" class="field select">
                                                <select name="name_can" id="name_can" class="gui-input">
                                                    <?php if ($list_can_name == 0) : ?>
                                                        <option selected>Ainda não há tipos de Redes CANs cadastradas</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_can_name as $value) : ?>

                                                            <option value="<?= $value['name']; ?>" <?= (isset($_GET['name_can']) && $_GET['name_can'] == $value['name']) ? "selected" : ""; ?>><?= $value['name']; ?></option>

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
                                <form action="<?= BASE_URL; ?>project/select_signal_can" method="post" id="form-order-4">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Signal names desejados:</span>
                                                    <span class="ml10" id="loading"></span>
                                                </div>
                                                <?php if (isset($_GET['name_can']) && !empty($_GET['name_can'])) : ?>
                                                    <input type="hidden" name="name_can" value="<?= $_GET['name_can']; ?>">
                                                <?php endif; ?>

                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field" id="show_signal">
                                                        <?php if (isset($list_can)) : ?>
                                                            <span class="text-muted">Rede Can: Signal Name | Signal Function</span>
                                                            <?php foreach ($list_can as $value) : ?>
                                                                <?php if (!empty($value['signal_name'])) : ?>
                                                                    <label class="block mt20 option option-info">
                                                                        <input type="checkbox" name="can_id[]" value="<?= $value['id']; ?>">
                                                                        <span class="checkbox mb5"></span>
                                                                        <span style="line-height: 2em;"><?= $value['rede_can']; ?>: <?= $value['signal_name']; ?> | <?= $value['signal_function']; ?></span>
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
                                    <a href="<?= BASE_URL; ?>project?form=2" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>project?form=4" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- FORM 4-->


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
                                                Para pesquisar são necessários ao menos 3 caracteres na área de pesquisa.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Selecionar base de dados de Parâmetros <?= $name_ecu['name']; ?></span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-10 ph10 mb5">
                                        <label for="search_benennung" class="field prepend-icon">
                                            <input type="text" name="search_benennung" id="search_benennung" class="gui-input" placeholder="Filtrar opções...">
                                            <span class="field-icon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <form action="<?= BASE_URL; ?>project/select_parameters" method="post" id="form-order-5">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Parâmetros desejados:</span>
                                                    <span class="ml10" id="loading_parameters"></span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field" id="show_benennung">
                                                        <?php if (isset($list_paramters) && !empty($list_paramters)) : ?>
                                                            <a class="text-primary fs16" href="<?= BASE_URL; ?>project/select_all_parameters">Selecionar todos</a>
                                                            <?php foreach ($list_paramters as $value) : ?>
                                                                <label class="block mt20 option option-info">
                                                                    <input type="checkbox" name="paramter_id[]" value="<?= $value['id']; ?>">
                                                                    <span class="checkbox mb5"></span>
                                                                    <span style="line-height: 2em;"><?= $value['type']; ?>: <?= $value['benennung']; ?> | <?= $value['codebedingung']; ?></span>
                                                                </label>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <span>Não foram cadastrados parâmetros compatíveis com essa ECU.</span>
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
                                <!-- /section -->
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>project?form=3" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>project?form=5" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

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
                                                Caso já tenha selecionado todos os dados necessários para o projeto, clique em 'sim' para ir pra última etapa do formulário, se não, clique em 'não' para voltar para a primeira etapa do formulário escolher outro ECU.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todas as ECUs já foram selecionadas?</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <?php if (isset($_COOKIE["success_all_parameters"])) : ?>
                                <div class="text-center">
                                    <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                        <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="mtn fs20 text-white">Sucesso</h3>
                                        <p><?= $_COOKIE["success_all_parameters"]; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="panel-body pn">
                                <div class="section row text-center">
                                    <a href="<?= BASE_URL; ?>project?form=6" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>project?form=2" class="btn fs14 btn-primary">Não</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET['form']) && $_GET['form'] == 6) : ?>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Selecionar Participantes</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                            </div>
                            <form method="post" action="<?= BASE_URL; ?>project/select_participants" id="form-order-6">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Participantes do projeto:</span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field">
                                                        <?php if (isset($list_participants)) : ?>
                                                            <?php foreach ($list_participants as $value) : ?>
                                                                <label class="block mt20 option option-info">
                                                                    <input type="checkbox" name="participant_id[]" value="<?= $value['id']; ?>">
                                                                    <span class="checkbox"></span>
                                                                    <span><?= $value['responsibility']; ?>: <?= $value['name']; ?> <?= $value['last_name']; ?></span>
                                                                </label>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <button type="submit" class="btn fs14 btn-primary">Finalizar cadastro</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                        <?php if (isset($_GET['form']) && $_GET['form'] == 7) : ?>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn mb20">Seu Projeto foi cadastrado com Sucesso!</span><br>
                                <span class="fa fa-check-circle-o fs50 text-primary"></span>
                            </div>
                            <div class="panel-body pn">
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

<!-- js -->
<script src="<?= BASE_URL ?>assets/js/pages/validation/new_project.js"></script>