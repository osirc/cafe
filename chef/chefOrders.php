<?php

include("admin/ordersJSON.php");

$sql = "SELECT orders_id, orders_status_id, first_name, last_name, name, amount, date FROM ticket 
        INNER JOIN user ON ticket.user_id = user.id INNER JOIN orders ON ticket.orders_id = orders.id 
        INNER JOIN product ON ticket.product_id = product.id ORDER BY orders_status_id";
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
    Ordenes de cocina
    <div class="clearfix"></div>
</div>
            <?php
            $orderNum = 0;
            foreach($orders as $order) {
                if ($orderNum == 0) {
                    $orderNum = $order->id;
                ?>
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
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                }
                if ($orderNum != $order->id) {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>     
                <td><button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'updateOrder(" . $orderNum . ",2)'"; echo ($order->statusID == 2) ? "disabled" : "" ; ?>>Aceptar</button></td>
                </tr>
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha de pedido</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
                $orderNum = $order->id;
                }
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
            if(count($orders) > 0) {
            ?>
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>  
                    <td><button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'updateOrder(" . $orders[count($orders)-1]->id . ",2)'"; echo ($orders[count($orders)-1]->statusID == 2) ? "disabled" : "" ; ?>>Aceptar</button></td>
            </tr>
                </tbody>
        </table>
    </div>
</div>
<hr>
            <?php
            }
            ?>


<script>
    function updateOrder(id,status) {
        let request = {
        id: id,
        status: status
        }

        fetch("./chef/updateOrders.php", {
            method: 'POST',
            headers: new Headers({"Content-Type": `application/json;charset=utf-8`,}),
            body: JSON.stringify(request)
        })
        .then(response => {
        if (response.ok) {
            return response.text();
        } else{
            alert(`Ocurrió un error, por favor inténtelo de nuevo`);
            return null;
            }
        })
        .then(data => {
                alert(data);
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }
</script>