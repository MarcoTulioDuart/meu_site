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
                                                    <th>Planilha</th>
                                                    <th>Tipo</th>
                                                    <th>Pos</th>
                                                    <th>Sachnummer</th>
                                                    <th>Benennung</th>
                                                    <th>Codebedingung</th>
                                                    <th>Kem_ab</th>
                                                    <th>Werke</th>
                                                    <th>pg_kz</th>
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
                                                            <td><?= $value['id']; ?></td>
                                                            <td><?= $value['type']; ?></td>
                                                            <td><?= $value['pos']; ?></td>
                                                            <td><?= $value['sachnummer']; ?></td>
                                                            <td><?= $value['benennung']; ?></td>
                                                            <td><?= $value['codebedingung']; ?></td>
                                                            <td><?= $value['kem_ab']; ?></td>
                                                            <td><?= $value['werke']; ?></td>
                                                            <td><?= $value['pg_kz']; ?></td>
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
            <?php if (isset($list_parameters) && !empty($list_parameters)) : ?>
                <div class="section row mtn text-center">
                    <div class="col-md-12 col-xs-12 mt20 ph20">
                        <a class="btn btn-primary btn-bordered" href="<?= BASE_URL; ?>parametersintegration/second_download" target="_blank">Download</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /Panel -->
</div>