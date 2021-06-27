<?php include("config/config.php"); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/style.css">
<title>PHP User Registration & Login System Demo</title>
<!-- jQuery + Bootstrap JS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<script src="js/jquery-3.6.0.min.js">

</script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="js/resetPassword.js"></script>

<script>
    $(function(){

        $("#menu").click(function(e) {
            e.preventDefault();
            $("#sidebar").toggleClass("active");
        });

        $(window).resize(function(e) {
            if($(window).width()<=768){
                $("#mainWrapper").removeClass("active");
            }else{
                $("#mainWrapper").addClass("active");
            }
        });

        $(".myNavItem").click(function(event) {
            $( "a.myNavItem.active" ).removeClass( "active" );
        });
    });
</script>
