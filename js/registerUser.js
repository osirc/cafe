$(function(){
// Attach a submit handler to the form
    /*$( "#signUpButtonText" ).click(function( event ) {*/
        $( "#registerForm" ).submit(function( event ) {
            event.preventDefault();

            var name = $("#nameInput").val();
            var lastname = $("#lastnameInput").val();
            var email = $("#registerEmailInput").val();
            var password = $("#registerPasswordInput").val();
            var cellphone = $("#cellphoneInput").val();

            var invalidFeedback = "invalid-feedback";
            var blockTooltip = "displayBlockToolTip";


            $("#nameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
            $("#lastnameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
            $("#emailToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
            $("#passwordToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
            $("#cellphoneToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();

            var validForm = true;

            if (!name) {
                $("#nameToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Nombre es requerido");
                console.log("name");
                validForm = false;
            }


            if (!lastname) {
                $("#lastnameToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Apellido Paterno es requerido");
                validForm = false;
            }


            if (!email) {
                $("#emailToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Email es requerido");
                validForm = false;
            }


            if (!password) {
                $("#passwordToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El Password es requerido");
                validForm = false;
            }


            if (!cellphone){
                $("#cellphoneToolTip").addClass(invalidFeedback).addClass(blockTooltip).append("El teléfono es requerido");
            validForm = false;
            }

            if(validForm){
                var url = "http://localhost/cafe/registerUser/register.php"

                // Send the data using post
                var posting = $.post( url, {
                    name:       name,
                    lastname:   lastname,
                    email:      email,
                    password:   password,
                    cellphone : cellphone
                }  );

                // Put the results in a div
                posting.done(function( data ) {
                    alert("Usuario Registrado");
                });

                posting.fail(function( data ) {
                    alert("Usuario No Registrado");
                });
            }
    });

    $( "#closeRegisterUser" ).click(function( event ) {

        $("#nameInput").val("");
        $("#lastnameInput").val("");
        $("#registerEmailInput").val("");
        $("#registerPasswordInput").val("");
        $("#cellphoneToolTip").val("");


        var invalidFeedback= "invalid-feedback";
        var blockTooltip = "displayBlockToolTip";

        $("#nameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty();
        $("#lastnameToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");
        $("#emailToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");
        $("#passwordToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");
        $("#cellphoneToolTip").removeClass(invalidFeedback).removeClass(blockTooltip).empty("");

    });
});