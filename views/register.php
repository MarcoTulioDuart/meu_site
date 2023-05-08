<!DOCTYPE html>
<html>

<head>
    <!-- Meta and Title -->
    <meta charset="utf-8">
    <title>ProTSA | Cadastrar</title>
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
                <div class="allcp-form theme-primary mw500" id="login">
                    <div class="bg-primary mw500 text-center mb20 br3 pt15 pb10">
                        <div class="sidebar-widget logo-widget">
                            <a class="logo-image mtn" href="index.html"></a>
                            <div class="logo-slogan mtn">Cadastrar<span class="text-info"></span></div>
                        </div>
                    </div>
                    
                    <div class="panel mw500">

                        <?php if (isset($_GET['invite']) && !empty($_GET['invite'])) : ?>
                            <!-- Form de registro para convidados -->
                            <form class="form-horizontal new-lg-form" method="post" action="<?= BASE_URL; ?>home/register?invite=<?= $_GET['invite']; ?>" id="form-register">
                                <div class="panel-body pn mv10">
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="name" class="field prepend-icon">
                                                <input type="text" name="name" id="name" class="gui-input" placeholder="Nome" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="last_name" class="field prepend-icon">
                                                <input type="text" name="last_name" id="last_name" class="gui-input" placeholder="Sobrenome" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="responsibility" class="field prepend-icon">
                                                <input type="text" name="responsibility" id="responsibility" class="gui-input" placeholder="Função na Empresa" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <!-- /section -->
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="login" class="field prepend-icon">
                                                <input type="email" name="login" id="login" class="gui-input" placeholder="E-mail" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="company_id" class="field prepend-icon">
                                                <input type="text" name="company_id" id="company_id" class="gui-input" placeholder="ID da empresa" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-credit-card"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-6">
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="Digite a senha" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </label>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_password" class="field prepend-icon">
                                                <input type="password" name="c_password" id="c_password" class="gui-input" placeholder="Confirme a senha" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </label>

                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <!--<a href="<?= BASE_URL; ?>admin/home" class="btn btn-bordered btn-primary">Entrar</a>-->
                                        <button type="submit" class="btn btn-bordered btn-primary">Cadastrar</button>
                                    </div>
                                    <div class="section text-center">
                                        <a class="text-primary" href="<?= BASE_URL ?>">Já possui uma conta?</a>
                                    </div>
                                </div>
                                <!-- /Form -->
                            </form>

                        <?php else : ?>
                            <!-- Form de registro normal -->
                            <form class="form-horizontal new-lg-form" method="post" action="<?= BASE_URL; ?>home/register" id="form-register">
                                <div class="panel-body pn mv10">
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="name" class="field prepend-icon">
                                                <input type="text" name="name" id="name" class="gui-input" placeholder="Nome" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="last_name" class="field prepend-icon">
                                                <input type="text" name="last_name" id="last_name" class="gui-input" placeholder="Sobrenome" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="responsibility" class="field prepend-icon">
                                                <input type="text" name="responsibility" id="responsibility" class="gui-input" placeholder="Função na Empresa" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <!-- /section -->
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="login" class="field prepend-icon">
                                                <input type="email" name="login" id="login" class="gui-input" placeholder="E-mail" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="company_id" class="field prepend-icon">
                                                <input type="text" name="company_id" id="company_id" class="gui-input" placeholder="ID da empresa" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-credit-card"></i>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="section row">
                                        <div class="col-md-6">
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="Digite a senha" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </label>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_password" class="field prepend-icon">
                                                <input type="password" name="c_password" id="c_password" class="gui-input" placeholder="Confirme a senha" required>
                                                <span class="field-icon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                            </label>

                                        </div>
                                    </div>
                                    <!-- /section -->
                                    <div class="section text-center">
                                        <!--<a href="<?= BASE_URL; ?>admin/home" class="btn btn-bordered btn-primary">Entrar</a>-->
                                        <button type="submit" class="btn btn-bordered btn-primary">Cadastrar</button>
                                    </div>
                                    <div class="section text-center">
                                        <a class="text-primary" href="<?= BASE_URL ?>">Já possui uma conta?</a>
                                    </div>
                                </div>
                                <!-- /Form -->
                            </form>

                        <?php endif; ?>

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

    <!-- Validation -->
    <script src="<?= BASE_URL; ?>assets/js/pages/validation/form-register.js"></script>

    <!-- AnimatedSVGIcons -->
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