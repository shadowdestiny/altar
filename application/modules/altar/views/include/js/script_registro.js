
$('#contributor').click( divLogin );

var clic = 1;
function divLogin(){ 
    if(clic==1){
        $('#hidenBox').show();
        //document.getElementById("hidenBox").style.height = "100px";
        clic = clic + 1;
    } else{
        $('#hidenBox').hide();
        //document.getElementById("hidenBox").style.height = "0px";      
        clic = 1;
    }   
}
