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
            <a href="<?= BASE_URL; ?>softwareintegration/chooseResult?project_id=<?= $_GET['project_id']; ?>">Resultados de integração entre Software</a>
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
                                            <ul>
                                                <li>Se não houver reuniões listadas na tabela, basta clicar no botão agendar reunião.</li><br>
                                                <li>A coluna 'status' na tabela indica se já foi registrado o resultado da reunião, para editar (continuar) basta clicar no ícone editar.</li>
                                            </ul>
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
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-right">Opções</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_meeting == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="8" class="text-center">Nenhuma reunião foi registrada.</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_meeting as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['title']; ?></td>
                                                                            <td class="text-center">
                                                                                <?php if (!empty($value['text'])) {
                                                                                    echo "Concluída";
                                                                                } else {
                                                                                    echo "Aguardando atualização...";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="section text-right">
                                                                                    <a href="<?= BASE_URL; ?>meeting/view/<?= $value['id']; ?>" class="btn btn-primary p10">
                                                                                        <?php if (!empty($value['text'])) : ?>
                                                                                            <span class="fs14 fa fa-check"></span>
                                                                                        <?php else : ?>
                                                                                            <span class="fs14 fa fa-edit"></span>
                                                                                        <?php endif; ?>
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

                                <div class="col-md-4  mb5">
                                    <div id="animation-switcher" class="ph20">
                                        <div class="col-xs-12 col-sm-4 text-right">
                                            <a class="holder-active" href="#modal-form">
                                                <button class="btn btn-primary btn-bordered" data-effect="mfp-zoomIn">
                                                    <b>AGENDAR REUNIÃO</b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
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

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Crie uma reunião
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>meeting" id="form-order" enctype="multipart/form-data">
            <input type="hidden" value="<?= $_GET['project_id'] ?>" name="project_id">
            <div class="panel-body">
                <div class="section row">
                    <h6 class="text-muted text-center">É obrigatório preencher os campos com asterisco.</h6>
                </div>
                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <label for="title" class="field prepend-icon">
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Digite o tema da reunião *" required>
                            <span class="field-icon">
                                <i class="fa fa-file"></i>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="section row text-center">

                    <div class="form-group">
                        <div class="col-md-4">
                            <span class="field-icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <h6 class="text-center mtn pt10 pb20">Escolha uma data e horário para a reunião *</h6>
                        </div>

                        <div class="col-md-8">
                            <div id="datetimepicker3">
                                <input type="text" name="date_meeting" class="form-control" style="max-width: 250px;" required>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Convide outras pessoas para a reunião</h6>
                    <h6 class="text-muted text-center">Digite corretamente seus emails no campo abaixo, separando por ' ; ' sem espaços.</h6>
                    <label for="participant" class="field prepend-icon">
                        <input type="text" name="participant" id="participant" class="gui-input">
                        <span class="field-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Onde será feita a reunião? *</h6>
                    <h6 class="text-muted text-center">Cole o link da reunião.</h6>
                    <label for="link" class="field prepend-icon">
                        <input type="text" name="link" id="link" class="gui-input" required>
                        <span class="field-icon">
                            <i class="fa fa-link"></i>
                        </span>
                    </label>
                </div>

                <div class="section row">
                    <h6 class="text-center mtn pt10 pb10">Deseja fazer um comentário ou recomendação?</h6>
                    <h6 class="text-muted text-center">A mensagem digitada aparecerá abaixo do link de reunião no email.</h6>
                    <label for="recommendation" class="field prepend-icon">
                        <textarea type="text" name="recommendation" id="recommendation" class="gui-textarea"></textarea>
                        <span class="field-icon">
                            <i class="fa fa-list"></i>
                        </span>
                    </label>
                </div>

                <div class="section">
                    <h6 class="text-center">Envie os arquivos necessários para a reunião *</h6>
                    <?php foreach ($info_software_integrations as $key => $value) : ?>
                        <div class="section row">
                            <h6 class="text-center text-muted">Selecione o arquivo do diagrama de blocos da ECU <?= $value['releases_softwares'][0]['name']; ?></h6>
                            <label class="field prepend-icon file mb20 mt10">

                                <input type="file" name="files_ecu[]" class="gui-file" onchange="document.getElementById('uploader<?= $key; ?>').value = this.value;">

                                <input type="text" id="uploader<?= $key; ?>" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                <i class="fa fa-upload"></i>

                            </label>
                        </div>
                    <?php endforeach; ?>

                    <div class="section row">
                        <h6 class="text-center text-muted">Selecione o arquivo do resultado de Releases Softwares</h6>
                        <label class="field prepend-icon file mb20 mt10">

                            <input type="file" name="releases_softwares" class="gui-file" onchange="document.getElementById('releases_softwares').value = this.value;">

                            <input type="text" id="releases_softwares" class="gui-input fluid-width" placeholder="selecione um arquivo">
                            <i class="fa fa-upload"></i>

                        </label>
                    </div>
                </div>


                <div class="section text-center">
                    <button type="submit" class="btn fs14 btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /Panel -->
</div>