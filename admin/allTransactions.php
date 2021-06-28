<?php

include("transactionsJSON.php");

$sql = "SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date, transactions_image.path FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id INNER JOIN transactions_image ON transactions_image.transactions_id = transactions.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $transactions = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($transactions,new TransactionsJSON($row["transactions_id"],$row["user_id"],$row["status_id"],$row["first_name"],
                    $row["last_name"],$row["email"],$row["funds"],$row["send_date"],$row["path"]));
    }
    $transactions = json_encode($transactions);
} else {
    echo "No hay nada xd";
}

/* "SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id"*/
        /*" */
?>
<div class="card-header bg-dark text-light text-center">
    Transacciones
    <div class="clearfix"></div>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Fondos</th>
                <th scope="col">Estatus</th>
                <th scope="col">Fecha de envio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $transactions = json_decode($transactions,true);
            
            foreach($transactions as $transaction) {
            ?>
                <tr>
                    <th scope="row"><?php echo $transaction["id"]; ?></th>
                    <td><?php echo $transaction["firstName"]; ?></td>
                    <td><?php echo $transaction["email"]; ?></td>
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
                                }?></td>
                    <td><?php echo $transaction["sendDate"]; ?></td>
                    <td><img src=<?php echo "'images/transactions/" . $transaction["imagePath"] . "'";?> style="max-width: 25% !important;"></td>
                    <td><button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'UpdateTransaction(" . $transaction["id"] . "," . $transaction["funds"] . "," . $transaction["userID"] . ",1)'"; echo ($transaction["statusID"]==0) ? "" : "disabled"; ?>>Aceptar</button><br>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick=<?php echo "'UpdateTransaction(" . $transaction["id"] . "," . $transaction["funds"] . "," . $transaction["userID"] . ",2)'"; echo ($transaction["statusID"]==0) ? "" : "disabled"; ?>>Rechazar</button></td>
                </tr>    
            <?php
            } //for end
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function UpdateTransaction(ID,FUNDS,USERID,STATUSID){
        STATUSID=Number(STATUSID);
        if((STATUSID!=1)&&(STATUSID!=2))
            return;
        let request={id:ID,funds:FUNDS,userID:USERID,status:STATUSID};
        fetch(`./admin/updateTransaction.php`, {
                method: `POST`,
                headers: new Headers({"Content-Type": `application/json;charset=utf-8`,}),
                body: JSON.stringify(request)
            }
        )
        .then(response=>{
            if (response.ok) {
                return response.text();
            } else{
                alert(`Ocurrió un error, por favor inténtelo de nuevo`);
                return null;
            }
        })
        .then(data => {
                if (STATUSID == 2) {
                    document.getElementById("idModalBody").innerHTML = "<p>Transacción rechazada exitosamente</p>";
                    $("#transactionUpdate").modal();
                } else {
                    document.getElementById("idModalBody").innerHTML = "<p>Transacción aceptada exitosamente</p>";
                    $("#transactionUpdate").modal();
                }
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }
</script>
<div class="modal fade" id="transactionUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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