$(document).ready(function () {

    validate_add_coupon();

    validate_edit_coupon();


    $("#type_coupon").change(function () {

        var value_cupon = $(this).val();
        alert(value_cupon);

        if (typeof value_cupon != "undefined") {

            if (value_cupon == "price") {

                $("#cantidad").removeAttr('max');

            }
            if (value_cupon == "percentage") {

                $("#cantidad").attr('max', '100');

            }

        }
    });


});

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_add_coupon() {
    /**
     * Funcion para validar los campos de
     */
    $("#modal_form_coupon").validate({
        rules: {
            code_coupon: "required",
            cantidad: "required",
            type_coupon: "required"
        },

        messages: {

            code_coupon: "Genere un código",
            cantidad: "Ingrese una cantidad",
            type_coupon: "Seleccione un tipo de cupón",

        },

        submitHandler: function (form) {
            coupon_save();
        }
    });

    return false;
}

/**
 * Funcion para los campos del formulario de registro
 * @type Arguments
 */
function validate_edit_coupon() {
    /**
     * Funcion para validar los campos de
     */
    $("#modal_form_edit_coupon").validate({
        rules: {
            code_edit_coupon: "required",
            cantidad_edit: "required",
            type_coupon: "required"
        },

        messages: {

            code_coupon: "Genere un código",
            cantidad_edit: "Ingrese una cantidad",
            type_edit_coupon: "Seleccione un tipo de cupón",

        },

        submitHandler: function (form) {
            coupon_update();
        }
    });

    return false;
}

/**
 * Funcion para validar que los datos son validos
 * @constructor
 */
function DialogDeleteCoupon(cupon_id) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Eliminar Cupon",
        message: "¿Estas seguro de eliminar este cupón?.",
        buttons: [{
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }, {
            cssClass: 'btn-danger',
            label: 'Eliminar',
            action: function () {
                coupon_delete(cupon_id);
            }
        }]
    });
}

/**
 * Funcion para enviar el formulario de actualizar las preguntas
 * @type Arguments
 */
function generate_code_coupon() {

    var urlFormSave = $Ctr_coupon + 'generate_code_coupon';

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        dataType: "json",
        success: function (data) {
            if (data.response) {

                $("#code_coupon").val("");
                $("#code_coupon_name").val("");
                $("#code_coupon").val(data.code_coupon);
                $("#code_coupon_name").val(data.code_coupon);

            } else {
                $('#modal_coupon_add').css('z-indez', '1');
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
 * Funcion para enviar el formulario de actualizar las preguntas
 * @type Arguments
 */
function generate_code_edit_coupon() {

    var urlFormSave = $Ctr_coupon + 'generate_code_coupon';

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        dataType: "json",
        success: function (data) {
            if (data.response) {

                $("#code_edit_coupon").val("");
                $("#code_edit_coupon").val(data.code_coupon);

            } else {
                $('#modal_coupon_add').css('z-indez', '1');
                DialogError(data.message);
            }

        },
        error: function (xhr, textStatus, errorThrown) {
            DialogError(xhr.responseText);
            return false;
        }
    });

}


function coupon_save() {

    var urlFormSave = $Ctr_coupon + 'cupon_save';
    var dataToSave = $("#modal_form_coupon").serialize();

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


function coupon_update() {

    var urlFormSave = $Ctr_coupon + 'cupon_update';
    var dataToSave = $("#modal_form_edit_coupon").serialize();

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


function coupon_delete(cupon_id) {

    var urlFormSave = $Ctr_coupon + 'delete';
    var dataToSave = {cupon_id: cupon_id};

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


function EditCoupon(coupon_id, code_name, cantidad, type_coupon) {

    $('#modal_coupon_edit').modal('show');

    $('#coupon_id').attr('value', coupon_id);
    $('#code_edit_coupon').attr('value', code_name);
    $('#cantidad_edit').attr('value', cantidad);
    $('#type_edit_coupon option[value = ' + type_coupon + ']').attr('selected', true)
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
                location.href = $Ctr_coupon;
            }
        }]
    });
}