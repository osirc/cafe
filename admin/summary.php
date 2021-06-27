<?php

include("summaryJSON.php");


?>
<div class="card-header bg-dark text-light text-center">
    Resumen general
    <div class="clearfix"></div>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Usuarios</th>
                <th scope="col">Productos</th>
                <th scope="col">Ventas</th>
                <th scope="col">Transacciones pendientes</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $summary = new SummaryJSON();
            ?>
            <tr>
                <th scope="row"><?php echo $summary->users; ?></th>
                <td><?php echo $summary->products; ?></td>
                <td>$<?php echo $summary->profits; ?></td>
                <td><?php echo $summary->pendingTransactions; ?></td>
            </tr>    
            </tbody>
        </table>
    </div>
</div>
