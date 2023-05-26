// ADICIONAR TIPO DE ECU
$(document).ready(function () {
    $("#add_ecu").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50
            }
        },
        messages: {
            name: {
                required: "Campo obrigatório",
                maxlength: "Máximo de 50 caracteres"
            }
        }
    });
});

// ADICIONAR CAN
$(document).ready(function () {
    $("#add_can").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50
            }
        },
        messages: {
            name: {
                required: "Campo obrigatório",
                maxlength: "Máximo de 50 caracteres"
            }
        }
    });
});

// ADICIONAR PARÂMETROS
$(document).ready(function () {
    $("#add_parameter").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50
            }
        },
        messages: {
            name: {
                required: "Campo obrigatório",
                maxlength: "Máximo de 50 caracteres"
            }
        }
    });
});

// ADICIONAR LINKS ÚTEIS
$(document).ready(function () {
    $("#add_links").validate({
        rules: {
            title: {
                required: true,
                maxlength: 50
            },
            url: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Campo obrigatório",
                maxlength: "Máximo de 50 caracteres"
            },
            url: {
                required: "Insira uma url"
            }
        }
    });
});