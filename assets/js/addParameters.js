$(document).ready(function () {
    $('.btn-add').on('click', function () {
        create_item_list();
    });

    

    let create_item_list = () => {

        let parameters = () => {
            return `
                <tr class="row-parameters">
                    <td><input type="text" name="parameters[]"></td>
                    <td><input type="text" name="parameters[]"></td>
                    <td><input type="text" name="parameters[]"></td>
                    <td>
                        <button onclick="this.closest('.row-parameters').remove();" class="btn btn-danger" type="button">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>                   
                `;
        };
        $('#parent_parameters').append(parameters());
    };

});
