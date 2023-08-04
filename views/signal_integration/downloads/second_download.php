<div class="allcp-form tab-pane mw1200 mauto" id="order" role="tabpanel">
    <div class="panel" id="shortcut">
        <div class="panel-heading text-center">
            <h4>Segundo Resultado</h4><br>
        </div>
        <div class="panel-body">
            <?php if (!isset($signals_main) || !isset($signals_commom)) : ?>
                <h6 class="text-center text-danger">Seu resultado não pode ser calculado, verifique se a etapa de processamento foi concluída com sucesso.</h6>
            <?php else : ?>

                <!-- Função principal -->
                <div class="section row text-center">
                    <div class="col-md-12">
                        <h5 class="text-primary"><?= $main_function['e_name']; ?>: <?= $main_function['e_function']; ?></h5>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mb20">
                    <div class="table-responsive">
                        <table class="table table-striped btn-gradient-grey">
                            <thead>
                                <tr class="alert">
                                    <th class="text-center p15">Nome do sinal</th>
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Comentário</th>
                                    <th class="text-center">Recomendação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($signals_main as $key => $value) : ?>
                                    <tr>
                                        <td class="text-center fs12 p15"><?= $value['c_name']; ?></td>
                                        <td class="text-center"><?= $value['c_function']; ?></td>
                                        <td class="text-center">
                                            <?= ($value['ls_status'] == "null" || empty($value['ls_status'])) ? "Sem status" : $value['ls_status']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= (empty($value['ls_comment']) ? "Sem comentário" : $value['ls_comment']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['ls_status'] == "valid") {
                                                echo "Prossiga com os testes";
                                            } else if ($value['ls_status'] == "null" || empty($value['ls_status'])) {
                                                echo "O status não foi classificado, retorne ao primeira resultado e selecione o status do sinal";
                                            } else {
                                                echo "Contatar o especialista responsável pelo sinal CAN";
                                            } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Função Comum -->
                <div class="section row text-center">
                    <div class="col-md-12">
                        <h5 class="text-primary"> <?= $commom_function['e_name']; ?> : <?= $commom_function['e_function']; ?></h5>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mb20">
                    <div class="table-responsive">
                        <table class="table table-striped btn-gradient-grey mbn">
                            <thead>
                                <tr class="alert">
                                    <th class="text-center p15">Nome do sinal</th>
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Comentário</th>
                                    <th class="text-center">Recomendação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($signals_commom as $key => $value) : ?>
                                    <tr>
                                        <td class="text-center fs12 p15"><?= $value['c_name']; ?></td>
                                        <td class="text-center"><?= $value['c_function']; ?></td>
                                        <td class="text-center">
                                            <?= ($value['ls_status'] == "null" || empty($value['ls_status'])) ? "Sem status" : $value['ls_status']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= (empty($value['ls_comment']) ? "Sem comentário" : $value['ls_comment']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value['ls_status'] == "valid") {
                                                echo "Prossiga com os testes";
                                            } else if ($value['ls_status'] == "null" || empty($value['ls_status'])) {
                                                echo "O status não foi classificado, retorne ao primeira resultado e selecione o status do sinal";
                                            } else {
                                                echo "Contatar o especialista responsável pelo sinal CAN";
                                            } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
    <!-- /Panel -->
</div>