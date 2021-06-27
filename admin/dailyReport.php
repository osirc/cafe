<?php

include("ordersJSON.php");

$sql = "SELECT product.id, category.name AS category, product.name, stock FROM product 
        INNER JOIN category ON category_id = category.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <div class="card-header bg-dark text-light text-center">
        Reporte de Stocks
        <div class="clearfix"></div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table" id="stocksTable">
                <thead>
                
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Stock</th>
                </tr>
                </thead>
                <tbody>
    <?php
    while ($row = $result -> fetch_assoc()) {
    ?>
        <tr>
                <th scope="row"><?php echo $row["id"]; ?></th>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["stock"]; ?></td>
        </tr> 
    <?php
    }
    ?>
                </tbody>
        </table>
    </div>
</div>
<!--<script src="js/datatables/jquery.dataTables.js"></script>
<script src="js/datatables/dataTables.bootsrap.js"></script>
<script>
$(function() {
    $("#table1").dataTable({
        "iDisplayLength": 10
    });
});
</script>-->

<div class="card-header bg-dark text-light text-center">
            <a href="/cafe/admin/generateStockReport.php" target="_blank" class="btn btn-outline-info btn-sm pull-right">Generar PDF</a>
            <div class="clearfix"></div>
</div>
<hr>
<?php
}
$sql = "SELECT product.name, category.name AS category, ticket.price , SUM(amount) AS product_sales , SUM(ticket.price * amount) AS sales 
    FROM ticket INNER JOIN product ON product_id = product.id INNER JOIN category ON category_id = category.id GROUP BY product.name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <div class="card-header bg-dark text-light text-center">
        Reporte de Ventas
        <div class="clearfix"></div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Ventas</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
    <?php
     while ($row = $result -> fetch_assoc()) {
    ?>
                <tr>
                    <th scope="row"><?php echo $row["name"]; ?></th>
                    <td><?php echo $row["category"]; ?></td>
                    <td>$<?php echo $row["price"]; ?></td>
                    <td><?php echo $row["product_sales"]; ?></td>
                    <td>$<?php echo $row["sales"]; ?></td>
                </tr> 
    <?php
     }
}
?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-header bg-dark text-light text-center">
            <a href="/cafe/admin/generateSalesReport.php" target="_blank" class="btn btn-outline-info btn-sm pull-right">Generar PDF</a>
            <div class="clearfix"></div>
</div>

