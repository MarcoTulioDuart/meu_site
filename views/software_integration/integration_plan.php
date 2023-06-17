<!-- New Project -->

<header id="topbar" class="breadcrumb_style_2">
    <?php if (isset($_COOKIE["Fail_new_project"])) : ?>
        <div class="text-center">
            <div class="alert alert-danger alert-dismissable mb30 alert-block p15">
                <button type="button" class="close mt15" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="mtn fs20 text-white">Mensagem de Erro</h3>
                <p><?= $_COOKIE["Fail_new_project"]; ?></p>
            </div>
        </div>
    <?php endif; ?>
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon breadcrumb-active">
                <a href="index.html">
                    <span class="fa fa-circle-o"></span>
                </a>
            </li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>home/home_page">Início</a>
            </li>
            <li class="breadcrumb-current-item">Projeto</li>
            <li class="breadcrumb-current-item">Novo Projeto</li>
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
                            <span class="panel-title pn">Plano de integração entre ECUs</span><br>
                            <span class="fa fa-circle"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                            <span class="fa fa-circle-o"></span>
                        </div>
                        <form action="<?= BASE_URL; ?>softwareintegration/releasesSoftware" method="post">
                            <div class="row text-center">
                                <div class="col-md-12 ph10 mb5">
                                    <label for="physical_resources">
                                        Quais são os recursos físicos necessários para os testes?
                                        <input type="text" name="physical_resources" id="physical_resources" class="gui-input" placeholder="Ex: Transdutores, equipamentos de medição, equipamentos de parametrização, veículo protótipo, etc.">

                                    </label>
                                </div>
                            </div>
                            <div class="row text-center mt-1 mb5">
                                <div class="col-md-6 ph10 mb5">
                                    <label for="physical_resources_availability">
                                        Todos os recursos estão/estarão disponíveis?
                                        <select name="physical_resources_availability" id="physical_resources_availability">
                                            <option value="sim">Sim</option>
                                            <option value="não">Não</option>
                                        </select>

                                    </label>
                                </div>

                                <div class="col-md-6 show" id="col_test_date">
                                    <label for="test_date">
                                        Data proposta de início do teste
                                        <input type="date" name="test_date" id="test_date" value="<?= date("Y-m-d"); ?>">
                                    </label>
                                </div>

                                <div class="col-md-6 hide" id="col_physical_resources">
                                    <label for="test_date">
                                        Detalhe qual item está pendente:
                                        <input type="text" name="physical_resources" id="physical_resources" class="gui-input" placeholder="" value="">
                                    </label>
                                </div>

                            </div>
                            <div class="section text-center">
                                <button type="submit" class="btn fs14 btn-primary"><b>Próximo</b></button>
                            </div>

                        </form>


                        <!-- FORM 2 -->




                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<!-- js -->
<script src="<?= BASE_URL ?>assets/js/pages/validation/new_project.js"></script>
<script>
   
$("#physical_resources_availability " ).on( "change", function() {
    let option = $(this).val();
    if(option == "sim"){
        replaceClass("col_test_date", "hide", "show");
        replaceClass("col_physical_resources", "show" , "hide");
    }else{
        replaceClass("col_test_date", "show", "hide");
        replaceClass("col_physical_resources", "hide" , "show");
    }
} );


function replaceClass(id, oldClass, newClass) {
    var elem = $(`#${id}`);
    if (elem.hasClass(oldClass)) {
        elem.removeClass(oldClass);
    }
    elem.addClass(newClass);
}
 
</script>