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
                <a href="<?= BASE_URL; ?>functionintegration/results">Resultados de integração entre Funções</a>
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
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
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
                            <h4>Lista de reuniões</h4><br>
                        </div>
                        <div class="panel-body">
                            <div class="section row">
                                <div class="col-md-12 ph10 mb5">
                                    <div class="panel mb50" id="p5" data-panel-remove="false" data-panel-color="false" data-panel-fullscreen="false" data-panel-title="false" data-panel-collapse="false">
                                        <div class="panel-body panel-scroller scroller-sm pn mt20">
                                            <div class="option-group field">
                                                <div class="panel-body pn">
                                                    <div class="table-responsive">
                                                        <table class="table footable" data-filter="#fooFilter">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Tema</th>
                                                                    <th>Opções</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_meeting == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">Nenhuma reunião foi registrada.</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_meeting as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['title']; ?></td>
                                                                            <td>
                                                                                <div class="section text-right">
                                                                                    <a href="<?= BASE_URL; ?>functionintegration/response_meeting/<?= $value['id']; ?>" class="btn btn-primary">
                                                                                        <span class="fs14 fa fa-eye"></span>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>functionintegration/response_meeting" class="btn fs14 btn-primary">Adicionar Reunião</a>
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