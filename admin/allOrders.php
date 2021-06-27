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
} else {
    echo "No hay nada aún";
}

?>
<div class="card-header bg-dark text-light text-center">
    Ordenes
    <div class="clearfix"></div>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Estatus</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre del producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha de pedido</th>
            </tr>
            </thead>
            <tbody>
            <?php
            
            foreach($orders as $order) {
            ?>
            <tr>
                <th scope="row"><?php echo $order->id; ?></th>
                <td><?php switch($order->statusID) {
                            case 1:
                                echo "Pendiente";
                                break;
                            case 2:
                                echo "Aceptada";
                                break;
                } ?></td>
                <td><?php echo $order->firstName; ?></td>
                <td><?php echo $order->lastName; ?></td>
                <td><?php echo $order->productName; ?></td>
                <td><?php echo $order->amount; ?></td>
                <td><?php echo $order->date; ?></td>
            </tr>    
            <?php
            } //for end
            ?>
            </tbody>
        </table>
    </div>
</div>
