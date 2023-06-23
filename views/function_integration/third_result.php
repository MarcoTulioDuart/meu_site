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
                <a href="<?= BASE_URL; ?>functionintegration/results">Resultados de integração entre Funções</a>
            </li>
            <li class="breadcrumb-current-item">Terceiro resultado</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->
<?php if (isset($_COOKIE["error"])) : ?>
    <div class="section row">
        <div class="col-md-10 ph10 mb5">
            <div class="text-center">
                <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                    <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                    <h3 class="mtn fs20 text-white">Sucesso</h3>
                    <p><?= $_COOKIE["error"]; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
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
                                            O fluxograma será registrado apenas uma vez.
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-heading text-center">
                            <h4>Fluxograma</h4><br>
                        </div>
                        <div class="panel-body">

                            <?php if (!empty($flowchart) && $flowchart != 0) : ?>
                                <!-- Quando já existe Fluxograma -->
                                <div class="section">
                                    <form action="<?= BASE_URL; ?>functionintegration/edit_flowchart" method="post">
                                        <div class="ph10 mb5">
                                            <h5 class="text-center">Confirmamos que já há um fluxograma registrado!</h5>
                                            <h6 class="text-center pb15">Gostaria de fazer o download do arquivo?</h6>
                                        </div>
                                        <div class="section text-center">
                                            <a href="<?= BASE_URL; ?><?= $flowchart['upload']; ?>" class="btn fs14 btn-primary" download>Download</a>
                                        </div>
                                        <div class="section text-center mt35">
                                            <h5 class="text-center">Se precisar você também pode Atualizar o arquivo</h5>
                                        </div>
                                        <div class="section row">
                                            <label class="field prepend-icon file mb20 mt10">

                                                <input type="file" name="flowchart_update" class="gui-file" onchange="document.getElementById('uploader2').value = this.value;">

                                                <input type="text" id="uploader2" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                <i class="fa fa-upload"></i>

                                            </label>
                                        </div>
                                        <div class="section text-center">
                                            <button type="submit" class="btn fs14 btn-primary">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="section row pt35">
                                    <div id="animation-switcher" class="ph20">
                                        <div class="col-xs-12 col-sm-12 text-center">
                                            <a class="holder-active" href="#modal-form">
                                                <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                    <b>Enviar Fluxograma</b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php else : ?>
                                <!-- Quando não houver Fluxograma -->
                                <form action="<?= BASE_URL; ?>functionintegration/third_result" id="fluxograma" method="post" enctype="multipart/form-data">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5 text-center">
                                            <h6>Ainda não temos um fluxograma registrado, por favor envie o arquivo.</h6>
                                            <span class="text-muted">Caso ainda não tenha feito o fluxograma acesse o link recomendado a baixo.</span><br><br>
                                            <a class="text-primary" href="https://app.diagrams.net/" target="_blank">Criar Fluxograma</a>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <label class="field prepend-icon file mb20 mt10">

                                            <input type="file" name="flowchart_upload" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                            <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                            <i class="fa fa-upload"></i>

                                        </label>
                                    </div>
                                    <hr>
                                    <div class="section text-center">
                                        <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                                    </div>
                                </form>

                            <?php endif; ?>

                        </div>

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
                Envie o Fluxograma para a sua equipe
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>functionintegration/send_flowchart" id="form-order" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="section row text-center">
                    <h6 class="text-muted">
                        <span class="fs16 mr10">
                            <i class="fa fa-lightbulb-o"></i>
                        </span>
                        Se desejar enviar o email de forma padrão, apenas clique em enviar
                    </h6>
                </div>
                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Envie o email para outras pessoas</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="participant" class="field prepend-icon">
                        <input type="text" name="participant" id="participant" class="gui-input">
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
                
                <div class="section">
                    <h6 class="text-center">Envie o arquivo do resultado que você baixou *</h6>
                    <div class="section row">
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="pdf_result" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                            <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>