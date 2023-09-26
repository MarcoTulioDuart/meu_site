$(document).ready(function () {
    $("#form-register").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            last_name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            login: {
                required: true,
                email: true
            },
            company_id: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
            c_password: {
                required: true,
                equalTo: '#password'
            }
        }

    })
});

