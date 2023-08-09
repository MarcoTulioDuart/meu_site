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
            <li class="breadcrumb-current-item">Segundo resultado</li>
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
                <div class="allcp-form tab-pane fluid-width mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4>Agendar Reunião entre fornecedores e montadora</h4><br>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="<?= BASE_URL; ?>parametersintegration/send_workshop" id="form-order" enctype="multipart/form-data">
                                <div class="panel-body">

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

                                    <div class="section">
                                        <h6 class="text-center">Envie a planilha para liberação em ambiente de testes *</h6>
                                        <div class="section row">
                                            <label class="field prepend-icon file mb20 mt10">

                                                <input type="file" name="pdf_upload" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                                <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                <i class="fa fa-upload"></i>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Link para armazenar informações *</h6>
                                        <h6 class="text-muted text-center">Cole o link do One Drive.</h6>
                                        <label for="link" class="field prepend-icon">
                                            <input type="text" name="link" id="link" class="gui-input" required>
                                            <span class="field-icon">
                                                <i class="fa fa-link"></i>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Defina a data de liberação da versão: *</h6>
                                        <h6 class="text-muted text-center">Versão específica em frota de veículos de testes ou ambiente de HIL.</h6>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="date_workshop" class="field prepend-icon">
                                                <input type="text" name="date_workshop" id="date_workshop" class="gui-input" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Versão: *</h6>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="version" class="field prepend-icon">
                                                <input type="text" name="version" id="version" class="gui-input" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Pontos em aberto:</h6>
                                        <h6 class="text-muted text-center">Máximo 5, com prazos.</h6>
                                        <label for="open_points" class="field prepend-icon">
                                            <textarea type="text" name="open_points" id="open_points" class="gui-textarea"></textarea>
                                            <span class="field-icon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Veiculos que serão testados: *</h6>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="test_vehicle" class="field prepend-icon">
                                                <input type="text" name="test_vehicle" id="test_vehicle" class="gui-input" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Quem são os responsáveis do teste? *</h6>
                                        <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                                        <label for="participant_test" class="field prepend-icon">
                                            <input type="text" name="participant_test" id="participant_test" class="gui-input">
                                            <span class="field-icon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="section row">
                                        <h6 class="text-center mtn pt10 pb10">Quem são os responsáveis da liberação dos parâmetros? *</h6>
                                        <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                                        <label for="participant_parameter" class="field prepend-icon">
                                            <input type="text" name="participant_parameter" id="participant_parameter" class="gui-input">
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
<!--
                                    <div class="section text-center">
                                        <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                                    </div>-->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Panel -->
                </div>

            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>