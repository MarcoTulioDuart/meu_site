// UPLOAD DE PDF
$(document).ready(function () {
    $("#pdf-upload").validate({
        rules: {
            pdf: {
                required: true
            }
        },
        messages: {
            pdf: {
                required: "Campo obrigatório"
            }
        }
    });
});
