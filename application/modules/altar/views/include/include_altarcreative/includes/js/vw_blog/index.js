$(document).ready(function () {
    sharedEmailBlog();
    window.fbAsyncInit = function () {
        FB.init({
            appId: $API_FACEBOOK_ID,
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v2.10'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    /*Twitter Button*/
    // Include the Twitter Library
    window.twttr = (function (d, s, id) {
        var t, js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        return window.twttr || (t = {
            _e: [], ready: function (f) {
                t._e.push(f)
            }
        });
    }(document, "script", "twitter-wjs"));

    /**
     * EVENTO PARA COMPARTIR POR REDES SOCIALES
     */
    $('a.sharedInfoFaceAltar').click(function (event) {
        event.preventDefault();
        event.stopPropagation();
        FB.ui({
            method: 'share',
            href: $URL
        }, function (response) {
        });
    });


});

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function sharedEmailBlog() {
    /**
     * Funcion para validar los campos de
     */
    $("#shared_email_blog").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true
            }
        },

        messages: {
            email: {
                required: $error_validation_email
            },
            subject: {
                required: $error_validation_subject
            }
        },

        submitHandler: function (form) {
            formSendEmail();
        }
    });
    return false;
}

/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formSendEmail() {
    $('.loading').css("display", "block");
    var urlFormSave = $Ctr_sendemail + 'shared_blog';
    var dataToSave = $("#shared_email_blog").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
            if (data.response) {

                DialogSuccess(data.message, data.return);

            } else {
                DialogError(data.message);
            }

        },
        error: function (xhr, textStatus, errorThrown) {
            $('.loading').css("display", "block");
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
function DialogSuccess(message, return_uri) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: $recovery_message_modal_title_success,
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: $recovery_message_modal_buton_close,
            action: function (dialogItself) {
                location.href = return_uri;
            }
        }]
    });
}


