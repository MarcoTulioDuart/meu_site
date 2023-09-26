<!DOCTYPE html>
<html>

<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>ProTSA | Login</title>
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
    <!-- c3charts -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/magnific/magnific-popup.css">
    <!-- jQuery -->
    
    <script>
        var BASE_URL = '<?= BASE_URL; ?>';
    </script>
    <script src="<?= BASE_URL; ?>assets/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery-3.6.2.min.js"></script>

    <script src="<?= BASE_URL; ?>assets/js/pages/validation/jquery.validate.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/messages_pt_BR.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/pages/management-tools-modals.js"></script>

</head>

<body class="utility-page sb-l-c sb-r-c" id="modal-content">
    <!-- Body Wrap -->
    <div id="main" class="animated fadeIn">
        <!-- Main Wrapper -->
        <section id="content_wrapper">
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>
            <!-- Content -->
            <section id="content">
                <?php if (isset($_COOKIE["error_login"])) : ?>
                    <div class="alert alert-danger mb-2" role="alert">
                        <?= $_COOKIE["error_login"]; ?>
                    </div>
                <?php endif; ?>
                <!-- Login Form -->
                <div class="allcp-form theme-primary mw320">
                    <div class="mw600 text-center mb20 br3 pt15 pb10">
                        <img src="<?= BASE_URL; ?>assets/img/logo.png" alt="" class="img-reponsive" style="width: 220px;">
                    </div>
                    <div class="panel mw320">

                        <div class="panel-body pn mv10">
                            <form class="form-horizontal new-lg-form" method="post" action="<?= BASE_URL; ?>home" id="form-login">
                                <div class="section">
                                    <label for="login" class="field prepend-icon">
                                        <input type="email" name="login" id="login" class="gui-input" placeholder="E-mail" required>
                                        <span class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </label>
                                </div>
                                <!-- /section -->
                                <div class="section">
                                    <label for="password" class="field prepend-icon">
                                        <input type="password" name="password" id="password" class="gui-input" placeholder="Senha" required>
                                        <span class="field-icon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </label>
                                </div>

                                <!-- /section -->
                                <div class="section text-center">
                                    <!--<a href="<?= BASE_URL; ?>admin/home" class="btn btn-bordered btn-primary">Entrar</a>-->
                                    <button type="submit" class="btn btn-bordered btn-primary">Entrar</button>
                                </div>
                                <!-- /section -->
                                <!-- /Form -->
                            </form>
                            <div class="section text-center row">
                                <div id="animation-switcher">
                                    <div class="col-xs-12 col-sm-12">
                                        <a class="holder-active" href="#modal-forgot">
                                            <button class="active-animation text-primary" data-effect="mfp-zoomIn" style="border: none; background: none;">
                                                Esqueceu sua senha?
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <hr class="alt short">

                            <div class="section text-center row">
                                <a class="text-primary" href="<?= BASE_URL ?>home/register">Criar conta</a>
                            </div>

                            <!-- /section -->
                        </div>
                    </div>
                    <!-- /Panel -->
                </div>
                <!-- /Spec Form -->

            </section>
            <!-- /Content -->

        </section>

    </div>
    <!-- /Body Wrap  -->
    <!-- /Main Wrapper -->

    <div id="modal-forgot" class="popup-basic allcp-form mfp-with-anim mfp-hide">
        <div class="panel">
            <div class="panel-heading text-center">
                <span class="panel-title">
                    Problemas para lembrar sua senha?
                </span>
            </div>
            <!-- /Panel Heading -->
            <form method="post" action="<?= BASE_URL; ?>home/forgot_password" id="form-forgot">
                <div class="panel-body ph15">
                    <div class="section row text-center">
                        <label>Insira seu nome e email cadastrados e enviaremos um link para recuperar sua senha.</label>
                    </div>
                    <div class="section row mhn10">
                        <div class="col-md-12 ph15">
                            <label for="name" class="field prepend-icon">
                                <input type="text" name="name" id="name" class="gui-input" placeholder="Nome">
                                <span class="field-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                            </label>
                        </div>
                        <!-- /section -->
                    </div>
                    <!-- /Section -->
                    <div class="section row mhn10">
                        <div class="col-md-12 ph15">
                            <label for="email" class="field prepend-icon">
                                <input type="email" name="email" id="email" class="gui-input" placeholder="Email">
                                <span class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /Form -->
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary fs16 btn-sm">Enviar</button>
                </div>
                <!-- /Panel Footer -->
            </form>
        </div>
        <!-- /Panel -->
    </div>
    <!-- Scripts -->
    <!-- AnimatedSVGIcons -->
    <!-- Validation -->
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/login.js"></script>
    
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

    <!-- Magnific Popup Plugin -->
    <script src="<?= BASE_URL; ?>assets/js/plugins/magnific/jquery.magnific-popup.min.js"></script>
    <!-- /Scripts -->
</body>

</html>