$(document).ready(function () {

    $(".image_temp").change(function () {
        urlTempImage = $Ctr_uploadImage + 'upload_image_content';
        var image_temp = $(this)[0].files[0];
        var prefixdiv = $(this).attr('data-section');
        element = '#div_content_image_temp_' + prefixdiv;

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }

    });

});


/**
 * Peticion AjaxElemento PDF
 * @type Arguments
 */
function peticionAjaxElementoImage(urlAjax, datosEnvia, elemento) {
    $.ajax({
        type: "post",
        url: urlAjax,
        cache: false,
        data: datosEnvia,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (datos) {
            if (datos.response) {
                $(elemento).html(datos.ImagePreview);

            }
        },
        error: function (xhr, textStatus, errorThrown) {
            DialogError(xhr.responseText);
            return false;
        }
    });
    return true;
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function section_update(section) {

    var urlFormSave = $Ctr_content + 'update_content';

    var dataToSave = $("#form_sections_" + section).serialize();


    if (typeof dataToSave != 'undefined') {

        $.ajax({
            type: "POST",
            cache: true,
            url: urlFormSave,
            data: dataToSave,
            dataType: "json",
            success: function (datos) {
                if (datos.response) {
                    DialogSuccess(datos.message);

                } else {
                    DialogError(datos.message);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                DialogError(xhr.responseText);
                return false;
            }
        });
    }

    return false;


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
                $(this).prop('checked', false);
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
                location.href = $Ctr_content;
            }
        }]
    });
}
