<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <h1 class="panel-title pn">Informações do Software - Fornecedor</h1><br>
                            <span class="fa fa-circle"></span>
                        </div>


                        <div class="panel-body pn">
                            <input type="hidden" name="maturityecusoftwarefunctions_id" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>">
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <h4 class="fs14">Função:</h4>
                                    <ul>
                                        <?php foreach ($info_maturityecusoftwarefunctions_software_informations['list_ecu_function'] as $value) : ?>
                                            <li><?= $value; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <h4 class="mb15">Descrição da função ou software:</h4>
                                    <pre style="color:black;">
                                           <?= $info_maturityecusoftwarefunctions_software_informations_providers['description_function_software']; ?>      
                                        </pre>
                                </div>
                            </div>

                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <h4 class="mb15">Motivação da aplicação da função ou software:</h4>
                                    <pre style="color:black;">
                                            <?= $info_maturityecusoftwarefunctions_software_informations_providers['motivation_applying_function_software']; ?>
                                        </pre>




                                </div>
                            </div>

                            <div class="section row">
                                <div class="col-md-12 ">
                                    <h4 class="mb15">Parâmetros:</h4>
                                    <div class="table-responsive">
                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th class="text-center">PID</th>
                                                    <th class="text-center">Fragmento</th>
                                                    <th class="text-center">Valores</th>
                                                </tr>
                                            </thead>
                                            <tbody id="parent_parameters">

                                                <?php foreach ($info_maturityecusoftwarefunctions_software_informations_providers['parameters'] as $key => $item) : ?>
                                                    <tr class="row-parameters text-center">
                                                        <td><?= $item['pid'] ?></td>
                                                        <td><?= $item['fragment']; ?></td>
                                                        <td><?= $item['values_p']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="section row">
                                <div class="col-md-12 ">
                                    <h4 class="mb15">Planos:</h4>
                                    <div class="table-responsive">
                                        <table class="table">

                                            <thead>
                                                <tr>
                                                    <th class="text-center">R<?= date("y"); ?>01</th>
                                                    <th class="text-center">R<?= date("y"); ?>02</th>
                                                    <th class="text-center">R<?= date("y"); ?>03</th>
                                                    <th class="text-center">R<?= date("y"); ?>04</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td><?= date('Y-m-d', strtotime($info_maturityecusoftwarefunctions_software_informations_providers['releases'][0]['releases_date'])); ?></td>
                                                    <td><?= date('Y-m-d', strtotime($info_maturityecusoftwarefunctions_software_informations_providers['releases'][1]['releases_date'])); ?></td>
                                                    <td><?= date('Y-m-d', strtotime($info_maturityecusoftwarefunctions_software_informations_providers['releases'][2]['releases_date'])); ?></td>
                                                    <td><?= date('Y-m-d', strtotime($info_maturityecusoftwarefunctions_software_informations_providers['releases'][3]['releases_date'])); ?></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><?= $info_maturityecusoftwarefunctions_software_informations_providers['releases'][0]['releases_desc']; ?></td>
                                                    <td><?= $info_maturityecusoftwarefunctions_software_informations_providers['releases'][1]['releases_desc']; ?></td>
                                                    <td><?= $info_maturityecusoftwarefunctions_software_informations_providers['releases'][2]['releases_desc']; ?></td>
                                                    <td><?= $info_maturityecusoftwarefunctions_software_informations_providers['releases'][3]['releases_desc']; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                        </div>


                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

