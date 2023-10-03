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
            <li class="breadcrumb-current-item">Visão geral dos Resultados</li>
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

                        <?php if (!isset($_GET['safe_test_id']) || empty($_GET['safe_test_id'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Escolha um Processo de falhas</span><br>
                            </div>
                            <form method="post" action="<?= BASE_URL; ?>failsafetest/choose_test" id="form-order">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="safe_test_id" class="field select">

                                                <?php if ($list_fail_safe_test == 0) : ?>
                                                    <p class="gui-input text-center">Você ainda não processou nenhuma informação</p>
                                                <?php else : ?>
                                                    <select name="safe_test_id" id="safe_test_id" class="gui-input">

                                                        <?php foreach ($list_fail_safe_test as $value) : ?>

                                                            <option value="<?= $value['fst_id']; ?>">
                                                                Processo <?= $value['fst_id']; ?>
                                                            </option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <?php if ($list_fail_safe_test != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- /Panel Body -->
                            </form>
                        <?php endif; ?>

                        <?php if (isset($_GET['safe_test_id']) && !empty($_GET['safe_test_id'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title">O que deseja Fazer?</span><br>
                            </div>
                            <div class="panel-body mt10">
                                <div class="section row text-center">

                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>failsafetest/all_results?safe_test_id=<?= $_GET['safe_test_id'];?>" class="btn fs14 btn-primary" title="Saída de falhas encontradas por ECU e Veículos.">Resultados do Processo</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb5">
                                        <a href="<?= BASE_URL; ?>failsafetest/graphic_result?safe_test_id=<?= $_GET['safe_test_id'];?>" class="btn fs14 btn-primary" title="Gráfico com classificação de saída de falhas por ecu, dinâmico.">Gráfico de Status</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>failsafetest/workshop_meeting?safe_test_id=<?= $_GET['safe_test_id'];?>" class="btn fs14 btn-primary" title="Conclusão do Workshop semanal.">Workshop Semanal</a>
                                    </div>

                                </div>

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