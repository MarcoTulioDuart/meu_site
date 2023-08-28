<!-- New Project -->
<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-active">
                <a href="<?= BASE_URL; ?>home/home_page">
                    <span class="fa fa-circle-o"></span>
                </a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Maturidade de ECU's, Softwares e Funções</li>
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
                                            A data digitada deve ser maior do que a data de disponibilidade dos equipamentos, caso contrário o item conflitante deve aparecer no template para o WS.
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Informações do software</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>
                        <form action="<?= BASE_URL; ?>maturityecusoftwareunctions/select_automaker" method="post">
                            <input type="hidden" name="maturityecusoftwareunctions_id" value="<?= $_GET['maturityecusoftwareunctions_id'] ?>">
                            
                            <div class="row text-center">
                                <div class="col-md-12 ph10 mb5">
                                    <label for="physical_resources">
                                        Informe os e-mails das montadoras:
                                        <input type="text" name="physical_resources" id="physical_resources" class="gui-input" placeholder="Ex: Transdutores, equipamentos de medição, equipamentos de parametrização, veículo protótipo, etc.">

                                    </label>
                                </div>
                            </div>
                            <div class="section text-center">
                                <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
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