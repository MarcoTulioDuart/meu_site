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
                <a href="<?= BASE_URL; ?>functionintegration/results">Resultados de integração entre Funções</a>
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
                        <div class="right">
                            <div class="btn-group">
                                <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-lightbulb-o fs24"></i>
                                </button>
                                <ul class="dropdown-menu bg-primary p15 w200">
                                    <li>
                                        <h5><b>Dica:</b></h5>
                                    </li>
                                    <li>
                                        <h6>
                                            O segundo resultado só será liberado depois que a reunião com a equipe for marcada.
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php if (count($classifica) > 1) : ?>
                            <div class="panel-heading text-center">
                                <h4>Ocorreu um imprevisto!</h4><br>
                            </div>
                            <div class="panel-body">
                                <form action="<?= BASE_URL; ?>functionintegration/first_result" method="post">
                                    <div class="section row">
                                        <p class="text-center pbn">Foram detectadas multiplas Funções Clientes para este projeto. Com isso precisamos de sua intervenção.</p>
                                    </div>
                                    <div class="section row mtn">
                                        <h6 class="text-center text-danger ptn pb20">Escolha a Função Cliente correta:</h6>
                                        <select name="function_id" id="function_id" class="gui-input">

                                            <?php foreach ($classifica as $value) : ?>

                                                <option value="<?= $value['function_id']; ?>"><?= $value['function_ecu']; ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="section text-center pbn mbn">
                                        <button type="submit" class="btn fs14 btn-primary">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        <?php else : ?>
                            <div class="panel-heading text-center">
                                <h4>As funções foram Classificadas:</h4><br>
                            </div>
                            <div class="panel-body">
                                <?php if (!isset($list_classification)) : ?>
                                    <h6 class="text-center text-danger">Seu resultado não pode ser calculado, verifique se a etapa de processamento foi concluída com sucesso.</h6>
                                <?php else : ?>
                                    <?php foreach ($list_classification as $key => $value) : ?>
                                        <div class="section row text-center">
                                            <div class="col-md-12">
                                                <h5 class="<?= ($value['fc_classification'] == "Função Cliente") ? "text-primary" : "text-system"; ?>"><?= $value['fc_classification']; ?>: <?= $value['e_function']; ?></h5>
                                                <p class="text-muted">Pontuação: <?= number_format($value['fc_score'], 1, ",", "."); ?></p>
                                            </div>
                                        </div>
                                        <div class="section row mtn">
                                            <div class="tab-block">
                                                <h6 class="text-center mtn mb20">Sinais relacionados com a Função</h6>
                                                <div class="tab-content mh-200">
                                                    <p class="ph20"><?= $value['signals']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section row">
                                            <div class="tab-block">
                                                <h6 class="text-center mtn mb20">Descrição da função</h6>
                                                <div class="tab-content">
                                                    <ul>
                                                        <li class="p5 pb10">
                                                            <?php if ($value['question_1'] == $list_points['point_question_1']) {
                                                                echo "Função série";
                                                            } else {
                                                                echo "Função opcional";
                                                            }
                                                            ?>
                                                        </li>
                                                        <li class="p5 pb10">
                                                            <?php if ($value['question_2'] == $list_points['point_question_2']) {
                                                                echo "Há indicação no painel de instrumentos";
                                                            } else {
                                                                echo "Não há indicação no painel de instrumentos";
                                                            }
                                                            ?>
                                                        </li>
                                                        <li class="p5 pb10">
                                                            <?php if ($value['question_3'] == $list_points['point_question_3']) {
                                                                echo "Há impacto em homologação";
                                                            } else {
                                                                echo "Não há impacto em homologação";
                                                            }
                                                            ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; ?>
                                    <div class="section row mtn">
                                        <div class="tab-block">
                                            <h6 class="text-center mtn mb20">Mensagens em comum:</h6>
                                            <p class="text-center text-muted">Nome do sinal ➠ ECU: Função</p>
                                            <div class="tab-content mh-200">
                                                <?php foreach ($list_commom_signals as $key => $value) : ?>
                                                    <p class="ph20 pb10">♦ <?= $value['signal_name']; ?> ➠ <span class="text-right"><?= $value['commom_functions']; ?></span></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-8">
                                            <button class="btn btn-primary btn-bordered">Download</button>
                                        </div>
                                        <div class="col-md-2">
                                            <div id="animation-switcher" class="ph20">
                                                <div class="col-xs-12 col-sm-4 text-right">
                                                    <a class="holder-active" href="#modal-form">
                                                        <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                            Marcar reunião
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
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
                    <div class="col-md-12 ph10 mb5">
                        <label for="title" class="field prepend-icon">
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Digite o tema da reunião">
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
                            <h6 class="text-center mtn pt10 pb20">Escolha uma data e horário para a reunião</h6>
                        </div>

                        <div class="col-md-8">
                            <div id="datetimepicker3">
                                <input type="text" name="date_meeting" class="form-control" style="max-width: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                            <div class="panel-heading text-center">
                                <span class="">Selecione os Participantes da Reunião:</span>
                            </div>
                            <div class="panel-body panel-scroller scroller-sm pn mt20 mh-100">
                                <div class="option-group field pl15">
                                    <?php if (isset($list_participants)) : ?>
                                        <?php foreach ($list_participants as $value) : ?>
                                            <label class="block mt20 option option-info">
                                                <input type="checkbox" name="participant_id[]" value="<?= $value['id']; ?>">
                                                <span class="checkbox"></span>
                                                <span><?= $value['responsibility']; ?>: <?= $value['full_name']; ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
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