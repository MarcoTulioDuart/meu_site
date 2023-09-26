<div class="allcp-form tab-pane mw1200 mauto" id="order" role="tabpanel">
    <div class="panel" id="shortcut">
        <div class="panel-heading text-center">
            <h4>Resultado com parâmetros <?= $title_format; ?> entre as tabelas</h4><br>
        </div>
        <div class="panel-body">
            <div class="section row">
                <div class="col-md-12 ph10 mb5">
                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                            <div class="option-group field">
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table footable" data-filter="#fooFilter">
                                            <thead>
                                                <tr>
                                                    <th class="p15">Tipo</th>
                                                    <th class="p15">Pos</th>
                                                    <th class="p15">Sachnummer</th>
                                                    <th class="p15">Benennung</th>
                                                    <th class="p15">Codebedingung</th>
                                                    <th class="p15">Kem_ab</th>
                                                    <th class="p15">Werke</th>
                                                    <th class="p15">pg_kz</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!isset($list_parameters) || empty($list_parameters)) : ?>
                                                    <tr>
                                                        <td colspan="10" class="text-center">Não foi possível calcular o resultado, certifique-se que a etapa de definição de valores foi feita corretamente.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($list_parameters as $value) : ?>
                                                        <tr>
                                                            <td class="p15"><?= $value['type']; ?></td>
                                                            <td class="p15"><?= $value['pos']; ?></td>
                                                            <td class="p15"><?= $value['sachnummer']; ?></td>
                                                            <td class="p15"><?= $value['benennung']; ?></td>
                                                            <td class="p15"><?= $value['codebedingung']; ?></td>
                                                            <td class="p15"><?= $value['kem_ab']; ?></td>
                                                            <td class="p15"><?= $value['werke']; ?></td>
                                                            <td class="p15"><?= $value['pg_kz']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Panel -->
</div>