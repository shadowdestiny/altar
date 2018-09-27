$(document).ready(function () {
    /*Funcion para validar los campos de registro*/
   validateAddHelp();
});
/**
 * Funcion para enviar los datos al formulario para actualizar
 * @constructor
 */
function help_edit(id, tit_es, tit_en, cnt_es, cnt_en) {

    $('#help_edit').modal('show');
    $('#title_spanish').val(tit_es);
    $('#title_english').val(tit_en);
    $('#cont_spanish').val(cnt_es);
    $('#cont_english').val(cnt_en);
    $('#help_id').val(id);

}

/**
 * Funcion para mostar el formulario de agregar pregunta
 * @constructor
 */
function help_add() {

    $('#help_add').modal('show');
}

/**
 * Funcion para validar los datos del formulario para actualizar
 * @type Arguments
 */
function validate_updateHelp() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Actualizar",
        message: "¿Tus datos son correctos?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-warning',
            label: 'Guardar',
            action: function () {
                formHelp();
            }
        }]
    });
    return false;

}

//funcion que valida 
function validateAddHelp(){
    /**
     * Funcion para validar los campos
     */
    $("#modal_form_help_add").validate({
        rules: {
            title_spanish: {
                required: true,
            },
            title_english: {
                required: true,

            },
            cont_spanish: {
                required: true,
            },
            cont_english: {
                required: true,
            },
        },

        messages: {
            title_spanish: {
                required: 'El campo es obligatorio'
                
            },
            title_english: {
                required: 'El campo es obligatorio'
                
            },
            cont_spanish: {
                required: 'El campo es obligatorio'
            },
            cont_english: {
                required: 'El campo es obligatorio'
            }
        },

        submitHandler: function(form) {
            validate_addHelp();
        }
    });
}




/**
 * Funcion para validar los campos del formulario agregar
 * @type Arguments
 */
function validate_addHelp() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Recuperar Contraseña.",
        message: "¿Tus datos son correctos?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-warning',
            label: 'Guardar',
            action: function () {
                formHelp_add();
            }
        }]
    });

    return false;

}

/**
 * Funcion para validar la eliminación de una pregunta
 * @type Arguments
 */
function help_delete(id) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Eliminar.",
        message: "¿Estas seguro de eliminar ?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-danger',
            label: 'Eliminar',
            action: function () {
                formDelete_help(id);
            }
        }]
    });
    return false;

}

/**
 * Funcion para enviar el formulario de actualizar las preguntas
 * @type Arguments
 */
function formHelp() {

    var urlFormSave = $Ctr_help + 'help_update';
    var dataToSave = $("#modal_form_help").serialize();

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
 * Funcion para enviar el formulario de agregar una pregunta
 * @type Arguments
 */
function formHelp_add() {

    var urlFormSave = $Ctr_help + 'help_add';
    var dataToSave = $("#modal_form_help_add").serialize();

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
 * Funcion para enviar el formulario de eliminar una pregunta
 * @type Arguments
 */
function formDelete_help(id) {

    var urlFormSave = $Ctr_help + 'help_delete';
    var dataToSave = {help_id: id};

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
                location.href = $Ctr_help;
            }
        }]
    });
}
