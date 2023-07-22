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
            <li class="breadcrumb-current-item">Integração entre Sinais</li>
            <li class="breadcrumb-current-item">Selecionar Função</li>
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

                        <!-- FORM 2: Escolher ECUs -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 2) : ?>

                            <div class="panel-heading text-center pb25">

                                <span class="panel-title pn">Selecionar ECUs</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>

                            </div>
                            <div class="panel-body pn">
                                <div class="section text-center">
                                    <label>Quais são as ECUs envolvidas:</label>
                                </div>

                                <!-- TIPO DE ECU -->

                                <form action="<?= BASE_URL; ?>signalintegration/select_function_processing?form=2" method="POST">

                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_ecu" class="field select">

                                                <?php if ($list_ecu_name == 0) : ?>

                                                <?php else : ?>
                                                    <select name="name_ecu" id="name_ecu" class="gui-input">
                                                        <?php foreach ($list_ecu_name as $value) : ?>

                                                            <option value="<?= $value['t_name']; ?>">
                                                                <?= $value['t_name']; ?>
                                                            </option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>

                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=3" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 3: Escolher funções -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 3) : ?>

                            <div class="panel-heading text-center pb25">

                                <span class="panel-title pn">Selecionar Funções da ECU <?= $name_ecu['name']; ?></span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>

                            </div>
                            <div class="panel-body pn">

                                <!-- FUNÇÃO ECU -->
                                <?php if (isset($_COOKIE["repeated_function"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Erro</h3>
                                            <p><?= $_COOKIE["repeated_function"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= BASE_URL; ?>signalintegration/select_function_ecu" method="post">
                                    <div class="section row">
                                        <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">

                                                <div class="col-md-10 ph10 mb5">
                                                    <div class="option-group field">
                                                        <?php if (isset($list_ecu)) : ?>
                                                            <select name="list_ecu_id" id="list_ecu_id" class="gui-input">
                                                                <?php foreach ($list_ecu as $value) : ?>
                                                                    <option value="<?= $value['le_id']; ?>">
                                                                        <?= $value['d_name']; ?>: <?= $value['function_ecu']; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                                <div class="col-md-2 ph10 mb5">
                                                    <label class="file">
                                                        <button type="submit" class="button btn-primary">Escolher</button>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=2" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=4" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 4: Descrição de função -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 4) : ?>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Descreva a Função selecionada</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <form action="<?= BASE_URL; ?>signalintegration/description_ecu" id="pdf-upload" method="post" enctype="multipart/form-data">

                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                <?php if (isset($list_signals_ecu)) : ?>
                                                    <p class="mb15"><b>Função: </b><?= $list_signals_ecu['e_function_ecu']; ?></p>
                                                    <label for="description" class="field prepend-icon">

                                                        <textarea name="description" id="description" cols="30" rows="10" class="gui-textarea" placeholder="Descreva em até duas linhas:"></textarea>
                                                        <span class="field-icon">
                                                            <i class="fa fa-list"></i>
                                                        </span>
                                                    </label>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=3" class="btn fs14 btn-primary">Anterior</a>
                                        <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
                                    </div>
                                </form>
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