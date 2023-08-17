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
    <div class="content-right table-layout" id="modal-content">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">



                        <div class="panel-heading text-center">
                            <span class="panel-title">O que deseja Fazer?</span><br>
                        </div>
                        <div class="panel-body mt10">
                            <div class="section row text-center">
                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>softwareintegration/first_result?project_id=<?= $_GET['project_id']; ?>" class="btn fs14 btn-primary" title="Definir diagrama de blocos com Hardwares que fazem interfaces com cada uma das ECUs.">Primeiro Resultado</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>softwareintegration/second_result?project_id=<?= $_GET['project_id']; ?>" class="btn fs14 btn-primary" title="Releases dos Software">Segundo Resultado</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>meeting?project_id=<?= $_GET['project_id']; ?>" class="btn fs14 btn-primary" title="Reuniões">Reuniões do Módulo</a>
                                </div>

                                

                            </div>
                        </div>


                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
    </div>
</section>

<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>