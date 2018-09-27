$(document).ready(function () {


    /*Funcion para validar los campos de registro*/
    validate_form_add();

    /*Funcion para guardar la imagen*/
    $("#image_temp_es").change(function () {

        urlTempImage = $Ctr_uploadImage + 'upload_image_adv_es';
        var image_temp = $("#image_temp_es")[0].files[0];
        element = '#div_content_image_temp1';

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }

    });

    /*Funcion para guardar la imagen*/
    $("#image_temp_en").change(function () {

        urlTempImage = $Ctr_uploadImage + 'upload_image_adv_en';
        var image_temp = $("#image_temp_en")[0].files[0];
        element = '#div_content_image_temp2';

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }

    });


});

$(".remove_image").click(function () {

    $(this).parent().remove();

});


/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_form_add() {
    /**
     * Funcion para validar los campos de
     */
    $("#form_add_adv").validate({
        rules: {
            image_temp_es: "required",
            image_temp_en: "required"
        },

        messages: {

            image_temp_es: "Seleccione un imagen en español.",
            image_temp_en: "Seleccione un imagen en ingles."

        },

        submitHandler: function (form) {
            DialogSaveAdv();
        }
    });
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogSaveAdv() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Registrar Publicidad.",
        message: "¿Los datos son correctos?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-warning',
            label: 'Guardar',
            action: function () {
                $('.loading').css("display", "block");
                formAdv();
            }
        }]
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formAdv() {

    var urlFormSave = $Ctr_adv + 'save_adv';

    var dataToSave = $("#form_add_adv").serialize();


    if (typeof dataToSave != 'undefined') {

        $.ajax({
            type: "POST",
            cache: true,
            url: urlFormSave,
            data: dataToSave,
            dataType: "json",
            success: function (datos) {
                $('.loading').css("display", "none");
                if (datos.response) {
                    DialogSuccess(datos.message);

                } else {
                    DialogError(datos.message);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                $('.loading').css("display", "none");
                DialogError(xhr.responseText);
                return false;
            }
        });
    }


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
                location.href = $Ctr_adv;
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




