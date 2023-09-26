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
            <li class="breadcrumb-current-item">Informações básicas da Ecu</li>
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

                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Informações básicas da Ecu</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <div class="panel-body pn">
                            <form method="post" action="<?= BASE_URL; ?>failsafetest/add_responsible?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" id="form-order">
                                <div class="section row">
                                    <p class="fs14 m20">Digite as informações do responsável pela ECU:</p>
                                    <?php foreach ($all_ecus_basic_info as $key => $value) : ?>
                                        <div class="section">
                                            <h6 class="m20 p15">ECU: <?= $value['ecu_name']; ?></h6>
                                        </div>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="responsible_name_<?= $value['type_ecu_id']; ?>" class="field prepend-icon">
                                                <input type="text" name="responsible_name[]" id="responsible_name_<?= $value['type_ecu_id']; ?>" class="gui-input" placeholder="Digite o nome do resposável" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>

                                        <div class="col-md-12 ph10 mb30">
                                            <label for="responsible_email_<?= $value['type_ecu_id']; ?>" class="field prepend-icon">
                                                <input type="text" name="responsible_email[]" id="responsible_email_<?= $value['type_ecu_id']; ?>" class="gui-input" placeholder="Digite o email do resposável" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Panel Body -->


                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>