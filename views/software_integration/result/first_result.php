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
                <a href="<?= BASE_URL; ?>softwareintegration/chooseResult?project_id=<?= $_GET['project_id']; ?>">Resultados de integração entre Software</a>
            </li>
            <li class="breadcrumb-current-item">Primeiro resultado</li>
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
    <div class="content-right table-layout">
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
                            <form action="<?= BASE_URL; ?>softwareintegration/first_result?project_id=1" id="fluxograma" method="post" enctype="multipart/form-data">
                                <?php if (isset($info_diagram_hardware) && $info_diagram_hardware != 0) : ?>
                                    
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <h5 class="text-center">Confirmamos que já há um fluxograma registrado!</h5>
                                            <h6 class="text-center pb15">Gostaria de fazer o download do arquivo?</h6>
                                        </div>
                                        <div class="section text-center">
                                            <a href="<?= BASE_URL; ?><?= $info_diagram_hardware['diagram']; ?>" class="btn fs14 btn-primary" download>Download</a>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5 text-center">
                                            <h6>Para Atualizar envio o arquivo novamente.</h6>
                                            <a class="text-primary" href="https://app.diagrams.net/" target="_blank">Criar Fluxograma</a>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <input type="hidden" name="action_crud" value="edit">
                                        <label class="field prepend-icon file mb20 mt10">

                                            <input type="file" name="flowchart_upload" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                            <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                            <i class="fa fa-upload"></i>

                                        </label>
                                    </div>
                                    <hr>
                                    <div class="section text-center">
                                        <button type="submit" class="btn fs14 btn-primary">Atualizar</button>
                                    </div>
                                <?php else : ?>
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
                                <?php endif; ?>

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
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>