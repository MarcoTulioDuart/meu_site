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
            <li class="breadcrumb-current-item">Resultado de integração entre Parâmetros</li>
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

                        <?php if (!isset($_SESSION['safe_test_id_proTSA']) || empty($_SESSION['safe_test_id_proTSA'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Escolha um projeto Já processado</span><br>
                            </div>
                            <form method="post" action="<?= BASE_URL; ?>failsafetest/choose_test" id="form-order">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="safe_test_id" class="field select">

                                                <?php if ($list_fail_safe_test == 0) : ?>
                                                    <p class="gui-input text-center">Você ainda não processou as informações de nunhum projeto</p>
                                                <?php else : ?>
                                                    <select name="safe_test_id" id="safe_test_id" class="gui-input">

                                                        <?php foreach ($list_fail_safe_test as $value) : ?>

                                                            <option value="<?= $value['fst_id']; ?>">
                                                                Processo <?= $value['fst_id']; ?>: <?= $value['pro_name']; ?>
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

                        <?php if (isset($_SESSION['safe_test_id_proTSA']) && !empty($_SESSION['safe_test_id_proTSA'])) : ?>
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
                                                O segundo resultado só poderá ser gerado a conclusão do workshop semanal.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center">
                                <span class="panel-title">O que deseja Fazer?</span><br>
                            </div>
                            <div class="panel-body mt10">
                                <div class="section row text-center">
                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>failsafetest/workshop_meeting" class="btn fs14 btn-primary" title="Workshop semanal.">Agendar Reunião</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb20">
                                        <a href="<?= BASE_URL; ?>failsafetest/first_result" class="btn fs14 btn-primary" title="Saída de falhas encontradas em veículos.">Primeiro resultado</a>
                                    </div>

                                    <div class="col-md-4 ph10 mb5">
                                        <a href="<?= BASE_URL; ?>failsafetest/second_result" class="btn fs14 btn-primary" title="Gráfico com classificação de saída de falhas.">Segundo Resultado</a>
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