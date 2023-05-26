<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ProTSA - Sistema Automotivo">
    <meta name="author" content="Infocept">
    <title>ProTSA</title>
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/c3charts/c3.min.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/allcp/forms/css/forms.css">
    <!-- mCustomScrollbar -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/skin/default_skin/less/theme.css">
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/magnific/magnific-popup.css">
    <!-- jQuery -->

    <script>
        var BASE_URL = '<?= BASE_URL; ?>';
    </script>
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery-3.6.2.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery-1.12.3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery.validate.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/messages_pt_BR.js"></script>
</head>

<body class="sales-stats-page sb-top sb-top-lg">
    <!-- Body Wrap -->
    <div id="main">
        <section>
            <section class="content_container">
                <!-- Content -->
                <section id="content" class="animated fadeIn pt35">
                    <div class="content table-layout" id="modal-content">
                        <!-- Column Center -->
                        <div class="chute chute-center pbn">
                            <!-- Lists -->
                            <div class="row">
                                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                                    <div class="panel" id="shortcut">
                                        <div class="panel-heading text-center">
                                            <h4>As funções foram Classificadas:</h4><br>
                                        </div>
                                        <div class="panel-body">
                                            <?php foreach ($list_classification as $key => $value) : ?>
                                                <div class="section row text-center">
                                                    <div class="col-md-12">
                                                        <h5 class="<?= ($value['fc_classification'] == "Função Cliente") ? "text-primary" : "text-system"; ?>"><?= $value['fc_classification']; ?>: <?= $value['e_function']; ?></h5>
                                                        <p class="text-muted">Pontuação: <?= number_format($value['fc_score'], 1, ",", "."); ?></p>
                                                    </div>
                                                </div>
                                                <div class="section row mtn">
                                                    <div class="tab-block">
                                                        <h6 class="text-center mtn mb20">Sinais relacionados com a Função</h6>
                                                        <div class="tab-content mh-200">
                                                            <p class="ph20"><?= $value['signals']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section row">
                                                    <div class="tab-block">
                                                        <h6 class="text-center mtn mb20">Descrição da função</h6>
                                                        <div class="tab-content">
                                                            <ul>
                                                                <li class="p5 pb10">
                                                                    <?php if ($value['question_1'] == $list_points['point_question_1']) {
                                                                        echo "Função série";
                                                                    } else {
                                                                        echo "Função opcional";
                                                                    }
                                                                    ?>
                                                                </li>
                                                                <li class="p5 pb10">
                                                                    <?php if ($value['question_2'] == $list_points['point_question_2']) {
                                                                        echo "Há indicação no painel de instrumentos";
                                                                    } else {
                                                                        echo "Não há indicação no painel de instrumentos";
                                                                    }
                                                                    ?>
                                                                </li>
                                                                <li class="p5 pb10">
                                                                    <?php if ($value['question_3'] == $list_points['point_question_3']) {
                                                                        echo "Há impacto em homologação";
                                                                    } else {
                                                                        echo "Não há impacto em homologação";
                                                                    }
                                                                    ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php endforeach; ?>
                                            <div class="section row mtn">
                                                <div class="tab-block">
                                                    <h6 class="text-center mtn mb20">Mensagens em comum:</h6>
                                                    <p class="text-center text-muted">Nome do sinal ➠ ECU: Função</p>
                                                    <div class="tab-content">
                                                        <?php foreach ($list_commom_signals as $key => $value) : ?>
                                                            <p class="ph20 pb10">♦ <?= $value['signal_name']; ?> ➠ <span class="text-right"><?= $value['commom_functions']; ?></span></p>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="section row text-center">

                                                <a href="#" class="btn btn-primary btn-bordered">Download</a>

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
            </section>
        </section>
    </div>

    <!-- BS Dual Listbox JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- Bootstrap Maxlength JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/maxlength/bootstrap-maxlength.min.js"></script>
    <!-- Select2 JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/select2/select2.min.js"></script>
    <!-- Typeahead JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/typeahead/typeahead.bundle.min.js"></script>
    <!-- TagManager JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/tagmanager/tagmanager.js"></script>
    <!-- MaskedInput JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <!-- Theme Scripts -->
    <script src="<?= BASE_URL; ?>assets/js/pages/user-forms-additional-inputs.js"></script>


    <!-- AnimatedSVGIcons -->
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
    <!-- Scroll -->
    <script src="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- HighCharts Plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/highcharts/highcharts.js"></script>
    <!-- Plugins -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/c3charts/d3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/c3charts/c3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/circles/circles.js"></script>
    <!-- Jvectormap JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/jvectormap/assets/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Theme Scripts -->
    <script src="<?= BASE_URL; ?>assets/js/utility/utility.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/demo/demo.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/main.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/demo/widgets_sidebar.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/dashboard2.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/demo/charts/highcharts.js"></script>

    <script src="<?= BASE_URL; ?>assets/js/pages/management-tools-modals.js"></script>
    <!-- Magnific Popup Plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/magnific/jquery.magnific-popup.min.js"></script>



</body>

</html>