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
            <li class="breadcrumb-current-item">Segundo resultado</li>
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
                <div class="allcp-form tab-pane mw1200 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4>Segundo Resultado</h4><br>
                        </div>
                        <div class="panel-body">
                            <?php if (!isset($signals_main)) : ?>
                                <h6 class="text-center text-danger">Seu resultado não pode ser calculado, verifique se a etapa de processamento foi concluída com sucesso.</h6>
                            <?php else : ?>

                                <!-- Função principal -->

                                <div class="col-md-12 col-xs-12 mb20">
                                    <div class="table-responsive">
                                        <table class="table table-striped btn-gradient-grey mbn">
                                            <thead>
                                                <tr class="alert">
                                                    <th class="text-center">Nome do sinal</th>
                                                    <th class="text-center">Descrição</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Comentário</th>
                                                    <th class="text-center">Recomendação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($signals_main as $key => $value) : ?>
                                                    <tr>
                                                        <td class="text-center fs12"><?= $value['c_name']; ?></td>
                                                        <td class="text-center"><?= $value['c_function']; ?></td>
                                                        <td class="text-center">
                                                            <?= ($value['ls_status'] == "null" || empty($value['ls_status'])) ? "Sem status" : $value['ls_status']; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= (empty($value['ls_comment']) ? "Sem comentário" : $value['ls_comment']); ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($value['ls_status'] == "valid") {
                                                                echo "Prossiga com os testes";
                                                            } else if ($value['ls_status'] == "null" || empty($value['ls_status'])) {
                                                                echo "O status não foi classificado, retorne ao primeira resultado e selecione o status do sinal";
                                                            } else {
                                                                echo "Contatar o especialista responsável pelo sinal CAN";
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr>
                                <div class="section row mtn text-center">
                                    <div class="col-md-6 col-xs-6 mt20 ph20">
                                        <a class="btn btn-primary btn-bordered" href="<?= BASE_URL; ?>signalintegration/second_download" target="_blank">Download</a>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <div id="animation-switcher" class="ph20">
                                            <div class="col-xs-12 text-center mt20">
                                                <a class="holder-active" href="#modal-form">
                                                    <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                        <b>Enviar relatório</b>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide mw500">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Enviar relatório
            </span>
        </div>
        <!-- /Panel Heading -->
        <div class="panel-body">

            <div class="section row">
                <h6 class="text-muted text-center">É obrigatório preencher os campos com asterisco.</h6>
            </div>
            <form action="<?= BASE_URL; ?>signalintegration/send_report" method="post" enctype="multipart/form-data">
                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Envie para outras pessoas Além da sua equipe</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="participant" class="field prepend-icon">
                        <input type="text" name="participant" id="participant" class="gui-input">
                        <span class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Deseja fazer um comentário ou recomendação?</h6>
                    <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo da mensagem padrão no email.</h6>
                    <label for="recommendation" class="field prepend-icon">
                        <textarea type="text" name="recommendation" id="recommendation" class="gui-textarea"></textarea>
                        <span class="field-icon">
                            <i class="fa fa-list"></i>
                        </span>
                    </label>
                </div>

                <div class="section">
                    <h6 class="text-center">Envie os arquivos necessários *</h6>
                    <div class="section row">
                        <h6 class="text-center text-muted">Selecione o primeiro resultado que você baixou</h6>
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="pdf_first_result" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                            <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                    <div class="section row">
                        <h6 class="text-center text-muted">Selecione o segundo resultado que você baixou</h6>
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="pdf_second_result" class="gui-file" onchange="document.getElementById('uploader2').value = this.value;">

                            <input type="text" id="uploader2" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Panel -->
</div>