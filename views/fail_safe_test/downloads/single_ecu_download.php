<div class="row mn pn">
    <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
        <div class="panel" id="shortcut">

            <div class="panel-heading text-center">
                <span class="panel-title pn">Seleção de Saídas por ECU</span><br>
            </div>

            <div class="panel-body pn">
                <div class="section row">
                    <div class="col-md-4 text-center">
                        <h6>ECU:</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h6>Código de falha:</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h6>Status de código:</h6>
                    </div>
                </div>
                <div class="section row">
                    <div class="col-md-4 text-center">
                        <p><?= $result['ecu']; ?></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p><?= $result['fc']; ?></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p><?= $result['fail_status']; ?></p>
                    </div>
                </div>
                <div class="section row">
                    <div class="col-md-12">
                        <h6>Descrição de código:</h6>
                    </div>
                </div>
                <div class="section row">
                    <div class="col-md-12">
                        <p><?= $result['fc_description']; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>