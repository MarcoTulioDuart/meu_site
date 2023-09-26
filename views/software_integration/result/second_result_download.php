<!-- New Project -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <?php foreach($info_software_integrations as $key => $value): ?>

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
                                                <?php foreach($value['releases_softwares'] as $key => $item): ?>
                                                    <td><?= date('d/m/Y', strtotime($item['releases_date'])); ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <th class="text-center" colspan="4">
                                                    <h3>Função</h3>
                                                </th>
                                            </tr>
                                            <tr>
                                                <?php foreach($value['releases_softwares'] as $key => $item): ?>
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


            
        </div>
        <!-- /Column Center -->
    </div>
</section>
<script src="<?= BASE_URL ?>assets/js/pages/validation/function-integration.js"></script>