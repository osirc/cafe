<?php

include("ordersJSON.php");

$sql = "SELECT orders_id, orders_status_id, first_name, last_name, name, amount, date FROM ticket 
        INNER JOIN user ON ticket.user_id = user.id INNER JOIN orders ON ticket.orders_id = orders.id 
        INNER JOIN product ON ticket.product_id = product.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $orders = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($orders,new OrdersJSON($row["orders_id"],$row["orders_status_id"],$row["first_name"]
        ,$row["last_name"],$row["name"],$row["amount"],$row["date"]));
    }
    $orders = json_encode($orders);
} else {
    echo "No hay nada aún";
}

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
                <td><button type="button" class="btn btn-outline-success float-right">Aceptar</button><br>
                    <button type="button" class="btn btn-outline-danger btn-xs">Rechazar</button></td>
            </tr>    
            <?php
            } //for end
            ?>
            </tbody>
        </table>
    </div>
</div>
