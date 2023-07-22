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
    <link rel="stylesheet" type="text/css"
        href="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/skin/default_skin/less/theme.css">
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/magnific/magnific-popup.css">
    <!-- jQuery -->

    <script>
    var BASE_URL = '<?= BASE_URL; ?>';
    </script>
    <?php if ($viewData['page'] == 'first_result' || $viewData['page'] == 'chooseResult') : ?>
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" type="text/css"
        href="<?= BASE_URL; ?>assets/js/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <?php endif; ?>
    <?php if ($viewData['page'] == 'edit_meeting') : ?>
    <!-- X-edit CSS -->
    <?php endif; ?>

    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery-3.6.2.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery-1.12.3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery.validate.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/messages_pt_BR.js"></script>

</head>

<body class="sales-stats-page sb-top sb-top-lg">

    <!-- Body Wrap -->
    <div id="main">
      
   
            <section class="content_container">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                <!-- aqui chamamos nossa view -->

               
                <!-- /Page Footer -->
            </section>
        
        <!-- /Main Wrapper -->
    </div>
    <!-- /Body Wrap  -->
    <!-- Scripts -->
    <!-- Validates -->

    <?php if ($viewData['page'] == 'new_password') : ?>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/new_password.js"></script>
    <?php elseif (isset($viewData['form']) && $viewData['form'] == 'project_3') : ?>
    <script src="<?= BASE_URL; ?>assets/js/search_can.js"></script>
    <?php elseif (isset($viewData['form']) && $viewData['form'] == 'project_4') : ?>
    <script src="<?= BASE_URL; ?>assets/js/search_parameter.js"></script>
    <?php elseif ($viewData['page'] == 'first_result' || $viewData['page'] == 'chooseResult') : ?>
    <!-- Date/Month - Pickers -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/globalize/globalize.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/moment/moment.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
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
    <!-- DateRange JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/daterange/daterangepicker.min.js"></script>
    <!-- BS Colorpicker JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- MaskedInput JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/jquerymask/jquery.maskedinput.min.js"></script>
    <!-- Theme Scripts -->
    <script src="<?= BASE_URL; ?>assets/js/pages/user-forms-additional-inputs.js"></script>

    <?php endif; ?>

    <!-- AnimatedSVGIcons -->
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
    <!-- Scroll -->
    <script
        src="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js">
    </script>
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

    <script src="<?= BASE_URL; ?>assets/js/pages/tables-basic.js"></script>


</body>

</html>