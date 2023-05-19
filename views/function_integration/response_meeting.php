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
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>functionintegration/second_result">Segundo resultado</a>
            </li>
            <li class="breadcrumb-current-item">Conclusão da Reunião</li>
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
                <div class="allcp-form tab-pane mw900 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4 class="pbn">Conclusão da Reunião</h4><span class="text-right text-muted">Data da reunião: <?= $list['date_meeting']; ?></span>
                        </div>
                        <div class="panel-body">
                            <form action="<?= BASE_URL; ?>functionintegration/response_meeting/<?= $list['id']; ?>" method="post">
                                <div class="section row text-center">
                                    <h6 class="pn mn">Tema da reunião:</h6>
                                    <h5 class="text-primary mt10"><?= $list['title']; ?></h5>
                                </div>
                                <div class="section row text-center">
                                    <h6 class="ptn mtn">Conclusão sobre a reunião:</h6>
                                    <div class="panel ptn">
                                        <div class="panel-body pn" id="summer-demo">
                                            <textarea class="summernote gui-textarea" name="text" rows="10" style="height: 400px; border-radius: 10px;">
                                                <?php if (!empty($list['text'])) {
                                                    echo $list['text'];
                                                }?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn fs14 btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>