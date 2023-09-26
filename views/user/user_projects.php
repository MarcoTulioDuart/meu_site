<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Perfil</li>
            <li class="breadcrumb-current-item">Meus projetos</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <h2 class="text-white text-center">
        <i class="text-white menu-icon fa fa-briefcase"></i> Meus Projetos
    </h2>
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
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
                                                                    <th>Nome do Projeto</th>
                                                                    <th>Opções</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if ($list_projects == 0) : ?>
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">Você não está participando de nenhum projeto.</td>
                                                                    </tr>
                                                                <?php else : ?>
                                                                    <?php foreach ($list_projects as $value) : ?>
                                                                        <tr>
                                                                            <td><?= $value['id']; ?></td>
                                                                            <td><?= $value['pro_name']; ?></td>
                                                                            <td>
                                                                                <div class="section text-right">
                                                                                    <a href="<?= BASE_URL; ?>project/project_view/<?= $value['id']; ?>" class="btn btn-primary">
                                                                                        <span class="fs14 fa fa-eye"></span>
                                                                                    </a>
                                                                                    <a href="<?= BASE_URL; ?>project/delete_project/<?= $value['id']; ?>" class="btn btn-primary">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>