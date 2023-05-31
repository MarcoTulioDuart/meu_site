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
                                            <h4>Relatório da Reunião</h4><span class="text-muted">Data da reunião: <?= $list['date_meeting']; ?></span>
                                        </div>
                                        <div class="panel-body">
                                            <div class="section row text-center">
                                                <h6 class="pn mn">Tema da reunião:</h6>
                                                <h5 class="text-primary mt10"><?= $list['title']; ?></h5>
                                            </div>
                                            <div class="section row mtn">
                                                <div class="tab-block">
                                                    <h6 class="ptn mtn pb20 text-center">Conclusão sobre a reunião:</h6>
                                                    <div class="tab-content ptn p30">
                                                        <?php if (!empty($list['text'])) : ?>
                                                            <?= $list['text']; ?>
                                                        <?php endif; ?>
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