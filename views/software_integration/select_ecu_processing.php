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
                                <span class="panel-title pn">Selecionar ECUs</span><br>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                                <span class="fa fa-circle-o"></span>
                            </div>

                            <form action="<?= BASE_URL; ?>softwareintegration/selectEcu" id="form-order">
                                <div class="section row">
                                    <div class="col-md-10 ph10 mb5">
                                        <label for="ecu_id" class="field select">

                                            <?php if ($list_ecu_name == 0) : ?>

                                            <?php else : ?>
                                                <input type="hidden" name="software_integrations_id" value="<?= $_GET['software_integrations_id']; ?>">
                                                <select name="ecu_id" id="ecu_id" class="gui-input">
                                                    
                                                    <?php foreach ($list_ecu_name as $value) : ?>

                                                        <option value="<?= $value['ecu_id']; ?>">
                                                            <?= $value['t_name']; ?>
                                                        </option>

                                                    <?php endforeach; ?>
                                                </select>
                                            <?php endif; ?>

                                        </label>
                                    </div>
                                    <div class="col-md-2 ph10 mb5">
                                        <label class="file">
                                            <button type="submit" class="button btn-primary">Escolher</button>
                                        </label>
                                    </div>
                                </div>
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