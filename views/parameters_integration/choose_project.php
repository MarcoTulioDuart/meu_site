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
            <li class="breadcrumb-current-item">Integridade de Parâmetros</li>
            <li class="breadcrumb-current-item">Escolha um Projeto</li>
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
                            <span class="panel-title pn">Escolha um projeto para começar</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>

                        <form method="get" action="<?= BASE_URL; ?>parametersintegration/choose_project" id="form-order">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="project_id" class="field select">

                                            <?php if ($list_projects == 0) : ?>
                                                <p class="gui-input text-center">Você não está participando de nenhum projeto</p>
                                            <?php else : ?>
                                                <select name="project_id" id="project_id" class="gui-input">

                                                    <?php foreach ($list_projects as $value) : ?>

                                                        <option value="<?= $value['id']; ?>"><?= $value['pro_name']; ?></option>

                                                    <?php endforeach; ?>

                                                </select>
                                            <?php endif; ?>

                                        </label>
                                    </div>
                                </div>
                                <!-- /section -->
                                <div class="section text-center">
                                    <?php if ($list_projects != 0) : ?>
                                        <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                    <?php endif; ?>
                                </div>
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