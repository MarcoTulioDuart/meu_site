<div class="row mn pn">
    <div class="allcp-form tab-pane mauto" id="order" role="tabpanel">
        <div class="panel" id="shortcut">

            <?php if (isset($_GET['safe_test_id']) && !empty($_GET['safe_test_id'])) : ?>
                <div class="panel-heading text-center">
                    <span class="fs24"><b>Resultados</b></span><br>
                </div>
                <div class="panel-body mt10">
                    <div class="section row text-center">
                        <h5>Resultados de Saídas por ECU</h5>
                    </div>
                    <?php foreach ($result_ecu as $key => $value) : ?>
                        <div class="section row text-center">
                            <h6 class="text-primary fs16">ECU: <span class="text-system fs14"><?= $value['fc_ecu']; ?></span></h6>
                        </div>
                        <div class="section row text-center">
                            <h6 class="text-primary">Código de falha: <span class="text-system fs14"><?= $value['fc']; ?></span></h6>
                        </div>
                        <div class="section row text-center">
                            <h6 class="text-primary">Status de código: <span class="text-system fs14"><?= $value['fail_status']; ?></span></h6>
                        </div>
                        <div class="section row text-center">
                            <h6 class="text-primary">Descrição de código: <span class="text-system fs14"><?= $value['fc_description']; ?></span></h6>
                        </div>
                        <hr>
                    <?php endforeach; ?>

                    <div class="section row text-center">
                        <h5>Resultados de Saídas por Veículos</h5>
                    </div>

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
                    <hr>

                    <div class="section row text-center">
                        <h5>Gráfico de Status de falhas</h5>
                    </div>
                    <div class="section row">
                        <img src="<?= BASE_URL; ?><?= $graphic_image['graphic_upload']; ?>" alt="Gráfico">
                    </div>

                </div>

            <?php endif; ?>

        </div>
        <!-- /Panel -->
    </div>
</div>