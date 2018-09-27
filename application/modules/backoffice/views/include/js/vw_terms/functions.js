$urlAjax = $baseUrl + 'Ctr_termsconditions/saveTermsconditions';

$(document).ready(function () {

    //$('#modal_update_terms').modal('show');

});


function editTerms() {

    termsTitleEs = $('#termsTitleEs').val();
    termsTitleEn = $('#termsTitleEn').val();
    termsContentEs = $('#termsContentEs').val();
    termsContentEn = $('#termsContentEn').val();

    sendData = {
        termsTitleEs: termsTitleEs,
        termsTitleEn: termsTitleEn,
        termsContentEs: termsContentEs,
        termsContentEn: termsContentEn
    };

    $.ajax({
        type: "post",
        url: $urlAjax,
        cache: false,
        data: sendData,

        success: function (datos) {

            var objJson = JSON.parse(datos);

            //alert(objJson.flag);

            if (objJson.flag) {
                $('#modal_update_terms').modal('show');
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            BDError(xhr.responseText);
        }
    });

    return false;

}