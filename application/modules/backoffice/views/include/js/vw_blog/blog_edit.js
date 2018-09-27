$(document).ready(function () {


    /*Funcion para validar los campos de registro*/
    validate_form_edit();


    $("#image_temp").change(function () {

        urlTempImage = $Ctr_uploadImage + 'upload_image_blog';
        var image_temp = $("#image_temp")[0].files[0];
        element = '#div_content_image_temp';

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
function validate_form_edit() {
    /**
     * Funcion para validar los campos de
     */
    $("#form_edit_blog").validate({
        rules: {
            title_es: "required",
            title_en: "required",
            content_es: "required",
            content_en: "required"
        },

        messages: {

            title_es: "Ingrese un titulo en español.",
            title_en: "Ingrese un titulo en ingles.",
            content_es: "Ingrese el contenido en español.",
            content_en: "Ingrese el contenido en inglés."

        },

        submitHandler: function (form) {
            DialogSaveBlog();
        }
    });

    return false;
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogSaveBlog() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Registrar Video.",
        message: "¿Estas seguro de actualizar los datos de este blog?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-warning',
            label: 'Actualizar',
            action: function () {
                $('.loading').css("display", "block");
                formVideoUpdate();
            }
        }]
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formVideoUpdate() {

    var urlFormSave = $Ctr_blog + 'update_blog';

    var dataToSave = $("#form_edit_blog").serialize();
    var image_name = $("#image_name").val();


    if (typeof image_name != 'undefined') {

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
    } else {
        $('.loading').css("display", "none");
        DialogError("Necesita seleccionar una imagen");
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
                location.href = $Ctr_blog;
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




