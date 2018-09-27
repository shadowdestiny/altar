/**
 * Funcion para enviar los datos al formulario para actualizar
 * @constructor
 */
function autor_edit(id, name) {

    $('#autor_edit').modal('show');
    $('#name').val(name);
    $('#autor_id').val(id);

}

/**
 * Funcion para mostar el formulario de agregar pregunta
 * @constructor
 */
function autor_add() {

    $('#autor_add').modal('show');
}

/**
 * Funcion para validar los datos del formulario para actualizar
 * @type Arguments
 */
function validate_updateAutor() {

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
                formAutor();
            }
        }]
    });
    return false;

}

/**
 * Funcion para validar los campos del formulario agregar
 * @type Arguments
 */
function validate_addAutor() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Agregar Autor.",
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
                formAutor_add();
            }
        }]
    });

    return false;

}

/**
 * Funcion para validar la eliminación de una pregunta
 * @type Arguments
 */
function autor_delete(id) {

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
                formDelete_autor(id);
            }
        }]
    });
    return false;

}

/**
 * Funcion para enviar el formulario de actualizar las preguntas
 * @type Arguments
 */
function formAutor() {

    var urlFormSave = $Ctr_autor + 'autor_update';
    var dataToSave = $("#modal_form_autor").serialize();

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
function formAutor_add() {

    var urlFormSave = $Ctr_autor + 'autor_add';
    var dataToSave = $("#modal_form_autor_add").serialize();

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
function formDelete_autor(id) {

    var urlFormSave = $Ctr_autor + 'autor_delete';
    var dataToSave = {autor_id: id};

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
                location.href = $Ctr_autor;
            }
        }]
    });
}
