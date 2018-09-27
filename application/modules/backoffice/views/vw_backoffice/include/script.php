<script type="text/javascript">

    function validarUser() {
        //alert("hila");
        console.log("boton");
        var username = $("#login_username").val();
        var password = $("#login_password").val();
        data = {
            username: username,
            password: password
        };
        $.ajax({
            type: "POST",
            url: $ROOT_URL + "backoffice/userAuth",
            data: data,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.response) {
                    $(location).attr('href', $ROOT_URL + 'backoffice/Ctr_index/');
                } else {

                    $('#error_login').append("<div class='alert alert-danger'>\n" +
                        "<strong>Alert!</strong> Somehting went wrong\n" +
                        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n" +
                        "</div>");
                }
            }
        });
        return false;
    }


</script>