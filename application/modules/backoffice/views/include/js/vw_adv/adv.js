$(document).ready(function () {


});

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogDeleteAdv(video_id) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Eliminar Video",
        message: "¿Estas seguro de eliminar esta publicidad?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-danger',
            label: 'Eliminar',
            action: function () {
                deleteAdv(video_id);
            }
        }]
    });
}

/**
 * Funcion para enviar el formulario de actualizar las preguntas
 * @type Arguments
 */
function deleteAdv(adv_id) {

    var urlFormSave = $Ctr_adv + 'delete';
    var dataToSave = {adv_id: adv_id};

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

/**
 * Funcion para lanzar modal sin errores
 * @type Arguments
 */
function DialogSuccess(message) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: "Exito",
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: 'Cerrar',
            action: function (dialogItself) {
                location.href = $Ctr_adv;
            }
        }]
    });
}