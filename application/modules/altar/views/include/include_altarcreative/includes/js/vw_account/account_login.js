$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    validateLogin();
});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validateLogin() {
    /**
     * Funcion para validar los campos de
     */
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },

        messages: {
            email: {
                required: $error_validation_email
            },
            password: {
                required: $error_validation_pass,
                minlength: $error_validation_pass_lenght
            }
        },

        submitHandler: function (form) {
            formLogin();
        }
    });
}

/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formLogin() {

    var urlFormSave = $Ctr_account + 'verify_login';
    var dataToSave = $("#login-form").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
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

