<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Funds</th>
                <th scope="col">Status</th>
                <th scope="col">sendDate</th>
                <th scope="col">image</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("./user/userTransactions.php");
            include("./user/userFunds.php");
            echo "Tus fondos: " .$funds;
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

<form action="user/addTransaction.php" method="POST" enctype="multipart/form-data">
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
