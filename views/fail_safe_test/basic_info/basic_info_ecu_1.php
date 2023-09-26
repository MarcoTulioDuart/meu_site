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
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>


                        <div class="panel-body">
                            <form action="<?= BASE_URL; ?>failsafetest/select_ecu_basic" method="POST">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                            <div class="panel-heading">
                                                <span class="panel-title">Escolha uma ou mais ECUs:</span>
                                            </div>
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                <div class="option-group field">
                                                    <?php foreach ($list_ecu as $value) : ?>
                                                        <label class="block mt20 option option-info">
                                                            <input type="checkbox" name="ecu_id[]" value="<?= $value['id']; ?>">
                                                            <span class="checkbox"></span>
                                                            <span><?= $value['name']; ?></span>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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