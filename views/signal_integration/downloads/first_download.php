<div class="allcp-form tab-pane mw1200 mauto pn" id="order">
    <div class="panel pn" id="shortcut">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Resultado de comparação
            </span>
        </div>
        <!-- /Panel Heading -->
        <div class="panel-body pn mn">
            <div class="section row">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center mn pn">
                    <h6>Função Comum: <?= $commom_function['e_function']; ?></h6>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center mn pn">
                    <h6>Função Principal: <?= $main_function['e_function']; ?></h6>
                </div>
            </div>

            <div class="panel pn">
                <div class="panel-body pn">

                    <!-- Função comum -->
                    <div class="col-md-5 col-xs-5 mn p5">
                        <div class="table table-responsive">
                            <table class="table table-striped btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert text-center">
                                        <th class="text-center p10">Nome do sinal</th>
                                        <th class="text-center p10">Descrição</th>
                                        <th class="text-center p10">Disponibilidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_commom as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center fs12 p15"><?= $value['c_signal_name']; ?></td>
                                            <td class="text-center p15"><?= $value['c_signal_function']; ?></td>
                                            <td class="text-center p15">
                                                <?php if ($value['lsc_available_type'] == 1) {
                                                    echo "Sim";
                                                } else {
                                                    echo "Não";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Comparação -->
                    <div class="col-md-1 col-xs-1 mn p5">
                        <div class="table table-responsive">
                            <table class="table btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert">
                                        <th class="text-center p10">Status de Match</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_main as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center p10 ">
                                                <?php if ($signals_main[$key]['lsc_available_type'] == $signals_commom[$key]['lsc_available_type']) {
                                                    echo "=";
                                                } else {
                                                    echo "≠";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Função principal -->

                    <div class="col-md-5 col-xs-5 mn p5">
                        <div class="table table-responsive">
                            <table class="table table-striped btn-gradient-grey mbn">
                                <thead>
                                    <tr class="alert">
                                        <th class="text-center p10">Nome do sinal</th>
                                        <th class="text-center p10">Descrição</th>
                                        <th class="text-center p10">Disponibilidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($signals_main as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center fs12 p15"><?= $value['c_signal_name']; ?></td>
                                            <td class="text-center p15"><?= $value['c_signal_function']; ?></td>
                                            <td class="text-center p15">
                                                <?php if ($value['lsc_available_type'] == 1) {
                                                    echo "Sim";
                                                } else {
                                                    echo "Não";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>