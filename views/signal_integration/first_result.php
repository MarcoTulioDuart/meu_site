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
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>signalintegration/results">Resultados de integração entre Sinais</a>
            </li>
            <li class="breadcrumb-current-item">Primeiro resultado</li>
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
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4>As funções foram Classificadas:</h4><br>
                        </div>
                        <div class="panel-body">
                            <?php if (!isset($main_function)) : ?>
                                <h6 class="text-center text-danger">Seu resultado não pode ser calculado, verifique se a etapa de processamento foi concluída com sucesso.</h6>
                            <?php else : ?>
                                <div class="section row text-center">
                                    <div class="col-md-12">
                                        <h5 class="text-primary">Função Principal: <?= $main_function['e_function']; ?></h5>
                                    </div>
                                </div>
                                <div class="section row mtn">
                                    <form action="<?= BASE_URL; ?>signalintegration/update_status" method="post">
                                        <div class="tab-block ">
                                            <h6 class="text-center mtn mb20">Sinais relacionados com a Função</h6>
                                            <p class="text-muted text-center">Informe o status de todos os sinais</p>
                                            <div class="tab-content mh-500">
                                                <?php foreach ($all_signals_main as $key => $value) : ?>
                                                    <div class="col-md-8 col-xs-8">
                                                        <p class="pv20 pl20">
                                                            <?= $value['c_rede_can']; ?>: <?= $value['c_name']; ?>
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="c_id[]" value="<?= $value['ls_id']; ?>">
                                                    <div class="col-md-4 col-xs-4">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select name="status[]" id="status">
                                                                    <option value="null" <?= ($value['ls_status'] == "null" || empty($value['ls_status'])) ? "selected" : ""; ?>>Escolha o status</option>
                                                                    <option value="valid" <?= ($value['ls_status'] == "valid") ? "selected" : ""; ?>>Valido</option>
                                                                    <option value="invalid" <?= ($value['ls_status'] == "invalid") ? "selected" : ""; ?>>Invalido</option>
                                                                    <option value="error" <?= ($value['ls_status'] == "error") ? "selected" : ""; ?>>Erro</option>
                                                                    <option value="not sure" <?= ($value['ls_status'] == "not sure") ? "selected" : ""; ?>>Não sei</option>
                                                                    <option value="out of range" <?= ($value['ls_status'] == "out of range") ? "selected" : ""; ?>>Fora de alcance</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="section row text-center">
                                                        <div class="col-md-12">
                                                            <textarea name="comment[]" id="comment" class="gui-textarea" cols="20" rows="10" placeholder="Escreva um comentário caso o status seja diferente de válido"><?= (!empty($value['ls_comment'])) ? $value['ls_comment'] : ""; ?></textarea>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                        <div class="section row text-center mt20">
                                            <button class="btn btn-primary btn-bordered" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="section row text-center">
                                    <div class="col-md-12">
                                        <h5 class="text-system">Função Comum: <?= $commom_function['e_function']; ?></h5>
                                    </div>
                                </div>
                                <div class="section row mtn">
                                    <form action="<?= BASE_URL; ?>signalintegration/update_status" method="post">
                                        <div class="tab-block">
                                            <h6 class="text-center mtn mb20">Sinais relacionados com a Função</h6>
                                            <p class="text-muted text-center">Informe o status de todos os sinais</p>
                                            <div class="tab-content mh-200">
                                                <?php foreach ($all_signals_commom as $key => $value) : ?>
                                                    <div class="col-md-8 col-xs-8">
                                                        <p class="pv20 pl20">
                                                            <?= $value['c_rede_can']; ?>: <?= $value['c_name']; ?>
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="c_id[]" value="<?= $value['ls_id']; ?>">
                                                    <div class="col-md-4 col-xs-4">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select name="status[]" id="status">
                                                                    <option value="null" <?= ($value['ls_status'] == "null" || empty($value['ls_status'])) ? "selected" : ""; ?>>Escolha o status</option>
                                                                    <option value="valid" <?= ($value['ls_status'] == "valid") ? "selected" : ""; ?>>Valido</option>
                                                                    <option value="invalid" <?= ($value['ls_status'] == "invalid") ? "selected" : ""; ?>>Invalido</option>
                                                                    <option value="error" <?= ($value['ls_status'] == "error") ? "selected" : ""; ?>>Erro</option>
                                                                    <option value="not sure" <?= ($value['ls_status'] == "not sure") ? "selected" : ""; ?>>Não sei</option>
                                                                    <option value="out of range" <?= ($value['ls_status'] == "out of range") ? "selected" : ""; ?>>Fora de alcance</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="section row text-center">
                                                        <div class="col-md-12">
                                                            <textarea name="comment[]" id="comment" class="gui-textarea" cols="20" rows="10" placeholder="Escreva um comentário caso o status seja diferente de válido"><?= (!empty($value['ls_comment'])) ? $value['ls_comment'] : ""; ?></textarea>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="section row text-center mt20">
                                            <button class="btn btn-primary btn-bordered" type="submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="section row mtn">
                                    <h6 class="text-center mtn mb20">Mensagens em comum:</h6>
                                    <?php if (isset($signals_main) && isset($signals_commom)) : ?>
                                        <div id="animation-switcher" class="ph20">
                                            <div class="col-xs-12 text-center mt20">
                                                <a class="holder-active" href="#modal-form">
                                                    <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                        Ver Resultado
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                    <?php else : ?>
                                        <p class="text-center">Não foram encontradas mensagens em comum</p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide mw1200">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Resultado de comparação
            </span>
        </div>
        <!-- /Panel Heading -->
        <div class="panel-body">
            <div class="section row">
                <div class="col-md-6 text-center pr50">
                    <h6>Função Comum: <?= $commom_function['e_function']; ?></h6>
                </div>
                <div class="col-md-6 text-center pl50">
                    <h6>Função Principal: <?= $main_function['e_function']; ?></h6>
                </div>
            </div>

            <div class="panel" id="spy5">
                <div class="panel-body pn mt20">

                    <!-- Função comum -->
                    <div class="col-md-5 col-xs-5">
                        <div class="table-responsive">
                            <table class="table table-striped btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert text-center">
                                        <th class="text-center">Nome do sinal</th>
                                        <th class="text-center">Descrição</th>
                                        <th class="text-center">Disponibilidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_commom as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center fs12"><?= $value['c_signal_name']; ?></td>
                                            <td class="text-center"><?= $value['c_signal_function']; ?></td>
                                            <td class="text-center">
                                                <?php if ($value['lsc_available_type'] == 1) {
                                                    echo "Sim";
                                                } else {
                                                    echo "Não";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Comparação -->
                    <div class="col-md-2 col-xs-2">
                        <div class="table table-responsive">
                            <table class="table btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert">
                                        <th class="text-center">Status de Match</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_main as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php if ($signals_main[$key]['lsc_available_type'] == $signals_commom[$key]['lsc_available_type']) {
                                                    echo "=";
                                                } else {
                                                    echo "≠";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Função principal -->

                    <div class="col-md-5 col-xs-5">
                        <div class="table-responsive">
                            <table class="table table-striped btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert">
                                        <th class="text-center">Nome do sinal</th>
                                        <th class="text-center">Descrição</th>
                                        <th class="text-center">Disponibilidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_main as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center fs12"><?= $value['c_signal_name']; ?></td>
                                            <td class="text-center"><?= $value['c_signal_function']; ?></td>
                                            <td class="text-center">
                                                <?php if ($value['lsc_available_type'] == 1) {
                                                    echo "Sim";
                                                } else {
                                                    echo "Não";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section row text-center">
                <a class="btn btn-primary btn-bordered" href="<?= BASE_URL; ?>signalintegration/first_download" target="_blank">Download</a>
            </div>
        </div>
    </div>
    <!-- /Panel -->
</div>