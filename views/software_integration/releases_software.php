<!-- New Project -->

<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["Fail_new_project"])) : ?>
        <div class="text-center">
            <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Mensagem de Erro</h3>
                <p><?= $_COOKIE["Fail_new_project"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-active">
                <a href="index.html">
                    <span class="fa fa-circle-o"></span>
                </a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Projeto</li>
            <li class="breadcrumb-current-item">Novo Projeto</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">
        
    </div>
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw900 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Plano de releases dos softwares e função base/referência da ecu <strong> <u> <?= $info_ecu['name']; ?> </u></strong></span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>
                        <form action="<?= BASE_URL; ?>softwareintegration/releasesSoftware" method="post">
                            <div class="section row text-center">
                                <input type="hidden" name="software_integrations_id" value="<?= $_GET['software_integrations_id'] ?>">
                                <input type="hidden" name="ecu_id" value="<?= $_GET['ecu_id'] ?>">
                                <!-- TABELA e foreach list_ecu -->
                                <div class="panel" id="spy1">
                                    <div class="panel-body pn mt20">
                                        <div class="table-responsive">
                                            <table class="table footable">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">R<?= date("y"); ?>01</th>
                                                        <th class="text-center">R<?= date("y"); ?>02</th>
                                                        <th class="text-center">R<?= date("y"); ?>03</th>
                                                        <th class="text-center">R<?= date("y"); ?>04</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Data Liberação: </td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>


                                                    </tr>
                                                    <tr>
                                                        <td>Funções Liberadas : </td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="section text-center">
                                <button type="submit" class="btn fs14 btn-primary"><b>Cadastrar</b></button>
                            </div>

                        </form>


                        <!-- FORM 2 -->




                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<!-- js -->
<script src="<?= BASE_URL ?>assets/js/pages/validation/new_project.js"></script>