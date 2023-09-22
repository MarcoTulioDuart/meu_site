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
                        <div class="right">
                            <div class="btn-group">
                                <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-lightbulb-o fs24"></i>
                                </button>
                                <ul class="dropdown-menu bg-primary p15 w450">
                                    <li>
                                        <h5><b>Dicas de uso:</b></h5>
                                    </li>
                                    <li>
                                        <h6>● A planilha nescessita ter a extensão 'xlsx'. Tome cuidado pois existem extensões muito parecidas.</h6>
                                    </li>
                                    <li>
                                        <h6>● A planilha enviada pode ter diversas abas, porém a aba com os dados FC precisa estar ativa.</h6>
                                    </li>
                                    <li>
                                        <h6>● A programação do site comporta arquivos de até 18Mb, se for estritamente necessário um arquivo maior que esse, entre em contato com o suporte técnico para uma manutenção.</h6>
                                    </li>
                                    <li>
                                        <h6>● Este programa não suporta fórmulas de excell, certifique-se que os valores das células estejam informados diretamente sem o uso de fórmulas, se for estritamente necessária uma fórmula para obter o valor da célula, entre em contato com o suporte técnico para avaliar a situação.</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Informações básicas da Ecu</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                        </div>

                        <div class="panel-body">
                            <form method="post" action="<?= BASE_URL; ?>failsafetest/basic_info_upload?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" id="form-order" enctype="multipart/form-data">
                                <?php if (isset($_COOKIE["error"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Ocorreu um erro</h3>
                                            <p><?= $_COOKIE["error"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($_COOKIE["failed_data_excell"])) : ?>
                                    <div class="text-center">
                                        <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                                            <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h3 class="mtn fs20 text-white">Ocorreu um erro</h3>
                                            <p><?= $_COOKIE["failed_data_excell"]; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="section row">
                                    <p class="fs14 m20">Carregue o arquivo de falhas referente a ECU:</p>
                                    <p class="text-muted ml20">O arquivo deve ter a extenção 'xlsx'</p>
                                    <div class="col-md-12 ph10 mb15">
                                        <label class="field prepend-icon file">
                                            <input type="file" name="upload_ecu_reference" id="upload_ecu_reference" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">
                                            <input type="text" name="uploader" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center m20">
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