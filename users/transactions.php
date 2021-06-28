<div class="container-fluid">
    <div class="table-responsive">
        <div class="card-header bg-dark text-light text-center">
            Mis transacciones
            <div class="clearfix"></div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fondos</th>
                <th scope="col">Estatus</th>
                <th scope="col">Fecha de envio</th>
                <th scope="col">Imagen</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("./user/userTransactions.php");
            include("./user/userFunds.php");
            
            $transactions = json_decode($transactions,true);
            foreach($transactions as $transaction) {
            ?>
            <tr>
                <th scope="row"><?php echo $transaction["id"]; ?></th>
                <td>$<?php echo $transaction["funds"]; ?></td>
                <td><?php switch($transaction["statusID"]) {
                            case 0:
                                echo "Pendiente";
                                break;
                            case 1;
                                echo "Aceptada";
                                break;
                            case 2:
                                echo "Rechazada";
                                break;    
                } ?></td>
                <td><?php echo $transaction["sendDate"]; ?></td>
                <td><img src=<?php echo "'images/transactions/" . $transaction["imagePath"] . "'";?> style="max-width: 25% !important;"></td>
            </tr>    
            <?php
            } //for end
            ?>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="card-header bg-dark text-light text-center" id="saldo">
<?php echo "Mis fondos: $" .$funds;?>
    <div class="clearfix"></div>
</div>

<form id="fileImage" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Imagen</label>
        <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" name="image">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Cantidad</label>
        <input type="number" class="form-control" id="amount" name="amount" aria-describedby="emailHelp" placeholder="Ingresa aquí el monto del voucher" name="amount">
    </div>


    <button type="submit" class="btn btn-primary float-right">Enviar transacción</button>
</form>
<script>
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
        ).done  (function(data, textStatus, jqXHR){
            if (data == 1) {
                document.getElementById("idModalBody").innerHTML = "La transacción se ha subido correctamente";
                $("#cartUpdate").modal();
            } else {
                document.getElementById("idModalBody").innerHTML = data;
                $("#cartUpdate").modal();
            }
        })
         .fail  (function(jqXHR, textStatus, errorThrown) { alert("Error")   ; })
        ;


    });
});
</script>
<div class="modal fade" id="cartUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Estado de transacción</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="idModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
<table>
    <tr>
        <td>
            <label for="imagen">Imagen</label>
        </td>
        <td>
            <input type="file" name="image" size="20">
        </td>
    </tr>
    <tr>
        <td>
            <input type="text" name="amount">
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">
            <input type="submit" value="Enviar imagen">
        </td>
    </tr>
</table>
-->