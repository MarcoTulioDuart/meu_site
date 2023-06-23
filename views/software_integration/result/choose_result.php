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
            <li class="breadcrumb-current-item">Integração entre Software</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="chute chute-center pbn">
        <!-- Lists -->
        <div class="row">
            <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
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
                                        O segundo resultado só será liberado depois que a reunião com a equipe for marcada.
                                    </h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-heading text-center">
                        <span class="panel-title">O que deseja Fazer?</span><br>
                    </div>
                    <div class="panel-body mt10">
                        <div class="section row text-center">
                            <div class="col-md-4 ph10 mb5">
                                <a href="http://localhost/protsa/functionintegration/first_result" class="btn fs14 btn-primary">Primeiro Resultado</a>
                            </div>

                            <div class="col-md-4 ph10 mb5">
                                <a href="http://localhost/protsa/functionintegration/second_result" class="btn fs14 btn-primary">Segundo Resultado</a>
                            </div>

                            <div class="col-md-4 ph10 mb5">
                                <a href="http://localhost/protsa/functionintegration/third_result" class="btn fs14 btn-primary">Casos de testes</a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /Panel -->
            </div>
        </div>

    </div>
</section>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>