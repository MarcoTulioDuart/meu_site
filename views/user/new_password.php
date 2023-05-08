<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">
                <a href="<?= BASE_URL; ?>home/user_projects">Perfil</a>
            </li>
            <li class="breadcrumb-current-item">Nova Senha</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <h2 class="text-white text-center">
        <i class="text-white menu-icon fa fa-briefcase"></i>
    </h2>
    <div class="content-left">
        <div class="section row">

        </div>
    </div>
    <div class="content-right table-layout">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Atualizar a Senha</span>
                        </div>
                        <form method="post" action="<?= BASE_URL; ?>home/new_password" id="new-password">
                            <div class="panel-body pn">
                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input" placeholder="Digite sua senha atual" required>
                                            <span class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section row">
                                    <div class="col-md-6 ph10 mb5">
                                        <label for="new_password" class="field prepend-icon">
                                            <input type="password" name="new_password" id="new_password" class="gui-input" placeholder="Digite sua nova senha" required>
                                            <span class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 ph10 mb5">
                                        <label for="c_new_password" class="field prepend-icon">
                                            <input type="password" name="c_new_password" id="c_new_password" class="gui-input" placeholder="Confirme sua nova senha" required>
                                            <span class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn fs14 btn-primary">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>