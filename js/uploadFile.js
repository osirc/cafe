$(function(){
    $("form#fileImage").submit(function(e) {
        e.preventDefault();
        var form =  $("form#fileImage");

        // you can't pass Jquery form it has to be javascript form object
        var formData = new FormData(form[0]);
        var url = "http://localhost/cafe/user/addTransaction.php"


        $.ajax({
                type: 'POST',
                url: url,
                enctype: 'multipart/form-data',
                data: new FormData(this),
                processData: false,
                contentType: false
            }
        ).done  (function(data, textStatus, jqXHR){ alert('Thank God it worked!'); })
         .fail  (function(jqXHR, textStatus, errorThrown) { alert("Error")   ; })
        ;


    });
});
