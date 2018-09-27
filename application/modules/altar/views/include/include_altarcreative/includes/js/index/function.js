$(document).ready(function () {
    console.log('indexScript');
    validate_newsletter();
});


/*
*Funcion para la busqueda dinamica de titulos de videos
*/
var options = {

    url: function (phrase) {
        return "creativealtar/searchTitle";
    },

    getValue: function (element) {
        return element.name;
    },

    ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
            dataType: "json"
        }
    },

    preparePostData: function (data) {
        data.phrase = $("#ajax-post-title").val();
        return data;
    },

    requestDelay: 500
};

$("#ajax-post-title").easyAutocomplete(options);


/**
 * Funcion para validar el formulario del newsletter
 */
function validate_newsletter() {
    /**
     * Funcion para validar los campos de
     */
    $("#form_news_letter").validate({
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
            formNewsLetter();
        }
    });
}

/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formNewsLetter() {

    var urlFormSave = $Ctr_sendemail + 'verify_login';
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

$("#contributor").click(function () {

    if ($(this).is(':checked')) {
        $("#hidenBox").css('display', 'block');
    } else {
        $("#hidenBox").css('display', 'none');
    }
    var value = $('#notified').is(':checked');

    $('#check_notificaciones').val(value);
});

$("#notified").click(function () {

    if ($(this).is(':checked')) {
        $('#check_notificaciones').val(1);
    } else {
        $('#check_notificaciones').val(0);
    }

});

$('#modal_success_preregister').on('hidden.bs.modal', function () {
    location.reload();
})


function savePre_register() {
    $('.message_preregister').empty();

    var form = $('#form_preregister').serialize();
    console.log(form);
    $('#loading_form').css('display', 'block');
    $.ajax({
        type: "POST",
        url: $Ctr_creativealtar + "pre_register",
        data: form,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.response) {
                DialogSuccess(respuesta.message);
            } else {

                DialogError(respuesta.message);
            }
        }
    });
    return false;
}

