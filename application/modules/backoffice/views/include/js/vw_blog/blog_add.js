$(document).ready(function () {


    /*Funcion para validar los campos de registro*/
    validate_form_add();

    /*Funcion para guardar la imagen*/
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
function validate_form_add() {
    /**
     * Funcion para validar los campos de
     */
    $("#form_add_blog").validate({
        rules: {
            title_es: "required",
            title_en: "required",
            content_es: "required",
            content_en: "required",
            image_temp: "required"
        },

        messages: {

            title_es: "Ingrese un titulo en español.",
            title_en: "Ingrese un titulo en ingles.",
            content_es: "Ingrese el contenido en español.",
            content_en: "Ingrese el contenido en inglés.",
            image_temp: "Seleccione un imagen."

        },

        submitHandler: function (form) {
            DialogSaveBlog();
        }
    });
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogSaveBlog() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Registrar Blog.",
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
                formBlog();
            }
        }]
    });
}


/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formBlog() {

    var urlFormSave = $Ctr_blog + 'save_blog';

    var dataToSave = $("#form_add_blog").serialize();


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




