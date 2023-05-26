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
    <?php if ($viewData['page'] == 'first_result') : ?>
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <?php endif; ?>
    <?php if ($viewData['page'] == 'edit_meeting') : ?>
        <!-- X-edit CSS -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/xeditable/css/bootstrap-editable.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/xeditable/inputs/address/address.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/xeditable/inputs/typeaheadjs/lib/typeahead.js-bootstrap.css">
        <!-- Summernote -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/js/plugins/summernote/summernote.css">
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
        <!-- Header  -->
        <header class="navbar navbar-fixed-top bg-system phn">
            <div class="navbar-logo-wrapper">
                <div class="logo-widget">
                    <div class="media">
                        <a class="logo-image" href="<?= BASE_URL; ?>admin"></a>
                    </div>
                </div>
            </div>
            <!--<form class="navbar-form navbar-left search-form square" role="search">
                <div class="input-group add-on">
                    <input type="text" class="form-control btn-hover-effects bg-light" placeholder="Search..." onfocus="this.placeholder=''" onblur="this.placeholder='Search...'">
                    <button class="btn btn-default text-info hidden-xs hidden-sm" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </form>-->
            <ul class="nav navbar-nav navbar-right darker mn pv20 ph10">

                <li class="dropdown dropdown-fuse navbar-user mt-5">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">
                            <span class="name"><?= $viewData['info_user']['name']; ?></span>
                        </span>
                        <span class="fa fa-caret-down hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group keep-dropdown w230" role="menu">
                        <li class="list-group-item">
                            <span class="fa fa-archive"></span>
                            <a href="<?= BASE_URL; ?>project/user_projects" class="">
                                Meus Projetos
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span class="fa fa-cog"></span>
                            <a href="<?= BASE_URL; ?>home/new_password" class="">
                                Alterar senha
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="<?= BASE_URL; ?>home/logout" class="btn btn-warning">
                                logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--<ul class="nav navbar-nav navbar-right pr15">

                <li class="dropdown dropdown-fuse">
                    <div class="navbar-btn btn-group">
                        <button class="btn-hover-effects dropdown-toggle btn bg-light" data-toggle="dropdown">
                            <img src="<?= BASE_URL; ?>assets/img/sprites/uk.png" alt="">
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="javascript:void(0);"> English </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Spanish </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Italian </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>-->
        </header>
        <!-- /Header -->
        <!-- Sidebar  -->
        <aside id="sidebar_left" class="">
            <!-- Sidebar Left Wrapper  -->
            <div class="sidebar-left-content nano-content">
                <!-- Sidebar Menu  -->
                <ul class="nav sidebar-menu">
                    <li class="<?= ($viewData['page'] == 'home_page') ? 'active' : ''; ?>">
                        <a class="" href="<?= BASE_URL; ?>home/home_page">
                            <span class="sb-menu-icon fa fa-bar-chart-o"></span>
                            <span class="sidebar-title">Visão Geral</span>
                        </a>
                    </li>
                    <li class="<?= ($viewData['page'] == 'project') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="#">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-briefcase"></span>
                            <span class="sidebar-title">Projeto</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>project">Novo Projeto</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>project/test_results">Resultados de testes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'function_integration') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="<?= BASE_URL; ?>fintegration">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-tasks"></span>
                            <span class="sidebar-title">Int. Funções</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>functionintegration">Integração entre Funções, Cliente e Serviço</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>functionintegration/results">Resultados de Testes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'request_list') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="<?= BASE_URL; ?>home/under_construction">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-desktop"></span>
                            <span class="sidebar-title">Int. Softwares</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <p class="m15">Integração entre Softwares</p>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'provider_list') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="<?= BASE_URL; ?>home/under_construction">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-rss"></span>
                            <span class="sidebar-title">Int. Sinais</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>home/under_construction">Integração entre Sinais CAN</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'service_list') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="<?= BASE_URL; ?>home/under_construction">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-compass"></span>
                            <span class="sidebar-title">Int. Parâmetros</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>home/under_construction">Integridades de Parâmetros</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'client_list') ? 'active' : ''; ?>">
                        <a class="accordion-toggle">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-clipboard"></span>
                            <span class="sidebar-title">Mat. ECU's</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>home/under_construction">Maturidade de ECU's, Softwares e Funções</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($viewData['page'] == 'fail_test') ? 'active' : ''; ?>">
                        <a class="" href="<?= BASE_URL; ?>home/under_construction">
                            <span class="sb-menu-icon fa fa-exclamation-triangle"></span>
                            <span class="sidebar-title">Fail Safe Test</span>
                        </a>
                    </li>

                    <li class="<?= ($viewData['page'] == 'system') ? 'active' : ''; ?>">
                        <a class="accordion-toggle" href="#">
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-sitemap"></span>
                            <span class="sidebar-title">Sistema</span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="<?= BASE_URL; ?>system">Adicionar biblioteca ECU</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>system/add_library_can">Adicionar base de dados CAN</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>system/add_parameters">Adicionar base de dados de Parâmetros</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>system/add_vehicle_portfolio">Adicionar portfolio de Veículos</a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL; ?>system/useful_links">Links úteis</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($viewData['info_user']['permission'] == 2) : ?>
                        <li class="<?= ($viewData['page'] == 'admin') ? 'active' : ''; ?>">
                            <a class="accordion-toggle" href="#">
                                <span class="caret"></span>
                                <span class="sb-menu-icon fa fa-cogs"></span>
                                <span class="sidebar-title">Admin</span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="<?= BASE_URL; ?>admin">Tipos de ECU</a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL; ?>admin/add_can">Tipos de CAN</a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL; ?>admin/add_parameters">Tipos de Parâmetros</a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL; ?>admin/add_useful_links">Adicionar Links úteis</a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL; ?>admin/question_point">Pontuação das questões</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- /Sidebar Menu  -->
            </div>
            <!-- /Sidebar Left Wrapper  -->
        </aside>
        <!-- /Sidebar -->
        <!-- Main Wrapper -->
        <section id="content_wrapper">
            <section class="content_container">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?><!-- aqui chamamos nossa view -->

                <footer id="content-footer">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span class="footer-legal">© 2023 Todos os direitos reservados a RA (Renato Arcanjo). <span class="alert alert-dark">V. 1.0</span> <a href="#"> Termos de uso</a> e <a href="#">Política de privacidade</a></span>
                        </div>
                    </div>
                </footer>
                <!-- /Page Footer -->
            </section>
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
    <?php elseif ($viewData['page'] == 'first_result') : ?>
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

    <?php elseif ($viewData['page'] == 'edit_meeting') : ?>
        <!-- Summernote -->
        <script src="<?= BASE_URL; ?>assets/js/plugins/summernote/summernote.min.js"></script>
        <!-- Typeahead JS -->
        <script src="<?= BASE_URL; ?>assets/js/plugins/xeditable/inputs/typeaheadjs/lib/typeahead.js"></script>
        <!-- MarkDown JS -->
        <script src="<?= BASE_URL; ?>assets/js/plugins/markdown/markdown.js"></script>
        <script src="<?= BASE_URL; ?>assets/js/plugins/markdown/to-markdown.js"></script>
        <script src="<?= BASE_URL; ?>assets/js/plugins/markdown/bootstrap-markdown.js"></script>
        <!-- X-edit CSS -->
        <script src="<?= BASE_URL; ?>assets/js/plugins/moment/moment.min.js"></script>
        <script src="<?= BASE_URL; ?>assets/js/plugins/xeditable/js/bootstrap-editable.min.js"></script>
        <script src="<?= BASE_URL; ?>assets/js/plugins/xeditable/inputs/address/address.js"></script>
        <script src="<?= BASE_URL; ?>assets/js/plugins/xeditable/inputs/typeaheadjs/typeaheadjs.js"></script>
        <!-- Theme Scripts -->
        <script src="<?= BASE_URL; ?>assets/js/pages/user-forms-editors.js"></script>
    <?php endif; ?>

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