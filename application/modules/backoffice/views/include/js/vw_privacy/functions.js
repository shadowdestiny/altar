$urlAjax = $baseUrl + 'Ctr_privacy/savePrivacy';

$(document).ready(function(){
	
	//$('#modal_update_terms').modal('show');

});


function editPrivacy(){

	privacyTitleEs 	   = $('#privacyTitleEs').val();
	privacyTitleEn 	   = $('#privacyTitleEn').val();
	privacyContentEs   = $('#privacyContentEs').val();
	privacyContentEn   = $('#privacyContentEn').val();
 
	sendData       = {
                        privacyTitleEs 	    : privacyTitleEs,
                        privacyTitleEn 	    : privacyTitleEn,
                        privacyContentEs	: privacyContentEs,
                        privacyContentEn 	: privacyContentEn
                      };

	$.ajax({
        type: "post",
        url: $urlAjax,
        cache: false,    
        data: sendData,

        success: function(datos){

        	var objJson = JSON.parse( datos );

        	//alert(objJson.flag);

        	if( objJson.flag ) {
        		$('#modal_update_privacy').modal('show');
        	}
        },
        error: function(xhr, textStatus, errorThrown){      
            BDError(xhr.responseText);
        }
    });

	return false;

}