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
            <li class="breadcrumb-current-item">Resultado de saídas de falhas por Veículo</li>
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

                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Resultado de Saídas por Veículo</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                        </div>

                        <div class="panel-body pn">
                            <?php foreach ($vehicles_result as $value) : ?>

                                <div class="section row text-center mb5">
                                    <h5 class="text-primary">Veículo: <?= $value['vehicle']; ?></h5>
                                    <p class="text-muted">Ecu: Código de falha -> Responsável</p>
                                </div>
                                <div class="section row text-center">
                                    <div class="col-md-12">
                                        <h6><?= $value['ecus'];?></h6>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>failsafetest/vehicle_result_download?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" class="btn btn-primary">Download</a>
                            </div>
                            <hr>
                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>failsafetest/graphic_view?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" class="btn btn-primary">Ver Gráfico</a>
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