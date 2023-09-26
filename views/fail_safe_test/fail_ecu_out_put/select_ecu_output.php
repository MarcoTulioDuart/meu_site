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
                            <span class="panel-title pn">Seleção de Saídas por ECU</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <form method="GET" action="<?= BASE_URL; ?>failsafetest/select_fail_code?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" id="form-order">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="basic_info_id" class="field select">
                                            <select name="basic_info_id" id="basic_info_id" class="gui-input">

                                                <?php foreach ($all_ecus_basic_info as $value) : ?>

                                                    <option value="<?= $value['basic_info_id']; ?>"><?= $value['ecu_name']; ?></option>

                                                <?php endforeach; ?>

                                            </select>
                                        </label>
                                    </div>
                                </div>

                                <div class="section text-center">
                                    <button type="submit" class="button btn-primary">Enviar</button>
                                </div>
                            </div>
                            <!-- /Panel Body -->
                        </form>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>