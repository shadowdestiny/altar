$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    validateRegister();
    validateLogin();
});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validateRegister() {
    /**
     * Funcion para validar los campos de
     */
    $("#register-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 200
            },
            email: {
                required: true,
                email: true,
                maxlength: 256
            },
            username: {
                required: true,
                maxlength: 25
            },
            phone: {
                required: true,
                number: true,
                maxlength: 10
            },
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
            name: {
                required: $account_register_message_name,
                maxlength: $account_register_message_name_length
            },
            email: {
                required: $account_register_message_email_email,
                maxlength: $account_register_message_email_length
            },
            username: {
                required: $account_register_message_username,
                maxlength: $account_register_message_username_length
            },
            phone: {
                required: $account_register_message_phone,
                number: $account_register_message_phone_number,
                maxlength: $account_register_message_phone_length
            },
            password: {
                required: $account_register_message_pass,
                minlength: $account_register_message_pass_min_length,
                maxlength: $account_register_message_pass_max_length
            },
            password_confirm: {
                required: $account_register_message_pass,
                minlength: $account_register_message_pass_min_length,
                maxlength: $account_register_message_pass_max_length,
                equalTo: $account_register_message_pass_equalTo
            }
        },

        submitHandler: function (form) {
            DialogSaveRegister();
        }
    });
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogSaveRegister() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Registrar usuario.",
        message: "¿Tus datos son correctos?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-success',
            label: 'Registrar',
            action: function () {
                formSendForm();
            }
        }]
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */

function formSendForm() {

    var urlFormSave = $Ctr_register + 'save';
    var dataToSave = $("#register-form").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {

            if (data.response) {

                DialogSuccess(data.message);

            } else {
                DialogError(data.message);
            }

        },
        error: function (xhr, textStatus, errorThrown) {
            DialogError(xhr.responseText);

        }
    });
    return false;
}


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
    $(".loading").css('display', 'block');

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $(".loading").css('display', 'none');
            if (data.response) {

                DialogSuccess(data.message);

            } else {
                DialogError(data.message);
            }

        },
        error: function (xhr, textStatus, errorThrown) {
            $(".loading").css('display', 'none');
            DialogError(xhr.responseText);
            return false;
        }
    });
}


