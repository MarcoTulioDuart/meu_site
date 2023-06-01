$(document).ready(function () {
    $('#search_signal').on('keyup paste', function () {
        let $parametro = $(this).val().trim();
        console.log($parametro);
        if ($parametro.length >= 3) {
            load_dados($parametro);
        }
    });
    function loading_show() {
        $('#loading').html("<img src='" + BASE_URL + "assets/img/loading.gif'/>").fadeIn('fast');
    }
    function loading_hide() {
        $('#loading').fadeOut('fast');
    }
    // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json 
    let load_dados = (valores) => {
        if (valores) {
            $.ajax({
                url: BASE_URL + 'ajax/search_can',
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
            let signals = object.map((item) => {
                return `
                    <label class="block mt20 option option-info">
                        <input type="checkbox" name="can_id[]" value="${item.id}">
                        <span class="checkbox mb5"></span>
                        <span style="line-height: 2em;">${item.rede_can}: ${item.signal_name} | ${item.signal_function}</span>
                    </label>
                `;
            });
            $('#show_signal').html(signals.join(""));
        }else{
            $('#show_signal').html(`
                <span>Nenhum resultado encontrado!</span>
            `);
        }
    };
});

//primeiro parâmetro seria o valor digitado no form, como ainda não
//digitamos nada, passamos null como valor, pois assim ele retornará todos
//os registro da tabela cliente.
//segundo parâmetro é a página onde será feita a pesquisa, é a página para
//onde vamos mandar os dados digitados no form
//terceiro parâmetro é a div que será mostrada o resultado da pesquisa
//retornado pela página que enviamos os dados

//load_dados(null, 'ajax/search_can', '#show_signal');