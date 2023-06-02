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

// MODAL
$(document).ready(function () {
    $("#form-order").validate({
        rules: {
            title: {
                required: true
            },
            date_meeting: {
                required: true
            },
            link: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Campo obrigatório"
            },
            date_meeting: {
                required: "Campo obrigatório"
            },
            link: {
                required: "Campo obrigatório"
            }
        }
    });
});

// FLUXOGRAMA
$(document).ready(function () {
    $("#fluxograma").validate({
        rules: {
            flowchart_upload: {
                required: true
            }
        },
        messages: {
            flowchart_upload: {
                required: "Campo obrigatório"
            }
        }
    });
});