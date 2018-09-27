$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    validate_newPassword();
});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_newPassword() {
    /**
     * Funcion para validar los campos de
     */
    $("#recovery-form").validate({
        rules: {
            password: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            password_confirm: {
                required: true,
                minlength: 5,
                maxlength: 20,
                equalTo: "#password"
            },
        },

        messages: {
            password: {
                required: $account_recovery_pass,
                minlength: $account_recovery_pass_min_length,
                maxlength: $account_recovery_pass_max_length
            },
            password_confirm: {
                required: $account_recovery_pass,
                minlength: $account_recovery_pass_min_length,
                maxlength: $account_recovery_pass_max_length,
                equalTo: $account_recovery_pass_equalTo
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

    var urlFormSave = $Ctr_account + 'new_password';
    var dataToSave = $("#recovery-form").serialize();

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
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }]
    });
}


