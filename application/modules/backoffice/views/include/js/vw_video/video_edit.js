$(document).ready(function () {


    /*Funcion para validar los campos de registro*/
    validate_form_edit();


    $("#image_temp").change(function () {

        urlTempImage = $Ctr_uploadImage + 'upload_image';
        var image_temp = $("#image_temp")[0].files[0];
        element = '#div_content_image_temp';

        var formData = new FormData();
        formData.append('imageTemp', image_temp);

        if (typeof image_temp != 'undefined') {
            var respuesta = peticionAjaxElementoImage(urlTempImage, formData, element);
        }


    });

    /**
     * Verificar que es gratis
     */
    $("#check_free").click(function () {

        var urlFormSave = $Ctr_video + 'backoffice_validate_exit_free';
        var urlFormSaveEdit = $Ctr_video + 'backoffice_validate_exit_free_edit';
        $('.loading').css("display", "block");

        var video_id = $("#video_id").val();
        var dataSend = {video_id: video_id}


        if ($(this).is(":checked")) {

            $.ajax({
                type: "POST",
                cache: true,
                url: urlFormSave,
                dataType: "json",
                success: function (data) {
                    $('.loading').css("display", "none");

                    if (data.response) {

                        $("#check_free").prop('checked', true);

                    } else {
                        $("#check_free").prop('checked', false);
                        DialogError(data.message);

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
            $.ajax({
                type: "POST",
                cache: true,
                url: urlFormSaveEdit,
                data: dataSend,
                dataType: "json",
                success: function (data) {
                    $('.loading').css("display", "none");

                    if (data.response) {

                        $("#check_free").prop('checked', false);

                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    $('.loading').css("display", "none");
                    DialogError(xhr.responseText);
                    return false;
                }
            });
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
    $("#form_edit_video").validate({
        rules: {
            "data_lang[title_es]": "required",
            "data_lang[title_en]": "required",
            "data_video[price]": "required",
            "data_video[price_offer]": "required",
            "data_lang[intro_es]": "required",
            "data_lang[intro_en]": "required",
            "data_lang[description_es]": "required",
            "data_lang[description_en]": "required",
            "data_video[format_video]": "required",
            "data_category[]": "required",
            "data_video[autor_video]": "required",
        },

        messages: {

            "data_lang[title_es]": "Ingrese un titulo en español.",
            "data_lang[title_en]": "Ingrese un titulo en ingles.",
            "data_video[price]": "Ingrese un precio.",
            "data_video[price_offer]": "Ingrese un precio de oferta.",
            "data_lang[intro_es]": "Ingrese una introducción en español.",
            "data_lang[intro_en]": "Ingrese una introducción en ingles.",
            "data_lang[description_es]": "Ingrese una descripción en español.",
            "data_lang[description_en]": "Ingrese una descripción en ingles.",
            "data_video[format_video]": "Seleccione mínimo un formato de video.",
            "data_category[]": "Seleccione mínimo una categoría.",
            "data_video[autor_video]": "Seleccione un autor.",

        },

        submitHandler: function (form) {
            DialogSaveVideo();
        }
    });
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogSaveVideo() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Registrar Video.",
        message: "¿Estas seguro de actualizar los datos de este video?.",
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

    var urlFormSave = $Ctr_video + 'update_video';

    var formData = new FormData();
    /* GET DATA*/

    var video_id = $('#video_id').val();

    var title_es = $('#title_es').val();
    var data_category = $('#data_category').val();
    var intro_es = $('#intro_es').val();
    var description_es = $('#description_es').val();

    var title_en = $('#title_en').val();
    var intro_en = $('#intro_en').val();
    var description_en = $('#description_en').val();

    var price = $('#price').val();
    var price_offer = $('#price_offer').val();
    var format_video = $('#format_video').val();
    var autor_video = $('#autor_video').val();
    var image_name = $("#image_name").val();
    var image_name_preview = $("#image_name_preview").val();


    /*  DATOS VIDEOS ID */
    formData.append('video_id', video_id);

    /*  INFO ES */
    formData.append('category', data_category);
    formData.append('title_es', title_es);
    formData.append('intro_es', intro_es);
    formData.append('description_es', description_es);


    /*  INFO EN */
    formData.append('title_en', title_en);
    formData.append('intro_en', intro_en);
    formData.append('description_en', description_en);

    /* INFO EXTRA*/
    formData.append('price', price);
    formData.append('price_offer', price_offer);
    formData.append('image_name', image_name);
    formData.append('image_name_preview', image_name_preview);
    formData.append('format_video', format_video);
    formData.append('autor_video', autor_video);

    if ($("#check_free").is(":checked")) {
        formData.append('is_free', '1');
    } else {
        formData.append('is_free', '0');
    }


    $.ajax({
        type: "POST",
        url: urlFormSave,
        cache: false,
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (datos) {
            $('.loading').css("display", "none");
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
                location.href = $Ctr_video;
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




