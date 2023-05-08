<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["success_add_parameters"])) : ?>
        <div class="text-center">
            <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Sucesso</h3>
                <p><?= $_COOKIE["success_add_parameters"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_COOKIE["failed_add_parameters"])) : ?>
        <div class="text-center">
            <div class="alert alert-warning alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Sucesso</h3>
                <p><?= $_COOKIE["failed_add_parameters"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Admin</li>
            <li class="breadcrumb-current-item">Adicionar tipo de Parâmetro</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Adicionar Tipo de Parâmetro</span>
                        </div>
                        <div class="panel-body pn">
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
                                                                    <th>Nome</th>
                                                                    <th>Opções</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_type_parameters == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">Ainda não foi cadastrado nenhum tipo de CAN.</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_type_parameters as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['name']; ?></td>
                                                                            <td>
                                                                                <div class="section text-right">
                                                                                    <a href="<?= BASE_URL; ?>admin/delete_parameters/<?= $value['id']; ?>" class="btn btn-primary">
                                                                                        <span class="fs14 fa fa-trash"></span>
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
                            <div class="section row">
                                <div id="animation-switcher" class="ph20">
                                    <div class="col-xs-12 col-sm-4">
                                        <a class="holder-active" href="#modal-form">
                                            <button class="btn btn-primary" data-effect="mfp-zoomIn">
                                                Adicionar Parâmetro
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div id="modal-form" class="popup-basic allcp-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">
                Adicionar Tipo de Parâmetro
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>admin/add_parameters" id="form-order" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <label for="type_parameters" class="field prepend-icon">
                            <input type="text" name="name" id="name" class="gui-input" placeholder="Digite o nome do Parâmetro">
                            <span class="field-icon">
                                <i class="fa fa-sitemap"></i>
                            </span>
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