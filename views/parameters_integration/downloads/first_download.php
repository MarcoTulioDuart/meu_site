<div class="row mn pn">
    <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
        <div class="panel" id="shortcut">
            <div class="panel-heading text-center">
                <span class="panel-title fs22 mw500 text-center"><b>Classificação de prioridades de veículos para testes de parametrização</b></span>
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
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>