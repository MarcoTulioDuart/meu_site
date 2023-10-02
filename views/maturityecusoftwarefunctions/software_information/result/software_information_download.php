<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <h1>Informações do software</h1>
                            <span class="panel-title pn">Maturidade de ECU's, Softwares e Funções</span>
                        </div>


                        <div class="panel-body pn">
                            <div class="section row">
                                <h4 class="fs14">E-mails:</h4>
                                <div class="col-md-12 ph10 mb5">
                                    <p>
                                        <?= $info_maturityecusoftwarefunctions_software_informations['responsible_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="section row">
                                <h4 class="fs14">ECU:</h4>
                                <div class="col-md-12 ph10 mb5">
                                    <p>
                                        <?= $info_maturityecusoftwarefunctions_software_informations['selected_ecu']; ?>
                                    </p>

                                </div>
                            </div>
                            <div class="section row">
                                <h4 class="fs14">Funções:</h4>
                                <span class="ml10" id="loading_parameters"></span>
                                <div class="col-md-12 ph10 mb5">
                                    <ul>
                                        <?php foreach (explode(",", $info_maturityecusoftwarefunctions_software_informations['list_ecu_function']) as $value) : ?>

                                            <li><?= $value; ?></li>

                                        <?php endforeach; ?>
                                    </ul>
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
