<div class="row mn pn">
    <div class="allcp-form tab-pane mauto" id="order" role="tabpanel">
        <div class="panel" id="shortcut">

            <div class="panel-heading text-center">
                <span class="panel-title pn">Seleção de Saídas por ECU</span><br>
            </div>

            <div class="panel-body pn">
                <div class="col-md-12 col-xs-12 mb20">
                    <div class="table-responsive">
                        <table class="table table-striped btn-gradient-grey">
                            <thead>
                                <tr class="alert">
                                    <th class="text-center p15">ECU</th>
                                    <th class="text-center p15">Código de falha</th>
                                    <th class="text-center p15">Status de código</th>
                                    <th class="text-center p15">Descrição de código</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $key => $value) : ?>
                                    <tr>
                                        <td class="text-center fs12 p15"><?= $value['fc_ecu']; ?></td>
                                        <td class="text-center fs12 p15"><?= $value['fc']; ?></td>
                                        <td class="text-center fs12 p15"><?= $value['fail_status']; ?></td>
                                        <td class="text-center fs12 p15"><?= $value['fc_description']; ?></td>
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