$(document).ready(function () {
    $("#new-password").validate({
        rules: {
            password: {
                required: true,
                remote: {
                    url: BASE_URL + 'ajax/check_password_exist',
                    type: 'post'
                }
            },
            new_password: {
                required: true,
                minlength: 5
            },
            c_new_password: {
                required: true,
                equalTo: '#new_password'
            }
        },
        messages: {
            password: {
                remote: "Esta senha não está cadastrada."
            }
        }

    })
});
