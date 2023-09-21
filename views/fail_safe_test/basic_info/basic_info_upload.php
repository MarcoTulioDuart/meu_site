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