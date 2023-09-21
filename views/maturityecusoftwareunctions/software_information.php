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
            <li class="breadcrumb-current-item">Maturidade de ECU's, Softwares e Funções</li>
            <li class="breadcrumb-current-item">Informações do software</li>
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
                            <span class="panel-title pn">Informações do software</span><br>
                            <span class="fa fa-circle"></span>
                        </div>

                        <form method="post" action="<?= BASE_URL; ?>maturityecusoftwareunctions/software_information" id="form-order" enctype="multipart/form-data">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <p class="fs14">Informe os e-mails:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="responsible_name" class="field prepend-icon">
                                            <input type="text" name="responsible_name" id="responsible_name" class="gui-input" placeholder="Separe com ; (ponto e vírgula) os e-mails." required>
                                            <span class="field-icon">
                                                <i class="fa fa-file"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="project_id" value="<?= $_GET['project_id']; ?>">
                                <input type="hidden" name="maturityecusoftwareunctions_id" value="<?= $_GET['maturityecusoftwareunctions_id']; ?>">
                                <div class="section row">
                                    <p class="fs14">Escolha uma ECU:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="name_ecu" class="field select">
                                            <select name="name_ecu" id="name_ecu" class="gui-input" data-project-id="<?= $_GET['project_id']; ?>" required>
                                                <?php if ($list_ecu == 0) : ?>
                                                    <option selected>Não foram encontradas ECUs cadastradas nesse projeto.</option>
                                                <?php else : ?>
                                                    <option value="">Escolha uma opção:</option>
                                                    <?php foreach ($list_ecu as $value) : ?>

                                                        <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>

                                                    <?php endforeach; ?>

                                                <?php endif; ?>


                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <p class="fs14">Escolha uma das funções:</p>
                                    <span class="ml10" id="loading_parameters"></span>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="list_ecu_function" class="field select">
                                            <select name="list_ecu_function[]" id="list_ecu_function" class="gui-input" required multiple>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
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

<script src="<?= BASE_URL; ?>assets/js/list_ecu_function.js"></script>