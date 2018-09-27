$(document).ready(function () {

    /*Funcion para guardar la imagen*/
    $("#image_temp").change(function () {

        urlTempImage = $Ctr_uploadImage + 'upload_image_content';
        var image_temp = $("#image_temp")[0].files[0];
        element = '#div_content_image_temp';

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }

    });

});

/**
 * Funcion para los campos del formulario de de acerca de nosostros
 * @type Arguments
 */
function update_aboutus(){

     BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Actualizar Infoamción",
        message: "¿Seguro que deseas actualizar la información?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-warning',
            label: 'Guardar',
            action: function () {
                formAboutus();
            }
        }]
    });
    return false;

}


/**
 * Funcion para enviar el formulario de la seccion de acerca de nossotros
 * @type Arguments
 */
function formAboutus() {

    var urlFormSave = $Ctr_aboutUs + 'aboutus_update';
    var dataToSave = $("#form_aboutus").serialize();
    console.log(dataToSave);
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
                location.href = $Ctr_aboutUs;
            }
        }]
    });
}


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

