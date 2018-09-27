$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
});

function Dialog_cancel_account() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: $account_cancel_modal_title,
        message: $account_cancel_modal_message,
        buttons: [{
            label: $account_cancel_modal_cancel,
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-danger',
            label: $account_cancel_modal_accept,
            action: function () {
                $('.loading').css("display", "block");
                formCancel();
            }
        }]
    });

    return false;
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formCancel() {
    $('.loading').css("display", "block");
    var urlFormSave = $Ctr_account + 'cancel_account_execute';
    var dataToSave = $("#form_cancel_account").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
            if (data.response) {

                location.href = $Ctr_account;

            } else {
                DialogError(data.message);
            }

        },
        error: function (xhr, textStatus, errorThrown) {
            DialogError(xhr.responseText);
            return false;
        }
    });

}

