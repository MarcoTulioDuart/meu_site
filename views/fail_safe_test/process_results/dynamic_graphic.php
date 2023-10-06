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
            <li class="breadcrumb-current-item">Fail Safe Test</li>
            <li class="breadcrumb-icon breadcrumb-link">
                <a href="<?= BASE_URL; ?>failsafetest/results?safe_test_id=<?= $_GET['safe_test_id']; ?>">Visão geral dos Resultados</a>
            </li>
            <li class="breadcrumb-current-item">Gráfico de Status de saídas de falhas por ECU</li>
        </ol>
    </div>
</header>

<!-- /Topbar -->

<!-- Content -->
<section id="content" class="animated fadeIn pt35">
    <div class="content-left">

    </div>
    <div class="content-right table-layout" id="modal-content">
        <!-- Column Center -->
        <div class="chute chute-center pbn">
            <!-- Lists -->
            <div class="row">
                <div class="allcp-form tab-pane mw1000 mauto" id="order" role="tabpanel">
                    <div class="panel" id="shortcut">

                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Gráfico de Status Dinâmico</span><br>
                            <span class="fa fa-circle"></span>
                        </div>

                        <div class="panel-body pn">
                            <div class="section row">
                                <canvas id="myChart" class="m20 p10"></canvas>
                            </div>

                            <div class="section text-center row">

                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-bordered ph20" id="gerar_imagem">Download</button>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /Panel -->
                </div>
            </div>

        </div>
        <!-- /Column Center -->
    </div>
</section>

<script src="<?= BASE_URL; ?>node_modules/chart.js/dist/chart.umd.js"></script>
<script type="module" src="<?= BASE_URL; ?>node_modules/chart.js/dist/chart.js"></script>
<script src="<?= BASE_URL; ?>node_modules/canvas-toBlob.js"></script>
<script src="<?= BASE_URL; ?>node_modules/FileSaver.min.js"></script>


<script>
    $("#gerar_imagem").click(function() {
        $("#myChart").get(0).toBlob(function(blob) {
            saveAs(blob, "grafico-do-Modulo-6.png");
        });
    });

    const ctx = document.getElementById('myChart').getContext('2d');

    let not_relevant = <?= $graphic_result['not_relevant']; ?>;
    let unsolved = <?= $graphic_result['unsolved']; ?>;
    let solved = <?= $graphic_result['solved']; ?>;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['', ''],
            datasets: [{
                label: 'Irrelevante',
                data: [0, not_relevant],
                fill: false,
                borderWidth: 2,
                cubicInterpolationMode: 'monotone',
                tension: 0.1
            }, {
                label: 'Em trabalho',
                data: [0, unsolved],
                fill: false,
                borderWidth: 4,
                cubicInterpolationMode: 'monotone',
                tension: 0.1
            }, {
                label: 'Resolvido',
                data: [0, solved],
                fill: false,
                borderWidth: 4,
                cubicInterpolationMode: 'monotone',
                tension: 0.1
            }]
        },

        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Gráfico de Status de saídas de falhas por ECU'
                },
            },
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Value'
                    }
                }
            }
        },
    });
</script>