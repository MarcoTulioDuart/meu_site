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
            <li class="breadcrumb-current-item">Fail Safe Test</li>
            <li class="breadcrumb-current-item">Seleção de saídas de falhas por ECU</li>
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

                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Resultado de Saídas por ECU</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                        </div>

                        <div class="panel-body pn">
                            <div class="section row">
                                <div class="col-md-4 text-center">
                                    <h6>ECU:</h6>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h6>Código de falha:</h6>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h6>Status de código:</h6>
                                </div>
                            </div>
                            <div class="section row">
                                <div class="col-md-4 text-center">
                                    <p><?= $result['ecu']; ?></p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p><?= $result['fc']; ?></p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p><?= $result['fail_status']; ?></p>
                                </div>
                            </div>
                            <div class="section row">
                                <div class="col-md-12">
                                    <h6>Descrição de código:</h6>
                                </div>
                            </div>
                            <div class="section row">
                                <div class="col-md-12">
                                    <p><?= $result['fc_description']; ?></p>
                                </div>
                            </div>
                            <div class="section text-center mt20">
                                <a href="<?= BASE_URL; ?>failsafetest/single_ecu_download?fail_safe_id=<?= $_GET['fail_safe_id']; ?>&basic_info_id=<?= $_GET['basic_info_id']; ?>" class="btn btn-primary"></a>
                            </div>
                            <hr>
                            <div class="section text-center">
                                <h6>Todos os testes em ECU's já foram realizados?</h6>
                                <div class="section row">
                                    <div class="col-md-6 text-center">
                                        <a href="<?= BASE_URL; ?>failsafetest/select_vehicle_out_put?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" class="btn btn-primary">Sim</a>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <a href="<?= BASE_URL; ?>failsafetest/select_ecu_output?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" class="btn btn-primary">Sim</a>
                                    </div>
                                </div>
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