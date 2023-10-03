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
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>failsafetest/results?safe_test_id=<?=$_GET['safe_test_id'];?>">Visão geral dos Resultados</a>
            </li>
            <li class="breadcrumb-current-item">Resultados de Falhas de teste</li>
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
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <?php if (isset($_GET['safe_test_id']) && !empty($_GET['safe_test_id'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="fs24"><b>Resultados</b></span><br>
                            </div>
                            <div class="panel-body mt10">
                                <div class="section row text-center">
                                    <h5>Resultados de Saídas por ECU</h5>
                                </div>
                                <?php foreach ($result_ecu as $key => $value) : ?>
                                    <div class="section row">
                                        <div class="col-md-4 text-center">
                                            <h6 class="text-primary">ECU:</h6>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h6 class="text-primary">Código de falha:</h6>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h6 class="text-primary">Status de código:</h6>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-4 text-center">
                                            <p class="p15" style="border-radius: 15px; box-shadow: 1px 1px 3px #888;"><?= $value['fc_ecu']; ?></p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p class="p15" style="border-radius: 15px; box-shadow: 1px 1px 3px #888;"><?= $value['fc']; ?></p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p class="p15" style="border-radius: 15px; box-shadow: 1px 1px 3px #888;"><?= $value['fail_status']; ?></p>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 text-center">
                                            <h6 class="text-primary">Descrição de código:</h6>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 text-center">
                                            <p class="p15" style="border-radius: 15px; box-shadow: 1px 1px 3px #888;"><?= $value['fc_description']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>

                                <div class="section row text-center">
                                    <h5>Resultados de Saídas por Veículos</h5>
                                </div>

                                <?php foreach ($vehicles_result as $value) : ?>

                                    <div class="section row text-center mb5">
                                        <h5 class="text-primary">Veículo: <?= $value['vehicle']; ?></h5>
                                        <p class="text-muted">Ecu: Código de falha -> Responsável</p>
                                    </div>
                                    <div class="section row text-center">
                                        <div class="col-md-12">
                                            <h6><?= $value['ecus']; ?></h6>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                <hr>

                                <div class="section row text-center">
                                    <h5>Gráfico de Status de falhas</h5>
                                </div>

                                <?php if (!empty($graphic_image['graphic_upload']) && $graphic_image['graphic_upload'] != 0) : ?>
                                    <div class="section row">
                                        <img src="<?= BASE_URL; ?><?= $graphic_image['graphic_upload']; ?>" alt="Gráfico">
                                    </div>
                                    <div class="section row text-center mauto mw500">
                                        <p class="text-muted text-center">Atualize a imagem do gráfico caso já tenha feito a reunião semanal, o download dele estará disponivel na página com o gráfico dinâmico.</p>
                                    </div>
                                    <div class="section row mauto mw200">
                                        <div id="animation-switcher" class="ph20">
                                            <a class="holder-active" href="#modal-form">
                                                <button class="btn btn-primary btn-bordered fs12" data-effect="mfp-zoomIn">
                                                    <b>ATUALIZAR GRÁFICO</b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="section row text-center">
                                        <a href="<?= BASE_URL; ?>failsafetest/all_results_download?safe_test_id=<?= $_GET['safe_test_id']; ?>" class="btn btn-primary btn-bordered">Download</a>
                                    </div>
                                <?php else : ?>
                                    <form action="<?= BASE_URL; ?>failsafetest/add_graphic_upload?safe_test_id=<?= $_GET['safe_test_id']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="section row mauto mw500">
                                            <h6 class="text-center">Por favor, envie a imagem do gráfico baixada durante o teste para que o download em pdf de todos os resultados seja liberado</h6>
                                        </div>
                                        <div class="section row mauto mw500">
                                            <label class="field prepend-icon file mb20 mt10">

                                                <input type="file" name="graphic_result" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                                                <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                <i class="fa fa-upload"></i>

                                            </label>
                                        </div>
                                        <div class="section text-center">
                                            <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                <?php endif; ?>

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


<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Atualizar gráfico
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>failsafetest/add_graphic_upload?safe_test_id=<?= $safe_test_id; ?>" id="form-order" enctype="multipart/form-data">
            <div class="panel-body">

                <div class="section row">
                    <h6 class="text-center text-muted">Selecione a imagem do Gráfico que você baixou</h6>
                    <label class="field prepend-icon file mb20 mt10">

                        <input type="file" name="graphic_result" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                        <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                        <i class="fa fa-upload"></i>

                    </label>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>