<!DOCTYPE html>
<html>

<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>ProTSA | Recuperar senha</title>
    <meta name="description" content="ProTSA - Sistema Automotivo">
    <meta name="author" content="Infocept">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL; ?>assets" type="image/png">
    <!-- Angular material -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/skin/css/angular-material.min.css">
    <!-- Icomoon -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/fonts/icomoon/icomoon.css">
    <!-- AnimatedSVGIcons -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/css/codropsicons.css">
    <!-- CSS - allcp forms -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/allcp/forms/css/forms.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css">
    <!-- CSS - theme -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/skin/default_skin/less/theme.css">

    <!-- jQuery -->

    <script>
        var BASE_URL = '<?= BASE_URL; ?>';
    </script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery-3.6.2.min.js"></script>

    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery.validate.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/messages_pt_BR.js"></script>
</head>

<body class="utility-page sb-l-c sb-r-c">
    <!-- Body Wrap -->
    <div id="main" class="animated fadeIn">
        <!-- Main Wrapper -->
        <section id="content_wrapper">
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>
            <!-- Content -->
            <section id="content">
                <?php if (isset($_COOKIE["error_register"])) : ?>
                    <div class="alert alert-danger mb-2" role="alert">
                        <?= $_COOKIE["error_register"]; ?>
                    </div>
                <?php endif; ?>
                <!-- Login Form -->
                <div class="allcp-form theme-primary mw500">
                    <div class="bg-primary mw500 text-center mb20 br3 pt15 pb10">
                        <div class="sidebar-widget logo-widget">
                            <a class="logo-image mtn" href="index.html"></a>
                            <div class="logo-slogan mtn">Recuperar Senha<span class="text-info"></span></div>
                        </div>
                    </div>
                    <div class="panel mw500">
                        <form class="form-horizontal new-lg-form" method="post" action="<?= BASE_URL; ?>home/recover_password" id="form-recover">
                            <div class="panel-body pn mv10">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="new_password" class="field prepend-icon">
                                            <input type="password" name="new_password" id="new_password" class="gui-input" placeholder="Digite sua nova senha" required>
                                            <span class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="c_new_password" class="field prepend-icon">
                                            <input type="password" name="c_new_password" id="c_new_password" class="gui-input" placeholder="Confirme sua nova senha" required>
                                            <span class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <!-- /section -->
                                <div class="section text-center">
                                    <!--<a href="<?= BASE_URL; ?>admin/home" class="btn btn-bordered btn-primary">Entrar</a>-->
                                    <button type="submit" class="btn btn-bordered btn-primary">Recuperar senha</button>
                                </div>
                            </div>
                            <!-- /Form -->
                        </form>
                    </div>
                    <!-- /Panel -->
                </div>
                <!-- /Spec Form -->
            </section>
            <!-- /Content -->
        </section>
        <!-- /Main Wrapper -->
    </div>
    <!-- /Body Wrap  -->
    <!-- Scripts -->
    <!-- AnimatedSVGIcons -->

    <!-- Validation -->
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/form-register.js"></script>

    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/snap.svg-min.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-config.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons.js"></script>
    <script src="<?= BASE_URL; ?>assets/fonts/animatedsvgicons/js/svgicons-init.js"></script>
    <!-- Scroll -->
    <script src="<?= BASE_URL; ?>assets/js/utility/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- HighCharts Plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/highcharts/highcharts.js"></script>
    <!-- CanvasBG JS -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/canvasbg/canvasbg.js"></script>
    <!-- Theme Scripts -->
    <script src="<?= BASE_URL; ?>assets/js/utility/utility.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/demo/demo.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/main.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/demo/widgets_sidebar.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/dashboard_init.js"></script>
    <!-- /Scripts -->
</body>

</html>