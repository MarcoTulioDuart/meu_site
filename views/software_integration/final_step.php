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
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        
                        <!-- FORM 2: Escolher ECUs -->

                        
                        <!-- FORM 3: Escolher funções -->

                        
                        <!-- FORM 4: Upload de especicações de funções-->

                        
                        <!-- FORM 5: Selecionar CANs e signal names -->

                        
                        <!-- FORM 5: Confirmação de se existem mais cans para serem registradas -->

                                                    <div class="right">
                                <div class="btn-group">
                                    <button type="button" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-lightbulb-o fs24"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-primary p15 w200">
                                        <li>
                                            <h5><b>Dica:</b></h5>
                                        </li>
                                        <li>
                                            <h6>
                                                Caso já tenha selecionado todos os CANs necessários para o modulo, clique em 'sim', se não, clique em 'não' para voltar e escolher outro CAN.
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading text-center pb25">
                                <span class="panel-title pn">Todas as funções da ECU ABS foram selecionadas?</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>
                            <div class="panel-body pn">
                                <div class="section row text-center">
                                    <a href="<?= BASE_URL; ?>softwareintegration/chooseProjectResults" class="btn fs14 btn-primary">Sim</a>
                                    <a href="<?= BASE_URL; ?>softwareintegration" class="btn fs14 btn-primary">Não</a>
                                </div>
                            </div>
                        
                        <!-- FORM 7: Tabela de funções registradas no modulo com questionário -->

                        
                        <!-- FORM 8: Confirmação de se é necessário mais um ecu -->

                        
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