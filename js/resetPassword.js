$(function(){
// Attach a submit handler to the form
    $( "#resetPasswordButton" ).click(function( event ) {

        // Stop form from submitting normally
        event.preventDefault();

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
            $("#idModalBody").empty();
            $( "#idModalBody" ).append( "envío exitoso" );

        });

        posting.fail(function( data ) {
            alert("fail");
        });
    });
    $( "#closeForgotPassword" ).click(function( event ) {
        $("#idModalBody").empty();
        $("#idModalBody").append("<p>Write tou email</p>\n" +
            "                    <div class=\"input-group pb-md-2 pt-md-2\">\n" +
            "                        <span class=\"input-group-prepend\">\n" +
            "                            <div class=\"input-group-text bg-transparent border-right-0\">\n" +
            "                                <i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>\n" +
            "                            </div>\n" +
            "                        </span>\n" +
            "                            <input class=\"form-control py-2 border-left-0 border\" type=\"search\" id=\"recoverPasswordEmailInput\">\n" +
            "                    </div>\n" +
            "                    <button type=\"button\" name=\"resetPasswordButton\" id=\"resetPasswordButton\" class=\"btn btn-outline-primary btn-lg btn-block\">Reset Password</button>");
    });
});
