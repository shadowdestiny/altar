$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    validateRecovery();
});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validateRecovery() {
    /**
     * Funcion para validar los campos de
     */
    $("#recovery-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },

        messages: {
            email: {
                required: $error_validation_email
            }
        },

        submitHandler: function (form) {
            formRecovery();
        }
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formRecovery() {

    var urlFormSave = $Ctr_account + 'recovery_request';
    var dataToSave = $("#recovery-form").serialize();
    $('.loading').css("display", "block");
    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
            if (data.response) {

                DialogSuccess(data.message);

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


/**
 * Funcion para lanzar alerta de Error
 * @type Arguments
 */
function DialogError(message) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Error",
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-danger',
            label: $recovery_message_modal_buton_close,
            action: function (dialogItself) {
                dialogItself.close();
            }
        }]
    });
}

/**
 * Funcion para lanzar modal sin errores
 * @type Arguments
 */
function DialogSuccess(message) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: $recovery_message_modal_title_success,
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: $recovery_message_modal_buton_close,
            action: function (dialogItself) {
                location.href = $Ctr_account;
            }
        }]
    });
}

