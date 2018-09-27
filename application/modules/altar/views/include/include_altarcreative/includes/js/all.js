$(document).ready(function () {

    //al arreglo array_purchase_id se le pasan las variables de arraySesionPurchase
    var array_purchase_id = arraySesionPurchase;

    console.log('allScript');

    /**
     * Funcion para inicializar la validacion del cupon
     */
    validateCoupon();

    window.fbAsyncInit = function () {
        FB.init({
            appId: $API_FACEBOOK_ID,
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v2.10'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //$( "#shoeNumberAllElementsAdd" ).hide();

    /*
    * Funcion para agregar videos a favoritos
    */
    $('#allBody').on("click", ".buttonAddFavorite", function () {

        elementClick = $(this);

        //icono no favorito
        iconnofavorite = "icon-heart right";
        //icono favorito
        iconfavorite = "icon-heart3 right";

        urlFavorite = $Ctr_favorites + 'changeStatus';

        userId = $(this).attr('user-id');
        videoId = $(this).attr('video-id');

        dataFavorite = {
            userId: userId,
            videoId: videoId
        };

        $.ajax({
            type: "POST",
            cache: true,
            url: urlFavorite,
            data: dataFavorite,
            dataType: "json",
            success: function (data) {

                if (parseInt(data.cont) > 0) {
                    elementClick.find('i').attr('class', iconnofavorite);
                } else {
                    elementClick.find('i').attr('class', iconfavorite);
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                DialogError(xhr.responseText);
                return false;
            }
        });

    });

    /*
    * Funcion para agregar videos en lista de compras
    */
    $('#allBody').on("click", ".addElementShoppingCart", function () {

        elementClick = $(this);
        video_id = parseInt(elementClick.attr('video-id'));
        video_price = elementClick.attr('video-value');
        video_image = elementClick.attr('video-preview');
        video_title = elementClick.attr('video-title');
        video_url = elementClick.attr('video-url');

         //con parseInt se cambia el valor del arreglo traido desde php a entero y en caso de que el valor no se encuentre en el array el valor debe ser == -1
        if(parseInt($.inArray(video_id,array_purchase_id)) == -1){
        
        //en caso de que entre el valor de video_id se agrega al arreglo array_purchase_id               
            array_purchase_id.push(video_id);

        newelement = "\
      <div class='top-cart-item clearfix' id='elementHeaderAdd" + video_id + "'>\
          <div class='top-cart-item-image'>\
              <a href='" + video_url + "'>" +
            "<img src='" + video_image + "' alt='Producto'>\
                </a>\
          </div>\
          <div class='top-cart-item-desc'>\
              <a href='" + video_url + "'>" + video_title + "</a>\
              <span class='top-cart-item-price'><span class='signopesos'>$</span>" + video_price + "</span>\
          </div>\
      </div>\
    ";

        $("#allElementAddShoppingCart").append(newelement);

        numberElements = $("#shoeNumberAllElementsAdd").html();
        $("#shoeNumberAllElementsAdd").html(parseInt(numberElements) + 1);
        $("#shoeNumberAllElementsAdd").show();

        totalPrice = $(".showTotalPriceAdd").html();
        totalPrice = parseFloat(totalPrice) + parseFloat(video_price);
        $(".showTotalPriceAdd").html(totalPrice);
        $("#paypal_amount").val(totalPrice);

        urlFormSesion = $Ctr_purchases + 'sesionElements';

        dataSesion = {
            video_id: video_id,
            newelement: newelement,
            totalPrice: totalPrice
        }

        $.ajax({
            type: "POST",
            cache: true,
            url: urlFormSesion,
            data: dataSesion,
            dataType: "json",
            success: function (data) {
                if (data.response) {

                    //DialogSuccess(data.message);

                } else {
                    //DialogError(data.message);
                }

            },
            error: function (xhr, textStatus, errorThrown) {
                DialogError(xhr.responseText);
                return false;
            }
        });
    }
        console.log(video_id);

    });

    /*
    * Funcion para eliminar videos en lista de compras
    */
    $('#allBody').on("click", ".removeElementPurchase", function () {

        var buton_delete = $(this);

        BootstrapDialog.show({
            type: BootstrapDialog.TYPE_DANGER,
            title: "Borrar producto.",
            message: "¿Deseas eliminar del carrito?.",
            buttons: [{
                label: 'Cancel',
                action: function (dialogItself) {
                    dialogItself.close();
                }
            }, {
                cssClass: 'btn-danger',
                label: 'Eliminar',
                action: function (dialogItself) {

                    dialogItself.close();

                    elementClick = buton_delete;
                    video_id = elementClick.attr('video-id');
                    video_count = elementClick.attr('video-count');
                    video_price = elementClick.attr('video-value');

                    elementClick.parent().parent().remove();
                    $('#elementHeaderAdd' + video_id).remove();

                    numberElements = $("#shoeNumberAllElementsAdd").html();
                    tempNumberElements = numberElements - 1;
                    $("#shoeNumberAllElementsAdd").html(tempNumberElements);

                    if (parseInt(tempNumberElements) == 0) {

                        $("#shoeNumberAllElementsAdd").hide();

                    }

                    totalPrice = $(".showTotalPriceAdd").html();
                    totalPrice = parseFloat(totalPrice) - parseFloat(video_price);


                    $(".showTotalPriceAdd").html(totalPrice);
                    $(".showSubTotalPriceAdd").html(totalPrice);
                    $("#paypal_amount").val(totalPrice);

                    urlFormSesion = $Ctr_purchases + 'sesionElementsRemove';

                    dataSesion = {
                        video_id: video_id,
                        video_count: video_count,
                        totalPrice: totalPrice
                    }

                    $.ajax({
                        type: "POST",
                        cache: true,
                        url: urlFormSesion,
                        data: dataSesion,
                        dataType: "json",
                        success: function (data) {
                            if (data.response) {

                                location.href = $Ctr_purchases;

                            } else {
                                DialogError("Error al eliminar el item");
                            }

                        },
                        error: function (xhr, textStatus, errorThrown) {
                            DialogError(xhr.responseText);
                            return false;
                        }
                    });

                }
            }]
        });


        //alert(video_count);

    });

    /*
    * Funcion para vista rapida detalle de video
    */
    var $window = $(window),
        $body = $('body');
    $("#content").delegate(".item-quick-view", "click", function () {

        $lightboxAjaxEl = $('[data-lightbox="ajax"]');
        $lightboxAjaxEl.magnificPopup({
            type: 'ajax',
            closeBtnInside: false,
            callbacks: {
                ajaxContentAdded: function (mfpResponse) {
                    SEMICOLON.widget.loadFlexSlider();
                    SEMICOLON.initialize.resizeVideos();
                    SEMICOLON.widget.masonryThumbs();
                },
                open: function () {
                    $body.addClass('ohidden');
                },
                close: function () {
                    $body.removeClass('ohidden');
                }
            }
        });
    });


});

/*
*Funcion para la busqueda dinamica de titulos de videos
*/
var options = {

    url: function (phrase) {
        return "creativealtar/searchTitle";
    },

    getValue: function (element) {
        return element.name;
    },

    ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
            dataType: "json"
        }
    },

    preparePostData: function (data) {
        data.phrase = $("#ajax-post-title-header").val();
        return data;
    },

    requestDelay: 500
};

$("#ajax-post-title-header").easyAutocomplete(options);

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
        title: "Éxito",
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: 'Cerrar',
            action: function (dialogItself) {
                location.href = $Ctr_account;
            }
        }]
    });
}


