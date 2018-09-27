<script type="text/javascript">

    /**
     * Funcion para guardar el registro del usuario en pre registros
     * @returns {boolean}
     */


    $( ".checkbox_noti" ).click(function() {
        var value = $('#notified').is(':checked');
        $('#check_notificaciones').val(value);
    });

    $('#modal_success_preregister').on('hidden.bs.modal', function () {
        location.reload();
    })


    function savePre_register() {
        $('.message_preregister').empty();

        var form =  $('#form_preregister').serialize();
        console.log(form);
        $('#loading_form').css('display','block');
        $.ajax({
            type: "POST",
            url: $ROOT_URL + "altar/pre_register",
            data: form,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.response) {

                    $('#modal_success_preregister').modal("show");
                    $('.message_preregister').append(respuesta.message);

                } else {

                    $('#modal_error_preregister').modal("show");
                    $('.message_preregister').append(respuesta.message);
                }
            }
        });
        return false;
    }


</script>