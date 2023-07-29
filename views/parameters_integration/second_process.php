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
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>parametersintegration/results">Resultados de Integridade de Parâmetro</a>
            </li>
            <li class="breadcrumb-current-item">Segundo teste</li>
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

                        <!-- FORM 1: Confirmação se os testes foram suficientes -->
                        <?php if (!isset($_GET['form']) || empty($_GET['form'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Segunda rodada de testes</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                            </div>

                            <div class="panel-body pn">
                                <!-- Primeira pergunta -->
                                <div class="section row">
                                    <h5 class="text-center">Os testes feitos no processamento inicial foram suficientes?</h5>
                                </div>
                                <div class="section row">
                                    <div class="col-md-6 ph10 mb5">
                                        <a href="<?= BASE_URL; ?>parametersintegration/second_process?form=2" class="btn fs14 btn-primary">Sim</a>
                                    </div>
                                    <div class="col-md-6 ph10 mb5">
                                        <a href="<?= BASE_URL; ?>parametersintegration/choose_project?project_id=<?= $project_id; ?>" class="btn fs14 btn-primary" onclick="return confirm('Deseja realmente fazer um novo teste? Você será redirecionado para o início do módulo para testar outras amostras no mesmo projeto.')">Não</a>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                        <!-- FORM 2: -->
                        <?php if (isset($_GET['form']) && $_GET['form'] = 2) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Segunda rodada de testes</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                            </div>

                            <div class="panel-body pn">
                                Em Breve!
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