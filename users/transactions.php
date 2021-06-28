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