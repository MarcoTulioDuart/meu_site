<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["success_library_can"])) : ?>
        <div class="text-center">
            <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Sucesso</h3>
                <p><?= $_COOKIE["success_library_can"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Sistema</li>
            <li class="breadcrumb-current-item">Adicionar base de dados CAN</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Adicionar biblioteca CAN</span>
                        </div>
                        <form method="post" action="<?= BASE_URL; ?>system/add_library_can" id="add_can" enctype="multipart/form-data">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="rede_can" class="field select">
                                            <select name="rede_can" id="rede_can">
                                                <option disabled selected>Tipo de rede CAN</option>
                                                <?php foreach ($type_can as $value) : ?>
                                                    <option value="<?= $value['name']?>"><?= $value['name']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label class="field prepend-icon file">
                                            <input type="file" name="library" id="library" class="gui-file" onchange="document.getElementById('uploader').value = this.value;">
                                            <input type="text" name="uploader" id="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
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
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VALIDATION -->
<script src="<?= BASE_URL ?>assets/js/pages/validation/system.js"></script>