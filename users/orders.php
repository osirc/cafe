<div class="card-header bg-dark text-light text-center">
Mis ordenes
<div class="clearfix"></div>
</div>
<?php

$stmt = $conn->prepare("SELECT orders_id, orders_status_id, name, amount, (ticket.price * amount) AS subtotal, date FROM ticket 
INNER JOIN user ON ticket.user_id = user.id INNER JOIN orders ON ticket.orders_id = orders.id 
INNER JOIN product ON ticket.product_id = product.id WHERE user_id = ? ORDER BY orders_id");
$stmt->bind_param("i",$_SESSION["id"]);
$totalOrders = 0;
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $orderNum = 0;
    $orderTotal = 0;
    $totalOrders = $result->num_rows;
    while ($row = $result -> fetch_assoc()) {
        if ($orderNum == 0) {
            $orderNum = $row["orders_id"];

?>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha de pedido</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
        <tbody>
        <?php
        }
        if ($orderNum != $row["orders_id"]) {
        ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Total: </b></td>
        <td>$<?php echo $orderTotal; $orderTotal = 0; ?></td>
                    </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Nombre del producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha de pedido</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php
                    $orderNum = $row["orders_id"];
                    }
                ?>
                    <tr>
                    <th scope="row"><?php echo $row["orders_id"]; ?></th>
                    <td><?php switch($row["orders_status_id"]) {
                        case 1:
                            echo "Pendiente";
                            break;
                        case 2:
                            echo "Aceptada";
                    } ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>$<?php echo $row["subtotal"]; $orderTotal += $row["subtotal"];?></td>
                    </tr>
                    <?php
                } // while end
            }
            if ($totalOrders != 0) {
            ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total: </b></td>
            <td>$<?php echo $orderTotal; $orderTotal = 0; ?></td>
            </tbody>
        </table>
    </div>
</div>
<hr>
            <?php
            }
            ?>