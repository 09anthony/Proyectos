$(document).ready(function(){
    console.log("script preparado");
    cambiarVista("Login");
});
function cambiarVista(objetivo){
    $(".vista").hide();
    $("#" + objetivo).show();
}