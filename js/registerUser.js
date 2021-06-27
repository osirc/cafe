$(function(){
// Attach a submit handler to the form
    /*$( "#signUpButtonText" ).click(function( event ) {*/
        $( "#registerForm" ).submit(function( event ) {
            event.preventDefault();

        var name = $("#nameInput").val();
        var lastname = $("#lastnameInput").val();
        var email = $("#registerEmailInput").val();
        var password = $("#registerPasswordInput").val();

        var invalidFeedback= "invalid-feedback";
        var blockTooltip = "displayBlockToolTip";


        $("#nameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
        $("#lastnameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
        $("#emailToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
        $("#passwordToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();


        if(!name){
            $("#nameToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Nombre es requerido");
            console.log("name");
        }

        if(!lastname){
            $("#lastnameToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Apellido Paterno es requerido");
            console.log("lastname");
        }

        if(!email){
            $("#emailToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Email es requerido");
            console.log("email invalido");
        }

        if(!password){
            $("#passwordToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Password es requerido");
            console.log("password invalido");
        }

    });

    $( "#closeRegisterUser" ).click(function( event ) {

        var invalidFeedback= "invalid-feedback";
        var blockTooltip = "displayBlockToolTip";

        $("#nameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
        $("#lastnameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");
        $("#emailToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");
        $("#passwordToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");

    });
});