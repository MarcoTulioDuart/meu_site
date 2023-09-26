<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["success_add_can"])) : ?>
        <div class="text-center">
            <div class="alert alert-alert alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Sucesso</h3>
                <p><?= $_COOKIE["success_add_can"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_COOKIE["failed_add_can"])) : ?>
        <div class="text-center">
            <div class="alert alert-warning alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Sucesso</h3>
                <p><?= $_COOKIE["failed_add_can"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Admin</li>
            <li class="breadcrumb-current-item">Lista de Links</li>
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
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center pb25">
                            <span class="panel-title pn">Lista de Links</span>
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
                                                                    <th colspan="1">#</th>
                                                                    <th colspan="4">Título</th>
                                                                    <th colspan="4">Link</th>
                                                                    <th colspan="2" class="text-right pr30">Opções</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="11" class="text-center">Ainda não foi cadastrado nenhum link.</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list as $value) : ?>
                                                                        <tr>
                                                                            <td colspan="1"><?= $value['id']; ?></td>
                                                                            <td colspan="4"><?= $value['title']; ?></td>
                                                                            <td colspan="4"><?= $value['url']; ?></td>
                                                                            <td colspan="2">
                                                                                <div class="section text-right mr25">
                                                                                    <a href="<?= BASE_URL; ?>admin/delete_link/<?= $value['id']; ?>" class="btn btn-primary">
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
                                                Adicionar Link
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
                Adicionar Link
            </span>
        </div>
        <!-- /Panel Heading -->
        <form method="post" action="<?= BASE_URL; ?>admin/add_useful_links" id="add_links" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="section row">
                    <div class="col-md-12 ph10 mb5">
                        <label for="title" class="field prepend-icon">
                            <input type="text" name="title" id="title" class="gui-input" placeholder="Digite o nome do link">
                            <span class="field-icon">
                                <i class="fa fa-file"></i>
                            </span>
                        </label>
                    </div>
                    <div class="col-md-12 ph10 mb5">
                        <label for="url" class="field prepend-icon">
                            <input type="text" name="url" id="url" class="gui-input" placeholder="Digite o link">
                            <span class="field-icon">
                                <i class="fa fa-external-link"></i>
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

<!-- VALIDATION -->
<script src="<?= BASE_URL ?>assets/js/pages/validation/admin.js"></script>