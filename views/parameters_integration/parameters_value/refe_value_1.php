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
                            <?php if (!isset($list_parameters_name)) : ?>
                                <div class="section">
                                    <h6 class="text-center">Seus valores já foram definidos. Se deseja testar novo valores, inicie um novo teste.</h6>
                                </div>
                            <?php else : ?>
                                <form action="<?= BASE_URL; ?>parametersintegration/choose_parameter" method="post">
                                    <div class="section">
                                        <h6 class="text-center">Quais são os valores de parâmetros de projetos anteriores que já aplicados em série sem gerar erros na produção?</h6>
                                    </div>
                                    <div class="section text-center">
                                        <span class="text-muted">"Escolha um dos tipos de parâmetros que foram registrados no projeto, para prosseguir."</span>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-10 ph10 mb5">
                                            <label for="name_parameter" class="field select">
                                                <select name="name_parameter" id="name_parameter" class="gui-input">
                                                    <?php if ($list_parameters_name == 0) : ?>
                                                        <option selected>Não foram encontrados parametros registrados neste projeto</option>
                                                    <?php else : ?>

                                                        <?php foreach ($list_parameters_name as $value) : ?>

                                                            <option value="<?= $value['p_type']; ?>"><?= $value['p_type']; ?></option>

                                                        <?php endforeach; ?>

                                                    <?php endif; ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-md-2 ph10 mb5">
                                            <label class="file">
                                                <button type="submit" class="button btn-primary">Escolher</button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
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