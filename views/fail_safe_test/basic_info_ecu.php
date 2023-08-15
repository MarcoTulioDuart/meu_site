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
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Informações básicas da Ecu</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <form method="post" action="<?= BASE_URL; ?>failsafetest/basic_info_ecu" id="form-order" enctype="multipart/form-data">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <p class="fs14">Escolha uma ECU:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="list_ecu_id" class="field select">
                                            <select name="list_ecu_id" id="name_ecu" class="gui-input" required>
                                                <?php if ($list_ecu == 0) : ?>
                                                    <option selected>Não foram encontradas ECUs cadastradas nesse projeto.</option>
                                                <?php else : ?>

                                                    <?php foreach ($list_ecu as $value) : ?>

                                                        <option value="<?= $value['list_ecu_id']; ?>" <?= (isset($selected) && $selected == $value['t_name']) ? "selected" : ""; ?>><?= $value['t_name']; ?></option>

                                                    <?php endforeach; ?>

                                                <?php endif; ?>


                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <p class="fs14">Digite as informações do responsável pela ECU escolhida:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="responsible_name" class="field prepend-icon">
                                            <input type="text" name="responsible_name" id="responsible_name" class="gui-input" placeholder="Digite o nome do resposável" required>
                                            <span class="field-icon">
                                                <i class="fa fa-file"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="responsible_email" class="field prepend-icon">
                                            <input type="text" name="responsible_email" id="responsible_email" class="gui-input" placeholder="Digite o email do resposável" required>
                                            <span class="field-icon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <p class="fs14">Carregue o arquivo de falhas referente a ECU:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label class="field prepend-icon file">
                                            <input type="file" name="upload_ecu_reference" id="upload_ecu_reference" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">
                                            <input type="text" name="uploader" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="button btn-primary">Enviar</button>
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