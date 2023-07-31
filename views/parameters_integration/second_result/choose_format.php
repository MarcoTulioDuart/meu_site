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
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>parametersintegration/results">Resultados de Integridade de Parâmetro</a>
            </li>
            <li class="breadcrumb-current-item">Segundo resultado</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4>Qual formato de tabela você deseja?</h4><br>
                        </div>
                        <div class="panel-body">
                            <div class="section row text-center">
                                <div class="col-md-6 ph10">
                                    <a href="<?= BASE_URL; ?>parametersintegration/formatted_table?format=like" class="btn fs14 btn-primary">Segundo Teste</a>
                                </div>
                                <div class="col-md-6 ph10">
                                    <a href="<?= BASE_URL; ?>parametersintegration/formatted_table?format=unlike" class="btn fs14 btn-primary">Segundo Teste</a>
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