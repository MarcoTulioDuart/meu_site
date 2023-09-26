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
            <li class="breadcrumb-current-item">Gráfico de Status de saídas de falhas por ECU</li>
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
                    <div class="panel" id="shortcut">

                        <div class="panel-heading text-center">
                            <span class="panel-title pn">Gráfico de Status</span><br>
                            <span class="fa fa-circle"></span>
                        </div>

                        <div class="panel-body pn">
                            <div class="section row">
                                <canvas id="graphic_chart" class="mw500"></canvas>
                            </div>

                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>failsafetest/graphic_download?fail_safe_id=<?= $_GET['fail_safe_id']; ?>" class="button btn-primary">Download</a>
                            </div>
                            <hr>
                            <div class="section text-center">
                                <a href="<?= BASE_URL; ?>failsafetest/vehicle_result_download?fail_safe_id=<?= $_GET['fail_safe_id']; ?>">Agendar Reunião</a>
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

<script src="<?= BASE_URL; ?>assets\chartjs\chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    //configuração do gráfico
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Gráfico de Resolução de falhas encontradas em Veículos'
                },
            },
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Mês e Ano'
                    },
                    suggestedMin: 1,
                    suggestedMax: 12
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Quantidade de falhas'
                    },
                    suggestedMin: 0,
                    suggestedMax: 200
                }
            }
        },
    };

    //Dados do gráfico
    const DATA_COUNT = 2;
    const labels = [];
    for (let i = 0; i < DATA_COUNT; ++i) {
        labels.push(i.toString());
    }

    const not_relevant = [0, <?= $value; ?>, NaN]; //alterar esses dados pelo valor de resultado de status
    const unsolved = [0, <?= $value; ?>, NaN];
    const solved = [0, <?= $value; ?>, NaN];

    const data = {
        labels: labels,
        datasets: [{ //linhas começam aqui
            label: 'Irrelevante',
            data: not_relevant,
            borderColor: Utils.CHART_COLORS.red,
            fill: false,
            cubicInterpolationMode: 'monotone',
            tension: 0.4
        }, {
            label: 'Em trabalho',
            data: unsolved,
            borderColor: Utils.CHART_COLORS.blue,
            fill: false,
            tension: 0.4
        }, {
            label: 'Resolvidas',
            data: solved,
            borderColor: Utils.CHART_COLORS.green,
            fill: false
        }]
    };

    new Chart(ctx, config, data);
</script>