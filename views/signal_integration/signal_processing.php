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
            <li class="breadcrumb-current-item">Escolha de sinais</li>
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

                        <!-- FORM 5: Selecionar CANs e signal names de entrada -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 5) : ?>
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
                                                Se o projeto precisar de mais de uma rede CAN, primeiro envie todas os signal names necessários de uma vez, e depois escolha outra rede.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Selecionar Sinas de Entrada</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Selecione um tipo de rede CAN:</label>
                                </div>
                                <form action="<?= BASE_URL; ?>signalintegration/signal_processing?form=5" method="GET">
                                    <input type="hidden" name="form" value="5">
                                    <!-- Redes CAN presentes no projeto -->

                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_can" class="field select">
                                                <select name="name_can" id="name_can" class="gui-input">
                                                    <?php if ($list_can_name == 0) : ?>
                                                        <option selected>Ainda não há tipos de Redes CANs cadastradas</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_can_name as $value) : ?>

                                                            <option value="<?= $value['dc_rede_can']; ?>" <?= (isset($_GET['name_can']) && $_GET['name_can'] == $value['dc_rede_can']) ? "selected" : ""; ?>><?= $value['dc_rede_can']; ?></option>

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

                                <?php if (isset($_COOKIE["success_all_signal_can"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Sucesso</h3>
                                            <p><?= $_COOKIE["success_all_signal_can"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= BASE_URL; ?>signalintegration/select_signal_can?input_or_output=1" id="checkbox" method="post">
                                    <!-- Checkbox dos signal cans filtrados -->
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Signal names de Entrada:</span>
                                                    <span class="ml10" id="loading"></span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field" id="show_signal">
                                                        <?php if (isset($list_can)) : ?>
                                                            <a class="text-primary fs16" href="<?= BASE_URL; ?>signalintegration/select_all_signal_can?name_can=<?= $_GET['name_can']; ?>&input_or_output=1">Selecionar todos</a>
                                                            <?php foreach ($list_can as $value) : ?>
                                                                <?php if (!empty($value['signal_name'])) : ?>
                                                                    <label class="block mt20 option option-info">
                                                                        <input type="checkbox" name="can_id[]" value="<?= $value['dc_id']; ?>">
                                                                        <span class="checkbox"></span>
                                                                        <span><?= $value['rede_can']; ?>: <?= $value['signal_name']; ?></span>
                                                                    </label>
                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>signalintegration/select_function_processing?form=4" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>signalintegration/signal_processing?form=6" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 6: Tabela de funções registradas no modulo com questionário -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 6) : ?>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Responda sobre a disponibilidade do sinal:</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">

                                <form action="<?= BASE_URL; ?>signalintegration/answer_questions" method="post">
                                    <div class="section row text-center">

                                        <!-- TABELA e foreach list_ecu -->
                                        <div class="panel" id="spy1">
                                            <div class="panel-body pn mt20">
                                                <div class="table-responsive">
                                                    <table class="table footable">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" colspan="5">Nome do Sinal</th>
                                                                <th class="text-center" colspan="5">Este Sinal está disponível?</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($list_can as $key => $value) : ?>
                                                                <input type="hidden" name="signal_id[]" value="<?= $value['ls_id']; ?>">
                                                                <tr>
                                                                    <td class="text-center" colspan="5"><?= $value['c_name']; ?></td>
                                                                    <td class="text-center" colspan="5">
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="available_type_<?= $value['ls_id']; ?>" value="1"> Sim
                                                                        </label>
                                                                        <label class="m5 p5">
                                                                            <input type="radio" name="available_type_<?= $value['ls_id']; ?>" value="2"> Não
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="section text-center">
                                        <a href="<?= BASE_URL; ?>signalintegration/signal_processing?form=5" class="btn fs14 btn-primary">Anterior</a>
                                        <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
                                    </div>

                                </form>
                            </div>
                        <?php endif; ?>


                        <!-- FORM 7: Selecionar CANs e signal names de saída-->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 7) : ?>
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
                                                Se o projeto precisar de mais de uma rede CAN, primeiro envie todas os signal names necessários de uma vez, e depois escolha outra rede.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Selecionar Sinais de Saída</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section">
                                    <label>Selecione um tipo de rede CAN:</label>
                                </div>
                                <form action="<?= BASE_URL; ?>signalintegration/signal_processing?form=7" method="GET">
                                    <input type="hidden" name="form" value="7">
                                    <!-- Redes CAN presentes no projeto -->
                                    <div class="section row">
                                        
                                        <div class="col-md-12 mb5 text-left">
                                            <label class="file">
                                                <a href="<?= BASE_URL; ?>signalintegration/signal_processing?form=8" class="button btn-primary">Não escolher nenhum</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_can" class="field select">
                                                <select name="name_can" id="name_can" class="gui-input">
                                                    <?php if ($list_can_name == 0) : ?>
                                                        <option selected>Ainda não há tipos de Redes CANs cadastradas</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_can_name as $value) : ?>

                                                            <option value="<?= $value['dc_rede_can']; ?>" <?= (isset($_GET['name_can']) && $_GET['name_can'] == $value['dc_rede_can']) ? "selected" : ""; ?>><?= $value['dc_rede_can']; ?></option>

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

                                <?php if (isset($_COOKIE["success_all_signal_can"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Sucesso</h3>
                                            <p><?= $_COOKIE["success_all_signal_can"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <form action="<?= BASE_URL; ?>signalintegration/select_output_signal?input_or_output=2" id="checkbox" method="post">
                                    <!-- Checkbox dos signal cans filtrados -->
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">

                                            <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                                <div class="panel-heading">
                                                    <span class="panel-title">Selecione os Signal names de saída:</span>
                                                </div>
                                                <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                    <div class="option-group field" id="show_signal">
                                                        <?php if (isset($list_can)) : ?>
                                                            <span class="text-muted">Caso não queira selecionar clique em próximo.</span><br>
                                                            <a class="text-primary fs16" href="<?= BASE_URL; ?>signalintegration/select_all_output_signal?name_can=<?= $_GET['name_can']; ?>&input_or_output=2">Selecionar todos</a>
                                                            <?php foreach ($list_can as $value) : ?>
                                                                <?php if (!empty($value['signal_name'])) : ?>
                                                                    <label class="block mt20 option option-info">
                                                                        <input type="checkbox" name="can_id[]" value="<?= $value['dc_id']; ?>">
                                                                        <span class="checkbox"></span>
                                                                        <span><?= $value['rede_can']; ?>: <?= $value['signal_name']; ?></span>
                                                                    </label>
                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <div class="section text-center">
                                    <a href="<?= BASE_URL; ?>signalintegration/signal_processing?form=6" class="btn fs14 btn-primary">Anterior</a>
                                    <a href="<?= BASE_URL; ?>signalintegration/confirmations?form=9" class="btn fs14 btn-primary">Próximo</a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- FORM 8: Comentário caso o usuário não tenha selecionado nenhum sinal de saída -->

                        <?php if (isset($_GET['form']) && $_GET['form'] == 8) : ?>

                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Deixe um comentário</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                            </div>
                            <div class="panel-body pn">
                                <form action="<?= BASE_URL; ?>signalintegration/add_comment" method="post">
                                    <div class="section row text-center">
                                        <p class="fs14">Fale sobre o motivo de não ter escolhido sinais de saída:</p>
                                        <label for="comment" class="field prepend-icon">
                                            <textarea name="comment" id="comment" cols="30" rows="10" class="gui-textarea"></textarea>
                                            <span class="field-icon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="section row text-center">
                                        <button type="submit" class="btn fs14 btn-primary"><b>Enviar</b></button>
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