/**
 * Funcion para lanzar alerta de Error
 * @type Arguments
 */
function purchases() {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: $purchases_error_title,
        message: "<b>" + $purchases_error_content + "</b>",
        buttons: [{
            cssClass: 'btn-danger',
            label: 'Cerrar',
            action: function (dialogItself) {
                dialogItself.close();
            }
        }]
    });

    return false;
}

function validateCoupon() {
    /**
     * Funcion para validar los campos de
     */
    $("#form_coupon_aplied").validate({
        rules: {
            coupon_input: "required"
        },

        messages: {
            coupon_input: $purchases_error_coupon
        },

        submitHandler: function (form) {
            form_validate_coupon();
        }
    });
}

/**
 * Funcion para enviar el formulario
 * @type Arguments
 */
function form_validate_coupon() {

    var urlFormSave = $Ctr_purchases + 'validate_coupon_applied';
    var dataToSave = $("#form_coupon_aplied").serialize();

    $.ajax({
        type: "POST",
        cache: true,
        url: urlFormSave,
        data: dataToSave,
        dataType: "json",
        success: function (data) {
            if (data.response) {


                DialogSuccess_Coupon(data.message);


                var coupon_id = data.coupon_id;
                var coupon_code = data.coupon_code;
                var coupon_type = data.coupon_type;
                var coupon_quantity = data.coupon_quantity;

                $("#coupon_id").val(coupon_id);
                $("#coupon_code").val(coupon_code);
                $("#coupon_type").val(coupon_type);
                $("#coupon_quantity").val(coupon_quantity);


                if (coupon_type == 'price') {

                    $("#type_descount").html('');
                    $("#type_descount").html('$');
                    $("#descount").html('');
                    $("#descount").html(coupon_quantity);


                }

                if (coupon_type == 'percentage') {

                    $("#type_descount").html('');
                    $("#type_descount").html('%');
                    $("#descount").html('');
                    $("#descount").html(coupon_quantity);
                }


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
 * Funcion para lanzar modal sin errores
 * @type Arguments
 */
function DialogSuccess_Coupon(message) {

    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_SUCCESS,
        title: "Ã‰xito",
        message: "<b>" + message + "</b>",
        buttons: [{
            cssClass: 'btn-success',
            label: 'Cerrar',
            action: function (dialogItself) {
                location.href = $Ctr_purchases;
            }
        }]
    });
}

