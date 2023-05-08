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
                                <div class="section row">
                                <h6 class="text-center mtn mb20">Mensagens em comum:</h6>
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