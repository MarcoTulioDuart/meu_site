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
            <li class="breadcrumb-current-item">Resultado</li>
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
                        <?php if (!isset($_GET['form'])) : ?>
                            <div class="panel-heading text-center">
                                <span class="panel-title pn">Escolha ou crie uma Maturidade de ECU's, Softwares e Funções</span><br>
                                <span class="fa fa-circle"></span>
                            </div>

                            <form action="<?= BASE_URL; ?>maturityecusoftwarefunctions/chooseMaturityecusoftwarefunctions" id="form-order" method="POST">
                                <div class="panel-body pn">
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="maturityecusoftwarefunctions_id" class="field select">
                                                <input type="hidden" name="project_id" value="<?= $_GET['project_id']; ?>">
                                                <?php if ($list_maturityecusoftwarefunctions == 0) : ?>
                                                    <select name="maturityecusoftwarefunctions_id" id="maturityecusoftwarefunctions_id" class="gui-input" required>
                                                            <option value="not-generated">Clique em próximo para realizar o cadastro.</option>                     
                                                    </select>
                                                <?php else : ?>
                                                    <select name="maturityecusoftwarefunctions_id" id="maturityecusoftwarefunctions_id" class="gui-input" required>
                                                        <option value="not-generated">Clique em próximo para realizar o cadastro ou selecione uma já existente.</option>  
                                                        <?php foreach ($list_maturityecusoftwarefunctions as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['id']; ?> - Data de criação: <?= date('d/m/Y H:i:s', strtotime($value['creation_date'])); ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                       
                                    </div>
                                </div>
                                <!-- /Panel Body -->
                            </form>
                        <?php endif; ?>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>