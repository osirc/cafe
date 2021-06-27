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
                if($transaction["statusID"]==0){
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
                    <td><img src=<?php echo "'images/transactions/" . $transaction["imagePath"] . "'";?>></td>
                    <td><button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'UpdateTransaction(" . $transaction["id"] . "," . $transaction["funds"] . "," . $transaction["userID"] . ",1)'";  ?>>Aceptar</button><br>
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick=<?php echo "'UpdateTransaction(" . $transaction["id"] . "," . $transaction["funds"] . "," . $transaction["userID"] . ",2)'";  ?>>Rechazar</button></td>
                </tr>    
            <?php
                }
                else{
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
                    <td><img src=<?php echo "'images/transactions/" . $transaction["imagePath"] . "'";?>></td>
                    <td><button type="button" class="btn btn-outline-success float-right" disabled>Aceptar</button><br>
                        <button type="button" class="btn btn-outline-danger btn-xs" disabled>Rechazar</button></td>
                </tr>  
            <?php
                }
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
                alert(`Estado:${STATUSID}\nData: ${data}`);
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }
</script>