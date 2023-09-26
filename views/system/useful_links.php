<header id="topbar" class="breadcrumb_style_2">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Sistema</li>
            <li class="breadcrumb-current-item">Links Úteis</li>
        </ol>
    </div>
</header>
<!-- /Topbar -->
<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout">
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw700 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Links Úteis</span>
                        </div>
                        <div class="panel-body pn">
                            <div class="section text-center m20 p10">
                                <?php if ($list_useful_links == 0) : ?>
                                    <span>Nenhum Link foi cadastrado ainda.</span>
                                <?php else : ?>
                                    <ul class="pl15">
                                        <?php foreach ($list_useful_links as $key => $value) : ?>
                                            <li>
                                                <a href="<?= $value['url']; ?>"><?= $value['title']; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>