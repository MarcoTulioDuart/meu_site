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
                <a href="<?= BASE_URL; ?>functionintegration/results">Resultados de integração entre Funções</a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>functionintegration/second_result">Segundo resultado</a>
            </li>
            <li class="breadcrumb-current-item">Conclusão da Reunião</li>
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
                <div class="allcp-form tab-pane mw900 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">
                        <div class="panel-heading text-center">
                            <h4 class="pbn">Conclusão da Reunião</h4><span class="text-right text-muted">Data da reunião: <?= $list['date_meeting']; ?></span>
                        </div>
                        <div class="panel-body">
                            <form action="<?= BASE_URL; ?>functionintegration/response_meeting/<?= $list['id']; ?>" method="post">
                                <div class="section row text-center">
                                    <h6 class="pn mn">Tema da reunião:</h6>
                                    <h5 class="text-primary mt10"><?= $list['title']; ?></h5>
                                </div>
                                <div class="section row text-center">
                                    <h6 class="ptn mtn pb20">Conclusão sobre a reunião:</h6>
                                    <textarea class="gui-textarea" id="editor" name="text" rows="10" style="height: 400px; border-radius: 10px;">
                                        <?php if (!empty($list['text'])) : ?>
                                            <?= $list['text']; ?>
                                        <?php endif; ?>
                                    </textarea>
                                        
                                </div>
                                <div class="section text-center">
                                    <button type="submit" class="btn fs14 btn-primary"><b>Atualizar</b></button>
                                    <a href="<?= BASE_URL; ?>functionintegration/download_second_result/<?= $list['id']; ?>" target="_blank" class="btn fs14 ml15 btn-primary">Download</a>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<script src="<?= BASE_URL; ?>assets/ckeditor/build/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {

            licenseKey: '',

        })
        .then(editor => {
            window.editor = editor;

        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: jeycm720hfdb-e6tc3q8v8zd4');
            console.error(error);
        });
</script>