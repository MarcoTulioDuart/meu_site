<div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
    <div class="panel" id="shortcut">
        <div class="panel-heading text-center">
            <h4>Relatório da Reunião</h4><span class="text-muted">Data da reunião: <?= $list['date_meeting']; ?></span>
        </div>
        <div class="panel-body">
            <div class="section row text-center">
                <h6 class="pn mn">Tema da reunião:</h6>
                <h5 class="text-primary mt10"><?= $list['title']; ?></h5>
            </div>
            <div class="section row mtn">
                <div class="tab-block">
                    <h6 class="ptn mtn pb20 text-center">Conclusão sobre a reunião:</h6>
                    <div class="tab-content ptn p30">
                        <?php if (!empty($list['text'])) : ?>
                            <?= $list['text']; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Panel -->
</div>