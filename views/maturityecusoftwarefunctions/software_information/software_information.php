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
            <li class="breadcrumb-current-item"><a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>">Maturidade de ECU's, Softwares e Funções - ETAPAS</a></li>
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

                        <form method="post" action="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information" id="form-order" enctype="multipart/form-data">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <p class="fs14">Informe os e-mails:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="responsible_name" class="field prepend-icon">
                                            <input type="text" name="responsible_name" id="responsible_name" class="gui-input" placeholder="Separe com ; (ponto e vírgula) os e-mails." required value="<?= (isset($info_maturityecusoftwarefunctions_software_informations['responsible_name'])) ? $info_maturityecusoftwarefunctions_software_informations['responsible_name'] : ""; ?>">
                                            <span class="field-icon">
                                                <i class="fa fa-file"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="project_id" value="<?= $info_maturityecusoftwarefunctions['project_id']; ?>">
                                <input type="hidden" name="maturityecusoftwarefunctions_id" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>">
                                <div class="section row">
                                    <p class="fs14">Escolha uma ECU:</p>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="info_ecu" class="field select">
                                            <select name="info_ecu" id="info_ecu" class="gui-input" data-project-id="<?= $info_maturityecusoftwarefunctions['project_id']; ?>" required>
                                                <?php if ($list_ecu == 0) : ?>
                                                    <option selected>Não foram encontradas ECUs cadastradas nesse projeto.</option>
                                                <?php else : ?>
                                                    <option value="">Escolha uma opção:</option>
                                                    <?php foreach ($list_ecu as $value) : ?>

                                                        <option value="<?= $value['id']; ?>" <?= (isset($info_maturityecusoftwarefunctions_software_informations['selected_ecu']) && $info_maturityecusoftwarefunctions_software_informations['selected_ecu'] == $value['id']) ? "selected" : ""; ?>>
                                                            <?= (isset($info_maturityecusoftwarefunctions_software_informations['selected_ecu']) && $info_maturityecusoftwarefunctions_software_informations['selected_ecu'] == $value['id']) ? $value['name'] . " (ativa)" : $value['name']; ?>
                                                        </option>

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
                                                <?php foreach (explode(",", $info_maturityecusoftwarefunctions_software_informations['list_ecu_function']) as $value) : ?>

                                                    <option value="<?= $value; ?>"><?= $value; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <?php
                                    if ($info_maturityecusoftwarefunctions['step_1'] == 1) :
                                    ?>                                        
                                        <a href="<?= BASE_URL; ?>maturityecusoftwarefunctions/softwareInformationDownload?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>" class="btn btn-primary" title="Clique para abrir o PDF">ETAPA CONCLUÍDA</a> 
                                        <a target="_blank" href="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>"  class="btn btn-primary">Fornecedor</a>
                                    <?php elseif(isset($info_maturityecusoftwarefunctions_software_informations['selected_ecu'])): ?>
                                        <input type="hidden" name="type_form" value="edit">
                                        <button type="submit" class="btn btn-primary">Atualizar</button>                                        
                                        <a target="_blank" href="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=<?= $_GET['maturityecusoftwarefunctions_id']; ?>"  class="btn btn-primary">Fornecedor</a>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
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

<script src="<?= BASE_URL; ?>assets/js/list_ecu_function.js"></script>