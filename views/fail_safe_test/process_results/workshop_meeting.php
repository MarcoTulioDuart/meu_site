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
                <a href="<?= BASE_URL; ?>failsafetest/results?safe_test_id=<?= $_GET['safe_test_id']; ?>">Visão geral dos Resultados</a>
            </li>
            <li class="breadcrumb-current-item">Resultados de Falhas de teste</li>
        </ol>
    </div>
</header>

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <?php if (isset($_GET['safe_test_id']) && !empty($_GET['safe_test_id'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="fs24"><b>Resultados</b></span><br>
                            </div>
                            <div class="panel-body mt10">
                                <div class="section row text-center">
                                    <h5>Resultados de Saídas por ECU</h5>
                                </div>
                                <form action="<?= BASE_URL; ?>failsafetest/workshop_meeting" method="get">
                                    <input type="hidden" name="safe_test_id" value="<?= $_GET['safe_test_id']; ?>">
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="basic_info_id" class="field select">
                                                <select name="basic_info_id" id="basic_info_id" class="gui-input">
                                                    <?php if ($list_info == 0) : ?>
                                                        <option selected>Não foram encontradas ECUs cadastradas neste teste</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_info as $value) : ?>

                                                            <option value="<?= $value['basic_info_id']; ?>" <?= (isset($selected) && $selected == $value['ecu_name']) ? "selected" : ""; ?>><?= $value['ecu_name']; ?></option>

                                                        <?php endforeach; ?>

                                                    <?php endif; ?>


                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <form action="<?= BASE_URL; ?>failsafetest/send_workshop?safe_test_id=<?= $_GET['safe_test_id']; ?>" method="post">
                                    <div class="tab-block ">
                                        <h6 class="text-center mtn mb20 fs16">Códigos de falhas</h6>
                                        <div class="tab-content mh-500">
                                            <?php if (!isset($code) || empty($code)) : ?>
                                                <p class="text-center fs14">Escolha uma ecu...</p>
                                            <?php else : ?>
                                                <?php foreach ($code as $key => $value) : ?>
                                                    <div class="col-md-8 col-xs-8">
                                                        <p class="pv20 pl20">
                                                            <span class="text-primary"><?= $value['fc']; ?></span>
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="code_id[]" value="<?= $value['id']; ?>">
                                                    <div class="col-md-4 col-xs-4">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select name="solution[]">
                                                                    <option value="Not Relevant" <?= ($value['solution'] == "Not Relevant") ? "selected" : ""; ?>>Irrelevante</option>
                                                                    <option value="Unsolved" <?= ($value['solution'] == "Unsolved") ? "selected" : ""; ?>>Em trabalho</option>
                                                                    <option value="Solved" <?= ($value['solution'] == "Solved") ? "selected" : ""; ?>>Resolvido</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                                <hr>
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