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
                                <div class="section row text-center">
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
                                <form action="<?= BASE_URL; ?>parametersintegration/second_process" method="post" enctype="multipart/form-data">
                                    <div class="section">
                                        <h6 class="text-center">Envie a versão da tabela de parâmetros para a liberação *</h6>
                                        <div class="section row">
                                            <label class="field prepend-icon file mb20 mt10">

                                                <input type="file" name="pdf_upload" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                                <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                <i class="fa fa-upload"></i>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Versão de HW da ECU: *</h6>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="version_hw" class="field prepend-icon">
                                                <input type="text" name="version_hw" id="version_hw" class="gui-input" placeholder="Digite o tema da reunião *" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Versão de SW da ECU: *</h6>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="version_sw" class="field prepend-icon">
                                                <input type="text" name="version_sw" id="version_sw" class="gui-input" placeholder="Digite o tema da reunião *" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Aprovado por: *</h6>
                                        <h6 class="text-muted text-center">Digite os nomes no campo abaixo, separando por ' , '.</h6>
                                        <label for="name_aproved" class="field prepend-icon">
                                            <input type="text" name="name_aproved" id="name_aproved" class="gui-input">
                                            <span class="field-icon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Deseja fazer um comentário ou recomendação?</h6>
                                        <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo do texto padrão.</h6>
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
                                </form>
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