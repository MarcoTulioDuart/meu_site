<div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
    <div class="panel" id="shortcut">
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
                            <?php if (isset($list_commom_signals) && !empty($list_commom_signals)) : ?>
                                <?php foreach ($list_commom_signals as $key => $value) : ?>
                                    <p class="ph20 pb10">♦ <?= $value['signal_name']; ?> ➠ <span class="text-right"><?= $value['commom_functions']; ?></span></p>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p class="text-center">Não foram encontradas mensagens em comum</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>