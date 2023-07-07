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
            <li class="breadcrumb-current-item">Selecionar Veículos</li>
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
                            <span class="panel-title pn">Definição de veículos de referência</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle"></span>
                        </div>


                        <div class="panel-body pn">
                            <?php if (isset($_GET['question']) && $_GET['question'] == 1) : ?>
                                <!-- Primeira pergunta -->
                                <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_point_vehicle?question=1">
                                    <div class="section row">
                                        <h5 class="text-center">Qual é o veículo mais vendido pela empresa e possui o sistema / função a ser testado?</h5>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="vehicle" class="field select">

                                                <?php if ($list_vehicles == 0) : ?>
                                                    <p class="gui-input text-center">Não há veículos cadastrados no site.</p>
                                                <?php else : ?>
                                                    <select name="vehicle" id="vehicle" class="gui-input">

                                                        <?php foreach ($list_vehicles as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['vehicle']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <?php if ($list_vehicles != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <?php if (isset($_GET['question']) && $_GET['question'] == 2) : ?>
                                <!-- Segunda pergunta -->
                                <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_point_vehicle?question=2">
                                    <div class="section row">
                                        <h5 class="text-center">Qual é o veículo que recebe mais reclamações em relação ao sistema / função a ser testado?</h5>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="vehicle" class="field select">

                                                <?php if ($list_vehicles == 0) : ?>
                                                    <p class="gui-input text-center">Não há veículos cadastrados no site.</p>
                                                <?php else : ?>
                                                    <select name="vehicle" id="vehicle" class="gui-input">

                                                        <?php foreach ($list_vehicles as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['vehicle']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <?php if ($list_vehicles != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <?php if (isset($_GET['question']) && $_GET['question'] == 3) : ?>
                                <!-- Terceira pergunta -->
                                <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_point_vehicle?question=3">
                                    <div class="section row">
                                        <h5 class="text-center">Qual é o veículo possui a maior quantidade de sistemas / funções que ser homologadas?</h5>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="vehicle" class="field select">

                                                <?php if ($list_vehicles == 0) : ?>
                                                    <p class="gui-input text-center">Não há veículos cadastrados no site.</p>
                                                <?php else : ?>
                                                    <select name="vehicle" id="vehicle" class="gui-input">

                                                        <?php foreach ($list_vehicles as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['vehicle']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <?php if ($list_vehicles != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <?php if (isset($_GET['question']) && $_GET['question'] == 4) : ?>
                                <!-- Quarta pergunta -->
                                <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_point_vehicle?question=4">
                                    <div class="section row">
                                        <h5 class="text-center">Qual é o veículo espera-se maior dificuldade em termos de parametrização e/ou integração de Software?</h5>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="vehicle" class="field select">

                                                <?php if ($list_vehicles == 0) : ?>
                                                    <p class="gui-input text-center">Não há veículos cadastrados no site.</p>
                                                <?php else : ?>
                                                    <select name="vehicle" id="vehicle" class="gui-input">

                                                        <?php foreach ($list_vehicles as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['vehicle']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <?php if ($list_vehicles != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <?php if (isset($_GET['question']) && $_GET['question'] == 6) : ?>
                                <!-- Quinta pergunta -->
                                <form method="post" action="<?= BASE_URL; ?>parametersintegration/add_point_vehicle?question=5">
                                    <div class="section row">
                                        <h5 class="text-center">Qual veículo é novo em termos de aplicação ou aplicação severa?</h5>
                                        <span class="text-center text-muted">EX: Caminhão para bombeiros, implementação de terceiro eixo fora da fábrica, aplicação em mineração.</span>
                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12 ph10 mb5">
                                            <label for="vehicle" class="field select">

                                                <?php if ($list_vehicles == 0) : ?>
                                                    <p class="gui-input text-center">Não há veículos cadastrados no site.</p>
                                                <?php else : ?>
                                                    <select name="vehicle" id="vehicle" class="gui-input">

                                                        <?php foreach ($list_vehicles as $value) : ?>

                                                            <option value="<?= $value['id']; ?>"><?= $value['vehicle']; ?></option>

                                                        <?php endforeach; ?>

                                                    </select>
                                                <?php endif; ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="section text-center">
                                        <?php if ($list_vehicles != 0) : ?>
                                            <button type="submit" class="btn fs14 btn-primary">Próximo</button>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>

                        </div>
                        <!-- /Panel Body -->

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>