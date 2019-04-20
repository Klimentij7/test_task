$(document).ready(function () {
    $("#dProduct").hide();
    $("#wProduct").hide();
    $("#sP").prop('checked', true);
    $("#sP").click( function(){
        $("#sProduct").show();
        $("#dProduct").hide();
        $("#wProduct").hide();
    });
    $("#dP").click( function(){
        $("#sProduct").hide();
        $("#dProduct").show();
        $("#wProduct").hide();
    });
    $("#wP").click( function(){
        $("#sProduct").hide();
        $("#dProduct").hide();
        $("#wProduct").show();
    });
    $("input[type='submit']").click(function (){
        show("ddddd");
    });
});