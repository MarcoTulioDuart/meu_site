$(document).ready(function () {
    $("#form-login").validate({
        rules: {
            login: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        }

    })
});

$(document).ready(function () {
    $("#form-forgot").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: BASE_URL + 'ajax/check_login_exist',
                    type: 'post'
                }
            }
        },
        messages: {
            email: {
                remote: "Este email não está cadastrado."
            }
        }

    })
});
