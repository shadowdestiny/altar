$(document).ready(function () {

    $("#image_temp_add").change(function () {
        urlTempImage = $Ctr_uploadImage + 'upload_image';
        var image_temp = $(this)[0].files[0];
        element = '#div_content_image_temp_add';

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }

    });

    $("#image_temp_edit").change(function () {
        urlTempImage = $Ctr_uploadImage + 'upload_image';
        var image_temp = $(this)[0].files[0];
        element = '#div_content_image_temp_edit';

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
 * Funcion para validar que los datos son validos
 * @constructor
 */
function category_edit(id, id_lang, txt_es, txt_en, image, imageThumb) {

    $('#category_edit').modal('show');
    $('#category_id').val(id);
    $('#lang_id').val(id_lang);
    $('#text_spanish').val(txt_es);
    $('#text_english').val(txt_en);
    $('#image_hidden_name').val(image);
    $('#image_hidden_name_preview').val(imageThumb);
    $('#image_edit').attr('src', $URL_IMAGES + imageThumb);
    $('#image_edit').css("display", "block");

}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function category_add() {

    $('#category_add').modal('show');
}

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_updateCategory() {

    formCategory();
    return false;

}

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_addCategory() {

    formCategory_add();

    return false;

}

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function category_delete(id) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Eliminar Categoría.",
        message: "¿Estas seguro de eliminar esta categoría?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-danger',
            label: 'Eliminar',
            action: function () {
                formDelete_category(id);
            }
        }]
    });
    return false;

}

/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formCategory() {

    var urlFormSave = $Ctr_category + 'category_update';
    var dataToSave = $("#modal_form_category").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
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
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formCategory_add() {

    var urlFormSave = $Ctr_category + 'category_add';
    var dataToSave = $("#modal_form_category_add").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
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
 * Funcion para enviar el formulario
 * @type Arguments
 */
function formDelete_category(id) {

    var urlFormSave = $Ctr_category + 'category_delete';
    var dataToSave = {category_id: id};

    $('.loading').css("display", "block");

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            $('.loading').css("display", "none");
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
                location.href = $Ctr_category;
            }
        }]
    });
}
