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
            <li class="breadcrumb-current-item">Maturidade de ECU's, Softwares e Funções</li>
            <li class="breadcrumb-current-item">Resultados</li>
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
                            <span class="panel-title">ETAPAS:</span><br>
                        </div>
                        <div class="panel-body mt10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="progress" style="background-color: gray;">
                                        <div class="progress-bar  progress-bar-striped " role="progressbar" style="width: <?= $info_maturityecusoftwarefunctions['total_step']; ?>%; background-color: green;font-size: 20px;" aria-valuenow="<?= $info_maturityecusoftwarefunctions['total_step']; ?>" aria-valuemin="0" aria-valuemax="100"><?= $info_maturityecusoftwarefunctions['total_step']; ?>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="section row text-center">
                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn fs14 btn-primary" title="Insira as informações solicitadas.">Informações do Software</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/unit_concept_tests_provider?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn fs14 btn-primary " title="Insira as informações solicitadas.">Testes unitários ou conceito.</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/hillTestsSupplierAssembler?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="fs14 btn btn-primary " style="white-space: normal;" title="Insira as informações solicitadas.">Testes em Hill no fornecedor ou montadora</a>
                                </div>





                            </div>
                        </div>
                        <div class="panel-body mt10">
                            <div class="section row text-center">

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/applicationTest?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn fs14 btn-primary " title="Insira as informações solicitadas.">Testes de aplicação</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn fs14 btn-primary " title="Insira as informações solicitadas.">Testes de durabilidade</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/approvalTest?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn fs14 btn-primary " title="Insira as informações solicitadas."> Testes de Homologação</a>
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