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
            <li class="breadcrumb-current-item">Resultado de integração entre Parâmetros</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <?php if (!isset($_SESSION['parameters_id_proTSA']) || empty($_SESSION['parameters_id_proTSA'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Escolha um projeto Já processado</span><br>
                            </div>
                            <form method="post" action="<?= BASE_URL; ?>parametersintegration/choose_test" id="form-order">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="parameters_id" class="field select">

                                                <?php if ($list_parameters_integration == 0) : ?>
                                                    <p class="gui-input text-center">Você ainda não processou as informações de nunhum projeto</p>
                                                <?php else : ?>
                                                    <select name="parameters_id" id="parameters_id" class="gui-input">

                                                        <?php foreach ($list_parameters_integration as $value) : ?>

                                                            <option value="<?= $value['pi_id']; ?>">
                                                                Processo <?= $value['pi_id']; ?>: <?= $value['pro_name']; ?>
                                                            </option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <?php if ($list_parameters_integration != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- /Panel Body -->
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['parameters_id_proTSA']) && !empty($_SESSION['parameters_id_proTSA'])) : ?>
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
                                                O segundo resultado só poderá ser gerado após a definição de valores em Valores de referência.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center">
                                <span class="panel-title">O que deseja Fazer?</span><br>
                            </div>
                            <div class="panel-body mt10">
                                <div class="section row text-center">
                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>parametersintegration/first_result" class="btn fs14 btn-primary" title="Classificação / Prioridades dos testes de parametrização.">Primeiro Resultado</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>parametersintegration/parameters_value_1" class="btn fs14 btn-primary" title="Definição de valores de referência dos parâmetros.">Valores de Referência</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb5">
                                        <a href="<?= BASE_URL; ?>parametersintegration/second_result" class="btn fs14 btn-primary" title="Adição de dados de valores de parâmetros de projetos anteriores em tabela com novos parâmetros.">Segundo Resultado</a>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <div class="section row text-center">
                                    <div class="col-md-6 ph10">
                                        <a href="<?= BASE_URL; ?>parametersintegration/second_process" class="btn fs14 btn-primary" title="Nova rodada de testes com quantidade de amostras maior.">Segundo Teste</a>
                                    </div>
                                    <div class="col-md-6 ph10">
                                        <div id="animation-switcher" class="ph20">
                                            <div class="col-xs-12 col-sm-4 text-right">
                                                <a class="holder-active" href="#modal-form" title="Reunião / workshop entre fornecedores e montadora baseado nas planilhas do passo anterior.">
                                                    <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                        <b>AGENDAR REUNIÃO</b>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Crie uma reunião
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_meeting" id="form-order" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="section row">
                    <h6 class="text-muted text-center">É obrigatório preencher os campos com asterisco.</h6>
                </div>
                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <label for="title" class="field prepend-icon">
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Digite o tema da reunião *" required>
                            <span class="field-icon">
                                <i class="fa fa-file"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="section row text-center">

                    <div class="form-group">
                        <div class="col-md-4">
                            <span class="field-icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <h6 class="text-center mtn pt10 pb20">Escolha uma data e horário para a reunião *</h6>
                        </div>

                        <div class="col-md-8">
                            <div id="datetimepicker3">
                                <input type="text" name="date_meeting" class="form-control" style="max-width: 250px;" required>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Convide sua equipe para a reunião *</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="participant" class="field prepend-icon">
                        <input type="text" name="participant" id="participant" class="gui-input">
                        <span class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Onde será feita a reunião? *</h6>
                    <h6 class="text-muted text-center">Cole o link da reunião.</h6>
                    <label for="link" class="field prepend-icon">
                        <input type="text" name="link" id="link" class="gui-input" required>
                        <span class="field-icon">
                            <i class="fa fa-link"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Deseja fazer um comentário ou recomendação?</h6>
                    <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo do link de reunião no email.</h6>
                    <label for="recommendation" class="field prepend-icon">
                        <textarea type="text" name="recommendation" id="recommendation" class="gui-textarea"></textarea>
                        <span class="field-icon">
                            <i class="fa fa-list"></i>
                        </span>
                    </label>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>