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
            <li class="breadcrumb-current-item">Segundo resultado</li>
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
                                            O segundo resultado só será liberado depois que a reunião com a equipe for marcada.
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-heading text-center">
                            <h4>Fluxograma</h4><br>
                        </div>
                        <div class="panel-body">
                            <?php if (isset($flowchart) && $flowchart != 0) : ?>
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <h6>Confirmamos que já há um fluxograma registrado! Gostaria de fazer o download do arquivo?</h6>

                                    </div>
                                    <div class="section text-center">
                                        <a href="e<?= BASE_URL; ?><?= $flowchart['upload'];?>" class="btn fs14 btn-primary" download>Download</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5 text-center">
                                        <h6>Ainda não temos um fluxograma registrado, por favor envie o arquivo.</h6>
                                        <span class="text-muted">Caso ainda não tenha feito o fluxograma acesse o link recomendado a baixo.</span><br><br>
                                        <a class="text-primary" href="http://" target="_blank">Criar Fluxograma</a>
                                    </div>
                                </div>
                                <div class="section row">
                                    <label class="field prepend-icon file mb20 mt10">

                                        <input type="file" name="upload" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                        <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                        <i class="fa fa-upload"></i>
                                    </label>
                                </div>
                            <?php endif; ?>

                            <hr>
                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>functionintegration/third_result" class="btn fs14 btn-primary">Enviar</a>
                            </div>
                        </div>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>