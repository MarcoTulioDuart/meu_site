$(document).ready(function () {
    $("#form-recover").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 5
            },
            c_new_password: {
                required: true,
                equalTo: '#new_password'
            }
        }

    })
});
