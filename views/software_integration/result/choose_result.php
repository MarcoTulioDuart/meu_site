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
            <li class="breadcrumb-current-item">Integração entre Software</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">



                        <div class="panel-heading text-center">
                            <span class="panel-title">O que deseja Fazer?</span><br>
                        </div>
                        <div class="panel-body mt10">
                            <div class="section row text-center">
                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>softwareintegration/first_result?project_id=<?= $_GET['project_id']; ?>" class="btn fs14 btn-primary" title="Definir diagrama de blocos com Hardwares que fazem interfaces com cada uma das ECUs.">Primeiro Resultado</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <a href="<?= BASE_URL; ?>softwareintegration/second_result?project_id=<?= $_GET['project_id']; ?>" class="btn fs14 btn-primary" title="Releases dos Software">Segundo Resultado</a>
                                </div>

                                <div class="col-md-4  mb5">
                                    <div id="animation-switcher" class="ph20">
                                        <div class="col-xs-12 col-sm-4 text-right">
                                            <a class="holder-active" href="#modal-form">
                                                <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                    <b>AGENDAR REUNIÃO</b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
    </div>
</section>
<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Crie uma reunião
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>functionintegration/add_meeting" id="form-order" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="section row">
                    <h6 class="text-muted text-center">É obrigatório preencher os campos com asterisco.</h6>
                </div>
                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <label for="title" class="field prepend-icon">
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Digite o tema da reunião *" required>
                            <span class="field-icon">
                                <i class="fa fa-file"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="section row text-center">

                    <div class="form-group">
                        <div class="col-md-4">
                            <span class="field-icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <h6 class="text-center mtn pt10 pb20">Escolha uma data e horário para a reunião *</h6>
                        </div>

                        <div class="col-md-8">
                            <div id="datetimepicker3">
                                <input type="text" name="date_meeting" class="form-control" style="max-width: 250px;" required>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Convide outras pessoas para a reunião</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="participant" class="field prepend-icon">
                        <input type="text" name="participant" id="participant" class="gui-input">
                        <span class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Onde será feita a reunião? *</h6>
                    <h6 class="text-muted text-center">Cole o link da reunião.</h6>
                    <label for="link" class="field prepend-icon">
                        <input type="text" name="link" id="link" class="gui-input" required>
                        <span class="field-icon">
                            <i class="fa fa-link"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Deseja fazer um comentário ou recomendação?</h6>
                    <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo do link de reunião no email.</h6>
                    <label for="recommendation" class="field prepend-icon">
                        <textarea type="text" name="recommendation" id="recommendation" class="gui-textarea"></textarea>
                        <span class="field-icon">
                            <i class="fa fa-list"></i>
                        </span>
                    </label>
                </div>

                <div class="section">
                    <h6 class="text-center">Envie os arquivos necessários para a reunião *</h6>
                    <div class="section row">
                        <h6 class="text-center text-muted">Selecione o arquivo ZIP das especificações de funções que você baixou</h6>
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="especifications" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">

                            <input type="text" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                    <div class="section row">
                        <h6 class="text-center text-muted">Selecione o PDF do primeiro resultado que vocÊ baixou</h6>
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="pdf_first_result" class="gui-file" onchange="document.getElementById('uploader2').value = this.value;">

                            <input type="text" id="uploader2" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                </div>

                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>