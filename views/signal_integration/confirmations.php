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
            <li class="breadcrumb-current-item">Integração entre Sinais</li>
            <li class="breadcrumb-current-item">Selecionar Função</li>
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

                        <!-- FORM 9: Confirmação de se é necessário mais funções -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 9) : ?>
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
                                                Caso já tenha selecionado todos os dados necessários para o modulo, clique em 'sim' para ir pra fase de teste de resultados, se não, clique em 'não' para voltar para a estapa de escolha de ECU.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todas as Funções necessárias da ECU <?= $name_ecu['name']; ?> já foram selecionados?</span><br>
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
                                    <a href="<?= BASE_URL; ?>signalintegration/confirmations?form=10" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=3" class="btn fs14 btn-primary">Não</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 10: Confirmação de se é necessário mais Ecus -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 10) : ?>
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
                                                Caso já tenha selecionado todos os dados necessários para o modulo, clique em 'sim' para ir pra fase de teste de resultados, se não, clique em 'não' para voltar para a estapa de escolha de ECU.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todas as ECUs necessárias já foram selecionados?</span><br>
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
                                    <a href="<?= BASE_URL; ?>signalintegration/select_main_function" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=2" class="btn fs14 btn-primary">Não</a>
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