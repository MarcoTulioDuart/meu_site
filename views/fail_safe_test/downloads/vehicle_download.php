<div class="row mn pn">
    <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
        <div class="panel" id="shortcut">

            <div class="panel-heading text-center">
                <span class="panel-title pn">Resultado de Saídas por Veículo</span><br>
            </div>

            <div class="panel-body pn">
                <?php foreach ($vehicles_result as $value) : ?>
                    <div class="section row text-center mb5">
                        <h5 class="text-primary">Veículo: <?= $value['vehicle']; ?></h5>
                        <p class="text-muted">Ecu: Código de falha -> Responsável</p>
                    </div>
                    <div class="section row text-center">
                        <div class="col-md-12">
                            <h6><?= $value['ecus']; ?></h6>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>