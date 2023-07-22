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
<?php if (isset($_COOKIE["error"])) : ?>
    <div class="section row">
        <div class="col-md-10 ph10 mb5">
            <div class="text-center">
                <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                    <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                    <h3 class="mtn fs20 text-white">Sucesso</h3>
                    <p><?= $_COOKIE["error"]; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <?php foreach ($info_software_integrations as $key => $value) : ?>

                <div class="row mhn">
                    <div class=" col-lg-12">
                        <!-- User Project List -->
                        <div class="panel" id="spy6">
                            <div class="panel-heading ">
                                <i class="icon-clock"></i>
                                <span class="panel-title">ECU - <?= $value['releases_softwares'][$key]['name']; ?></span>
                            </div>
                            <div class="panel-body pn mt20">
                                <div class="bs-component">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-style-1 btn-gradient-grey">
                                            <thead class="">
                                                <tr>
                                                    <th class="">R2301</th>
                                                    <th class="">R2302</th>
                                                    <th class="">R2303</th>
                                                    <th class="">R2304</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <?php foreach ($value['releases_softwares'] as $key => $item) : ?>
                                                        <td><?= date('d/m/Y', strtotime($item['releases_date'])); ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" colspan="4">
                                                        <h3>Função</h3>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($value['releases_softwares'] as $key => $item) : ?>
                                                        <td><?= $item['releases_function']; ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="section text-center mb40">
                <a href="<?= BASE_URL; ?>softwareintegration/second_result_download?project_id=<?= $info_software_integrations[0]['project_id'];?>" class="btn btn-primary btn-bordered">Download do resultado</a>
            </div>


        </div>
        <!-- /Column Center -->
    </div>
</section>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>