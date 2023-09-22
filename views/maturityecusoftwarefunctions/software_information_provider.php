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
            <li class="breadcrumb-current-item">Maturidade de ECU's, Softwares e Funções</li>
            <li class="breadcrumb-current-item">Informações do software - Fornecedor</li>
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
                    <div class="panel" id="shortcut">

                        <!-- FORM 1: Escolha de projeto -->
                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Informações do software - Fornecedor</span><br>
                            <span class="fa fa-circle"></span>
                        </div>

                        <form method="post" action="<?= BASE_URL; ?>maturityecusoftwarefunctions/software_information_provider" id="form-order" enctype="multipart/form-data">
                            <div class="panel-body pn">
                                <input type="hidden" name="project_id" value="<?= $_GET['project_id']; ?>">
                                <input type="hidden" name="maturityecusoftwarefunctions_id" value="<?= $_GET['maturityecusoftwarefunctions_id']; ?>">
                                <div class="section row">
                                    <p class="fs14">Escolha uma das funções:</p>
                                    <span class="ml10" id="loading_parameters"></span>
                                    <div class="col-md-12 ph10 mb5">
                                        <label for="list_ecu_function" class="field select">
                                            <select name="list_ecu_function" id="list_ecu_function" class="gui-input" required>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <p class="mb15">Descreva a descrição da função ou software?</p>
                                        <label for="description_function_software" class="field prepend-icon">

                                            <textarea name="description_function_software" id="description_function_software" cols="30" rows="10" class="gui-textarea" placeholder="Descreva em até duas linhas:"></textarea>
                                            <span class="field-icon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                        <p class="mb15">Qual é a motivação da aplicação da função ou software?</p>
                                        <label for="motivation_applying_function_software" class="field prepend-icon">

                                            <textarea name="motivation_applying_function_software" id="motivation_applying_function_software" cols="30" rows="10" class="gui-textarea" placeholder="Descreva em até duas linhas:"></textarea>
                                            <span class="field-icon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ">
                                        <div class="table-responsive">
                                            <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">R<?= date("y"); ?>01</th>
                                                        <th class="text-center">R<?= date("y"); ?>02</th>
                                                        <th class="text-center">R<?= date("y"); ?>03</th>
                                                        <th class="text-center">R<?= date("y"); ?>04</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Plano: </td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>
                                                        <td><input type="date" name="releases_date[]" value="<?= date("Y-m-d"); ?>"></td>


                                                    </tr>
                                                    <tr>
                                                        <td>Detalhamento : </td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>
                                                        <td><input type="text" name="releases_function[]"></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                    <h6>Upload do plano</h6>
                                        <div class="panel mb50" id="p5">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">
                                                
                                                <label class="field prepend-icon file mb20 mt10">
                                                
                                                    <input type="file" name="files" required class="gui-file" onchange="document.getElementById('uploader').value = this.value;" accept=".png, .pdf, .jpeg, .jpg, .doc, .docx, .xls, .xlsx">

                                                    <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                    <i class="fa fa-upload"></i>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                    <h6>Upload do Modelo de Relatório 1</h6>
                                        <div class="panel mb50" id="p5">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">

                                                <label class="field prepend-icon file mb20 mt10">

                                                    <input type="file" name="files" required class="gui-file" onchange="document.getElementById('uploader').value = this.value;" accept=".png, .pdf, .jpeg, .jpg, .doc, .docx, .xls, .xlsx">

                                                    <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                    <i class="fa fa-upload"></i>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section row">
                                    <div class="col-md-12 ph10 mb5">
                                    <h6>Upload do Modelo de Relatório 2</h6>
                                        <div class="panel mb50" id="p5">
                                            <div class="panel-body panel-scroller scroller-sm pn mt20">

                                                <label class="field prepend-icon file mb20 mt10">

                                                    <input type="file" name="files" required class="gui-file" onchange="document.getElementById('uploader').value = this.value;" accept=".png, .pdf, .jpeg, .jpg, .doc, .docx, .xls, .xlsx">

                                                    <input type="text" id="uploader" name="uploader" class="gui-input fluid-width" placeholder="selecione um arquivo">
                                                    <i class="fa fa-upload"></i>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                            <!-- /Panel Body -->
                        </form>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<script src="<?= BASE_URL; ?>assets/js/list_ecu_function.js"></script>