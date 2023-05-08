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
            <li class="breadcrumb-current-item">Pontuação de questões</li>
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
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="spy1">
                        <div class="panel-heading text-center">
                            <span class="panel-title">Pontuação das questões</span><br>
                        </div>
                        <div class="panel-body pn mt20">
                            <div class="table-responsive">
                                <table class="table footable">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="5">Pergunta</th>
                                            <th class="text-center" colspan="2">Pontuação da resposta positiva</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="ml10">A função será série nos veículos que será aplicada?</td>
                                            <td class="text-center" colspan="2"><?= $list_questions['point_question_1']; ?> pontos</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="ml10">A função gera indicação no painel de instrumentos?</td>
                                            <td class="text-center" colspan="2"><?= $list_questions['point_question_2']; ?> pontos</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="ml10">A função é homologatória?</td>
                                            <td class="text-center" colspan="2"><?= $list_questions['point_question_3']; ?> pontos</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="section text-center mt20">
                                <a href="<?= BASE_URL; ?>admin/edit_points" class="btn btn-primary">
                                    <span class="fs14 fa fa-edit"></span> Editar pontuação
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Panel -->
        </div>

        <!-- /Column Center -->
    </div>
</section>