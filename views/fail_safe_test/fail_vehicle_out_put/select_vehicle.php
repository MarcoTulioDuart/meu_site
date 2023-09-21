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
            <li class="breadcrumb-current-item">Seleção de saídas de falhas por Veículo</li>
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
                            <span class="panel-title pn">Seleção de Saídas por Veículo</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <form method="POST" action="<?= BASE_URL; ?>failsafetest/select_vehicle?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" id="form-order">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                            <div class="panel-heading">
                                                <span class="panel-title">Escolha um ou mais Veículos para o teste:</span>
                                            </div>
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                <div class="option-group field">
                                                    <?php foreach ($all_vehicles as $value) : ?>
                                                        <label class="block mt20 option option-info">
                                                            <input type="checkbox" name="vehicle_id[]" value="<?= $value['id']; ?>">
                                                            <span class="checkbox"></span>
                                                            <span><?= $value['vehicle']; ?></span>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
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