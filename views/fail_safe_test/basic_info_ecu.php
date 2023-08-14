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
            <li class="breadcrumb-current-item">Fail Safe Test</li>
            <li class="breadcrumb-current-item">Informações básicas da Ecu</li>
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
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Escolha uma ECU</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <form method="post" action="<?= BASE_URL; ?>failsafetest/basic_info_ecu" id="form-order">
                            <div class="panel-body pn">
                                
                            </div>
                            <!-- /Panel Body -->
                        </form>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>