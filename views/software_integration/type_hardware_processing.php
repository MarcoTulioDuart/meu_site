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
            <li class="breadcrumb-current-item">Integração entre Software</li>
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
                                            <ul>
                                                <li><span style="background-color:#70AD47">ECU = VERDE</span>  </li>
                                                <li><span style="background-color:#4472C4"> SENSORES: AZUL</span></li>
                                                <li><span style="background-color:#7F7F7F">ATUADOR:  CINZA</span></li>
                                                <li><span style="background-color:#000000">CHICHOTE ELÉTRICO:PRETO</span></li>
                                                <li><span style="background-color:#4472C4">CHICHOTE PNEUMÁTICO: AZUL</span></li>
                                                <li>
                                                    <a style="color: white;" href="<?= BASE_URL; ?>assets/upload/flowchart/example_flowchart_hardware.png" download>
                                                        Clique para baixar.
                                                    </a>
                                                </li>
                                            </ul>





                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center pb25">
                            <span class="panel-title pn">Upload diagrama de blocos com Hardwares que fazem interfaces com a ecu <strong> <u> <?= $info_ecu['name']; ?> </u></strong></span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>
                        <div class="panel-body pn">
                            <form action="<?= BASE_URL; ?>softwareintegration/uploadDiagramHardware" method="post" enctype="multipart/form-data">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5 text-center">
                                        <span class="text-muted">Caso ainda não tenha feito o fluxograma acesse o link recomendado a baixo. Leia as dicas, para instruções de cores.</span><br><br>
                                        <a class="text-primary" href="https://app.diagrams.net/" target="_blank">Criar Fluxograma</a>
                                    </div>
                                </div>
                                <!-- Campos de upload de acordo com as funções selecionadas no form anterior -->

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <div class="panel mb50" id="p5">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                <input type="hidden" name="software_integrations_id" value="<?= $_GET['software_integrations_id'] ?>">
                                                <input type="hidden" name="ecu_id" value="<?= $_GET['ecu_id'] ?>">
                                                <label class="field prepend-icon file mb20 mt10">

                                                    <input type="file" name="files" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                                    <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                    <i class="fa fa-upload"></i>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn btn-primary"><b>Próximo</b></button>
                                </div>
                            </form>
                        </div>
                        <!-- /Panel -->
                    </div>
                </div>

            </div>
            <!-- /Column Center -->
        </div>
</section>