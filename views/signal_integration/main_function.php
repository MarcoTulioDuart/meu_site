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
            <li class="breadcrumb-current-item">Selecionar Função Principal de teste</li>
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

                        <!-- FORM 11: Confirmação de se é necessário mais Ecus -->

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
                                            O teste será feito em volta da função escolhida nessa etapa.
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-heading text-center pb25">
                            <span class="panel-title pn">Escolha a função principal do Teste</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                        </div>
                        <div class="panel-body pn">
                            <?php if (isset($_COOKIE["add_main_function_failed"])) : ?>
                                <div class="text-center">
                                    <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                        <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="mtn fs20 text-white">Falhou</h3>
                                        <p><?= $_COOKIE["add_main_function_failed"]; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?= BASE_URL; ?>signalintegration/select_main_function" method="post">
                                <div class="section row">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">

                                            <div class="col-md-10 ph10 mb5">
                                                <div class="option-group field">
                                                    <?php if (isset($list_function)) : ?>
                                                        <select name="signal_function_id" id="signal_function_id" class="gui-input">
                                                            <?php foreach ($list_function as $value) : ?>
                                                                <option value="<?= $value['ls_id']; ?>">
                                                                    <?= $value['e_name']; ?>: <?= $value['function_ecu']; ?>
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
                        </div>


                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>