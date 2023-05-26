$(document).ready(function () {
    $("#form-order").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50,
                remote: {
                    url: BASE_URL + 'ajax/check_name_exist',
                    type: 'post'
                }
            }
        },
        messages: {
            name: {
                required: "Campo obrigatório",
                minlength: "Mínimo de 3 caracteres",
                maxlength: "Máximo de 50 caracteres",
                remote: "Já existe um projeto com este nome"
            }
        }
    });
});