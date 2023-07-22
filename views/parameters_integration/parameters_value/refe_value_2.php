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
                <a href="<?= BASE_URL; ?>parametersintegration/results">Resultados de Integridade de Parâmetro</a>
            </li>
            <li class="breadcrumb-current-item">Definição de valores</li>
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
                            <span class="panel-title fs22 mw400 text-center"><b>Definição de valores de referência dos parâmetros</b></span>
                        </div>
                        <div class="panel-body">
                            <form action="<?= BASE_URL; ?>parametersintegration/choose_parameter" method="post">
                                <div class="section">
                                    <h6 class="text-center">Faça o upload da planilha de parâmetros que serão aplicados na série.</h6>
                                </div>
                                <div class="section row">
                                    <?php if (isset($_COOKIE["error"])) : ?>
                                        <div class="text-center">
                                            <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                                                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h3 class="mtn fs20 text-white">Sucesso</h3>
                                                <p><?= $_COOKIE["error"]; ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <label class="field prepend-icon file mb20 mt10">

                                        <input type="file" name="library" class="gui-file" onchange="document.getElementById('uploader').value = this.value;" accept="application/pdf">

                                        <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                        <i class="fa fa-upload"></i>
                                        
                                    </label>

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