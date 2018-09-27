$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    validateEdit();
});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validateEdit() {
    /**
     * Funcion para validar los campos de
     */
    $("#edit-form").validate({
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
                required: {
                    depends: function(element) {
                        return ($('#password_confirm').val() != '');
                    }
                },
                minlength: 5,
                maxlength: 20
            },
            password_confirm: {
                required: {
                    depends: function(elements){
                        return($('#password').val() != '');
                    }

                },
                minlength: 5,
                maxlength: 20,
                equalTo: "#password"
            },
        },

        messages: {
            name: {
                required: $account_edit_message_name,
                maxlength: $account_edit_message_name_length
            },
            email: {
                required: $account_edit_message_email,
                email: $account_edit_message_email_email,
                maxlength: $account_edit_message_email_length
            },
            username: {
                required: $account_edit_message_username,
                maxlength: $account_edit_message_username_length
            },
            phone: {
                required: $account_edit_message_phone,
                number: $account_edit_message_phone_number,
                maxlength: $account_edit_message_phone_length
            },
            password: {
                required: $account_edit_message_pass,
                minlength: $account_edit_message_pass_min_length,
                maxlength: $account_edit_message_pass_max_length
            },
            password_confirm: {
                required: $account_edit_message_pass,
                minlength: $account_edit_message_pass_min_length,
                maxlength: $account_edit_message_pass_max_length,
                equalTo: $account_edit_message_pass_equalTo
            }
        },

        submitHandler: function (form) {
            formEdit();
        }
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formEdit() {
    $('.loading').css("display", "block");
    var urlFormSave = $Ctr_account + 'edit_update';
    var dataToSave = $("#edit-form").serialize();

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

