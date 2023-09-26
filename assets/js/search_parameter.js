$(document).ready(function () {
    $('#search_benennung').on('keyup paste', function () {
        let $parametro = $(this).val().trim();
        console.log($parametro);
        if ($parametro.length >= 3) {
            load_dados($parametro);
        }
    });
    function loading_show() {
        $('#loading_parameters').html("<img src='" + BASE_URL + "assets/img/loading.gif'/>").fadeIn('fast');
    }
    function loading_hide() {
        $('#loading_parameters').fadeOut('fast');
    }
    // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json 
    let load_dados = (valores) => {
        if (valores) {
            $.ajax({
                url: BASE_URL + 'ajax/search_parameters',
                type: 'POST',
                dataType: 'JSON',
                data: { 
                    search: valores 
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
                    <label class="block mt20 option option-info">
                        <input type="checkbox" name="paramter_id[]" value="${item.id}">
                        <span class="checkbox mb5"></span>
                        <span style="line-height: 2em;">${item.type}: ${item.benennung} | ${item.codebedingung}</span>
                    </label>
                `;
            });
            $('#show_benennung').html(benennung.join(""));
        }else{
            $('#show_benennung').html(`
                <span>Nenhum resultado encontrado!</span>
            `);
        }
    };
});
