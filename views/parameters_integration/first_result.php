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
            <li class="breadcrumb-current-item">Primeiro resultado</li>
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
                            <span class="panel-title fs22 mw400 text-center"><b>Classificação por prioridade dos testes de parametrização</b></span>
                        </div>
                        <div class="panel-body">
                            <?php if (!isset($list_classification_vehicles)) : ?>
                                <h6 class="text-center text-danger">Seu resultado não pode ser calculado, verifique se a etapa de processamento foi concluída com sucesso.</h6>
                            <?php else : ?>
                                <div class="section row mtn">
                                    <div class="tab-block">
                                        <div class="tab-content">
                                            <?php foreach ($list_classification_vehicles as $key => $value) : ?>
                                                <p class="ph20 pb10 fs20 text-center <?= ($key == 0) ? "text-primary" : ""; ?>"><?= $key + 1; ?>º <?= $value['name_vehicle']; ?></p>
                                                <p class="text-center mb20">Total: <?= $value['total_score']; ?> pts</p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="section row text-center">
                                    <a href="<?= BASE_URL; ?>parametersintegration/download_first_result" class="btn btn-primary btn-bordered">Download</a>
                                </div>
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