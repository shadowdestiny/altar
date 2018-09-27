$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
    send_mailContacto();
});

function send_mailContacto() {
    /**
     *función para validar el formulario de contacto
     */
    $("#formulario").validate({
        rules: {
            contactform_name: {
                required: true,
                maxlength: 50
            },
            contactform_phone: {
                required: true,
                number: true,
                minlength: 10
            },
            contactform_subject: {
                required: true,
                maxlength: 25
            },
            contactform_message: {
                required: true,
                maxlength: 250
            },
            contactform_email: {
                required: true,
                email: true,
                maxlength: 25
            },

        },
        messages: {
            contactform_name: {
                required: $contact_message_name,
                maxlength: $contact_message_name_length
            },
            contactform_phone: {
                required: $contact_message_phone,
                number: $contact_message_phone_number,
                maxlength: $contact_message_phone_length
            },
            contactform_subject: {
                required: $contact_message_subject,
                maxlength: $contact_message_subject_length
            },
            contactform_message: {
                required: $contact_message_message,
                maxlength: $contact_message_message_length
            },
            contactform_email: {
                required: $contact_message_email,
                email: $ccontact_message_email_email,
                maxlength: $contact_message_email_length
            },
        },

        submitHandler: function () {
            /**
             * Funcion que se ejectuta cuando el formulario ha sido validad
             */
            mail_contacto();

        }

    });
    return false;
}

/**
 * Función que se encarga de mandar la información a la clase para mandar el correo
 */
function mail_contacto() {

    $('.loading').css("display", "block");
    var form = $('#formulario').serialize();


    $.ajax({
        type: "POST",
        url: $Ctr_contact + "contact_mail_send",
        data: form,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
            if (data.response) {

                DialogSuccess_contact(data.message);

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

function DialogSuccess_contact(message) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: "Éxito",
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: 'Cerrar',
            action: function (dialogItself) {
                location.href = $Ctr_contact;
            }
        }]
    });
}

