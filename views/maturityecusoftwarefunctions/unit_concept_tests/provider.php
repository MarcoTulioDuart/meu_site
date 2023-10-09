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
            <li class="breadcrumb-current-item">
                <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>">Maturidade de ECU's, Softwares e Funções - ETAPAS</a>
            </li>
            <li class="breadcrumb-current-item">Testes unitários ou conceito.</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<?php if (!isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider) || count($info_maturityecusoftwarefunctions_unit_concept_tests_provider) <= 0) : ?>
    <section class="container mb100 mt100 animated fadeIn pt35">
        <div class="row text-center">
            <div class="col-md-12" id="modal-content">
                <div id="animation-switcher" style="margin-top:10px;">
                    <a class="holder-active" href="#modal-request-supplier">
                        <button type="button" class="btn btn-info btn-bordered" data-effect="mfp-zoomIn">
                            <b>SOLICITAR FORNECEDOR</b>
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </section>
<?php else : ?>
    <section id="content" class="animated fadeIn pt35">
        <div class="content-left">

        </div>
        <div class="content-right table-layout" id="modal-content">
            <!-- Column Center -->
            <div class="chute chute-center pbn">
                <!-- Lists -->
                <div class="row">
                    <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                        <div class="panel" id="shortcut">

                            <!-- FORM 1: Escolha de projeto -->
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Testes unitários ou conceito - Fornecedor</span><br>
                                <span class="fa fa-circle"></span>
                            </div>

                            <form method="post" action="<?= BASE_URL; ?>maturityecusoftwarefunctions/unitConceptTestsProvider" id="form-order" enctype="multipart/form-data">
                                <div class="panel-body pn">
                                    <input type="hidden" name="maturityecusoftwarefunctions_id" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>">

                                    <div class="section row">
                                        <p class="fs14">Informe os e-mails:</p>
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="assembler_email" class="field prepend-icon">
                                                <input type="text" name="assembler_email" id="assembler_email" class="gui-input" placeholder="Separe com ; (ponto e vírgula) os e-mails." required value="<?= (isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider['assembler_email'])) ? $info_maturityecusoftwarefunctions_unit_concept_tests_provider['assembler_email'] : ""; ?>">
                                                <span class="field-icon">
                                                    <i class="fa fa-file"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <p class="mb15">Descreva o conteúdo do e-mail:</p>
                                            <label for="email_description" class="field prepend-icon">

                                                <textarea name="email_description" id="email_description" cols="30" rows="10" class="gui-textarea" placeholder="Descreva em até duas linhas:" required>
                                            <?= (isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider['reason_email'])) ? $info_maturityecusoftwarefunctions_unit_concept_tests_provider['reason_email'] : ""; ?>
                                            </textarea>
                                                <span class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <h6>Upload do Resultado</h6>
                                            <div class="panel mb50" id="p5">


                                                <label class="field prepend-icon file mb20 mt10">

                                                    <input type="file" name="result_file" class="gui-file" onchange="document.getElementById('result_file').value = this.value;" accept=".png, .pdf, .jpeg, .jpg, .doc, .docx, .xls, .xlsx">

                                                    <input type="text" id="result_file" name="result_file" class="gui-input fluid-width" placeholder="selecione um arquivo" value="<?= (isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider['result_file'])) ? $info_maturityecusoftwarefunctions_unit_concept_tests_provider['result_file'] : ""; ?>">
                                                    <i class="fa fa-upload"></i>
                                                </label>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="section text-center">

                                        <?php if (isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider) && $info_maturityecusoftwarefunctions_unit_concept_tests_provider['link'] != "" && $info_maturityecusoftwarefunctions_unit_concept_tests_provider['assembler_email'] == "") :
                                        ?>
                                            <button type="submit" class="btn btn-primary">Enviar</button>

                                        <?php elseif ($info_maturityecusoftwarefunctions['step_2'] == 1) : ?>
                                            <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/unitConceptTestsProviderDownload?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn btn-primary" title="Clique para abrir o PDF">ETAPA CONCLUÍDA</a> <br> <br>
                                            <?php if (isset($info_maturityecusoftwarefunctions_unit_concept_tests_provider['result_file'])) : ?>
                                                <a href="<?= BASE_URL; ?><?= $info_maturityecusoftwarefunctions_unit_concept_tests_provider['result_file']; ?>" download class="btn btn-info">Resultado </a>
                                            <?php endif; ?>

                                        <?php elseif (count($info_maturityecusoftwarefunctions_unit_concept_tests_provider) > 0) : ?>
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                            <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/completeStage?step=step_2&percentual_step=10&maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn btn-info">Aprovar</a>
                                            <div id="animation-switcher" style="margin-top:10px;">
                                                <a class="holder-active" href="#modal-form">
                                                    <button type="button" class="btn btn-danger btn-bordered" data-effect="mfp-zoomIn">
                                                        <b>REPROVAR</b>
                                                    </button>
                                                </a>
                                            </div>

                                        <?php endif; ?>
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
    <div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
        <div class="panel">
            <div class="panel-heading text-center">
                <span class="panel-title">
                    Motivos da reprovação
                </span>
            </div>
            <!-- /Panel Heading -->
            <form method="post" action="<?= BASE_URL; ?>maturityecusoftwarefunctions/unitConceptTestsProvider" id="form-order" enctype="multipart/form-data">
                <input type="hidden" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>" name="maturityecusoftwarefunctions_id">
                <div class="panel-body">

                    <div class="section row">
                        <h6 class="text-center mtn pt10 pb10">Emails do fornecedor</h6>
                        <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                        <label for="suppliers_email" class="field prepend-icon">
                            <input type="text" name="suppliers_email" id="suppliers_email" class="gui-input">
                            <span class="field-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </label>
                    </div>

                    <div class="section row">
                        <h6 class="text-center mtn pt10 pb10">Descreva o motivo da reprovação:</h6>
                        <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo do link de reunião no email.</h6>
                        <label for="reason_rejection" class="field prepend-icon">
                            <textarea type="text" name="reason_rejection" id="reason_rejection" class="gui-textarea"></textarea>
                            <span class="field-icon">
                                <i class="fa fa-list"></i>
                            </span>
                        </label>
                    </div>

                    <div class="section text-center">
                        <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /Panel -->
    </div>
<?php endif; ?>



<div id="modal-request-supplier" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Solicitar resposta do fornecedor.
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>maturityecusoftwarefunctions/unitConceptTestsProvider" id="form-order" enctype="multipart/form-data">
            <input type="hidden" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>" name="maturityecusoftwarefunctions_id">
            <div class="panel-body">

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Emails do fornecedor</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="suppliers_email" class="field prepend-icon">
                        <input type="text" name="suppliers_email" id="suppliers_email" class="gui-input">
                        <span class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Descreva o motivo do e-mail:</h6>
                    <h6 class="text-muted text-center">A mensagem digitada aparecerá no corpo do e-mail.</h6>
                    <label for="reason_email" class="field prepend-icon">
                        <textarea type="text" name="reason_email" id="reason_email" class="gui-textarea"></textarea>
                        <span class="field-icon">
                            <i class="fa fa-list"></i>
                        </span>
                    </label>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>