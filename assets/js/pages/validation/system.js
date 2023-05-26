// ADICIONAR BIBLIOTECA ECU
$(document).ready(function () {
    $("#add_ecu").validate({
        rules: {
            uploader: {
                required: true
            }
        },
        messages: {
            uploader: {
                required: "Campo obrigatório"
            }
        }
    });
});

// ADICIONAR BIBLIOTECA CAN
$(document).ready(function () {
    $("#add_can").validate({
        rules: {
            rede_can: {
                required: true
            },
            uploader: {
                required: true
            }
        },
        messages: {
            rede_can: {
                required: "Selecione o tipo de rede CAN"
            },
            uploader: {
                required: "Campo obrigatório"
            }
        }
    });
});

// ADICIONAR DADOS DE PARÂMETROS
$(document).ready(function () {
    $("#add_parameter").validate({
        rules: {
            type: {
                required: true
            },
            uploader: {
                required: true
            }
        },
        messages: {
            type: {
                required: "Selecione o tipo de Parâmetro"
            },
            uploader: {
                required: "Campo obrigatório"
            }
        }
    });
});

// ADICIONAR PORTFOLIO DE VEÍCULO
$(document).ready(function () {
    $("#add_vehicle").validate({
        rules: {
            uploader: {
                required: true
            }
        },
        messages: {
            uploader: {
                required: "Campo obrigatório"
            }
        }
    });
});