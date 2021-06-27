$(function(){
// Attach a submit handler to the form
    $( "#resetPasswordButton" ).click(function( event ) {

        // Stop form from submitting normally
    /*    event.preventDefault();*/

        // Get some values from elements on the page:

        var email = $('#recoverPasswordEmailInput').val();
        var userName = "Cristian";
        var message = "Hola "+userName +".  Tu contraseña temporal es la siguiete    12234   ";
        var url = "http://localhost/cafe/email/sendEmail.php"

        // Send the data using post
        var posting = $.post( url, {
            to: email,
            subject: 'Confirmación del restablecimiento de la contraseña de',
            message: message
        }  );

        // Put the results in a div
        posting.done(function( data ) {
            $("#idModalBody  > p").text("envío exitoso");
            $("#idModalBody  > div").addClass("invisible");
            $("#idModalBody  > button").addClass("invisible");
        });

        posting.fail(function( data ) {
            alert("fail");
        });
    });

    $( "#closeForgotPassword" ).click(function( event ) {
        $("#idModalBody  > p").text("Write tou email");
        $("#idModalBody  > div").removeClass("invisible").addClass("visible");
        $("#idModalBody  > button").removeClass("invisible").addClass("visible");
        $("#recoverPasswordEmailInput").val("");
    });
});
