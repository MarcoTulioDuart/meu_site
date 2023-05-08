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
                <a href="<?= BASE_URL; ?>admin/question_point">Pontuação de questões</a>
            </li>
            <li class="breadcrumb-current-item">Atualizar pontuação</li>
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
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="spy1">
                        <div class="panel-heading text-center">
                            <span class="panel-title">Atualizar pontuação</span><br>
                            <hr>
                        </div>
                        <div class="panel-body pn">
                            <form action="<?= BASE_URL; ?>admin/edit_points" method="post">
                                <div class="section row">
                                    <h6 class="ml20">Primeira pergunta:</h6>
                                    <p class="text-alert ml20 mt20"><b>"</b>A função será série nos veículos que será aplicada?<b>"</b></p>

                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="point_1" class="field prepend-icon">
                                            <input type="number" name="point_1" id="point_1" class="gui-input" step="0.1" value="<?= $list_questions['point_question_1']; ?>">
                                            <span class="field-icon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <h6 class="ml20">Segunda pergunta:</h6>
                                    <p class="text-alert ml20 mt20"><b>"</b>A função gera indicação no painel de instrumentos?<b>"</b></p>

                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="point_1" class="field prepend-icon">
                                            <input type="number" name="point_2" id="point_2" class="gui-input" step="0.1" value="<?= $list_questions['point_question_2']; ?>">
                                            <span class="field-icon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <h6 class="ml20">Terceira pergunta:</h6>
                                    <p class="text-alert ml20 mt20"><b>"</b>A função é homologatória?<b>"</b></p>

                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="point_1" class="field prepend-icon">
                                            <input type="number" name="point_3" id="point_3" class="gui-input" step="0.1" value="<?= $list_questions['point_question_3']; ?>">
                                            <span class="field-icon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn fs14 btn-primary"><b>Enviar</b></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Panel -->
    </div>

</section>