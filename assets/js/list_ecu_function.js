$(document).ready(function () {
    $('#name_ecu').on('change', function () {
        let $parametro = $(this).val().trim();
        let $project_id = $(this).attr('data-project-id');
        console.log($project_id);
        if ($parametro.length >= 1) {
            load_dados($parametro, $project_id);
        }
    });
    function loading_show() {
        $('#loading_parameters').html("<img src='" + BASE_URL + "assets/img/loading.gif'/>").fadeIn('fast');
    }
    function loading_hide() {
        $('#loading_parameters').fadeOut('fast');
    }
    // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json 
    let load_dados = (valores, project_id) => {
        if (valores) {
            $.ajax({
                url: BASE_URL + 'ajax/list_ecu_function',
                type: 'POST',
                dataType: 'JSON',
                data: { 
                    search: valores ,
                    project_id: project_id
                },
                beforeSend: function () {
                    //Chama o loading antes do carregamento 
                    loading_show();
                },

                success: function (response) {
                    if (response.status) {
                        loading_hide();
                        create_item_list(response.data);
                    }
                },
                error: function (error) {
                    alert('Não foi possivel processar a sua requisição, tente mais tarde!');
                }
            });
        }
    }
    let create_item_list = (object) => {
        if (object.length > 0) {
            let benennung = object.map((item) => {
                return `
                        <option value="${item.function_ecu}">${item.function_ecu}</option>                        
                `;
            });
            $('#list_ecu_function').html(benennung.join(""));
        }else{
            $('#list_ecu_function').html(`
                <option>Nenhum resultado encontrado!</option>
            `);
        }
    };
});
